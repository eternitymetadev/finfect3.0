<?php

namespace App\Http\Controllers;

use App\Imports\VendorInvoiceDueImport;
use App\Imports\VendorLedgerImport;
use App\Models\User;
use App\Models\Vendor;
use App\Models\VendorInvoiceDue;
use App\Models\VendorLedgerBalance;
use DB;
use Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Storage;

class VendorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:vendor-dashboard', ['only' => ['vendorDashboard']]);
        $this->middleware('permission:edit-vendor', ['only' => ['editVendor']]);
        $this->middleware('permission:vendor-ledger', ['only' => ['vendorLedgerSheet']]);
    }

    public function vendorDashboard(Request $request)
    {
        $loginPfu = $request->session()->get('pfu');
        $vendorsList = Vendor::where('pfu', $loginPfu)->get();
        return view('vendor.vendor-dashboard', ['vendorsList' => $vendorsList]);
    }

    public function vendorCreate(Request $request)
    {

        return view('admin.vendor.add-vendor');
    }

    public function addVendor(Request $request)
    {
        try {
            DB::beginTransaction();

            $validator = \Validator::make($request->all(), [
                'vendorCode' => 'unique:vendors,erp_code',

            ]);

            if ($validator->fails()) {
                $errors = $validator->errors();
                $formattedErrors = [];
                foreach ($errors->keys() as $field) {
                    $formattedErrors[$field] = $errors->get($field);
                }
                return response()->json(['errors' => $formattedErrors], 422);
            }

            $existingVendor = Vendor::where('pfu', $request->pfu)
                ->where('pan', $request->panNumber)
                ->first();

            if ($existingVendor) {

                $response['error'] = true;
                $response['message'] = 'Vendor already exist in this pfu';
                return response()->json($response);
            }

            $vendor = DB::table('vendors')->select('fin_code')->latest('fin_code')->first();
            $fin_code = json_decode(json_encode($vendor), true);
            if (empty($fin_code) || $fin_code == null) {
                $fin_no = 10101;
            } else {
                $fin_no = $fin_code['fin_code'] + 1;
            }

            // ------ Msme Certificate
            if ($request->msmeCertificate) {
                $msme = $request->file('msmeCertificate');
                $path = Storage::disk('s3')->put('vendor', $msme);
                $msmeCertificate = $path;
            } else {
                $msmeCertificate = null;
            }
            // ------ gst Certificate
            if ($request->gstCertificate) {
                $gstupload = $request->file('gstCertificate');
                $gstpath = Storage::disk('s3')->put('vendor', $gstupload);
            } else {
                $gstpath = null;
            }
            // ------ cancelCheque Certificate
            if ($request->cancelCheque) {
                $cheque_upload = $request->file('cancelCheque');
                $cancelChequepath = Storage::disk('s3')->put('vendor', $cheque_upload);
            } else {
                $cancelChequepath = null;
            }
            // ------ uploadPan
            if ($request->panUpload) {
                $pan_upload = $request->file('panUpload');
                $panPath = Storage::disk('s3')->put('vendor', $pan_upload);
            } else {
                $panPath = null;
            }

            $addVendor['fin_code'] = $fin_no;
            $addVendor['pfu'] = $request->pfu;
            $addVendor['company_name'] = $request->companyName;
            $addVendor['nature_of_assesse'] = $request->natureOfAssesse;
            $addVendor['erp_code'] = $request->vendorCode;
            $addVendor['state'] = $request->state;
            $addVendor['pin_code'] = $request->pincode;
            $addVendor['address'] = $request->vendorAddress;
            $addVendor['name'] = $request->contactPersonName;
            $addVendor['designation'] = $request->contactPersonDesignation;
            $addVendor['mobile'] = $request->contactPersonMobile;
            $addVendor['primary_email'] = $request->contactPersonEmail;
            $addVendor['secondary_email'] = $request->contactPersonAltEmail;
            $addVendor['acc_no'] = $request->accountNumber;
            $addVendor['ifsc_code'] = $request->ifsc;
            $addVendor['branch_name'] = $request->branch;
            $addVendor['bank_name'] = $request->bankName;
            $addVendor['acc_holder_name'] = $request->holderName;
            $addVendor['cash_flow'] = $request->cashFlow;
            $addVendor['vendor_group'] = $request->vendorGroup;
            $addVendor['terms_of_payment'] = $request->paymentTerms;
            $addVendor['owner_name'] = $request->ownerName;
            $addVendor['nature_of_service'] = $request->natureOfService;
            $addVendor['msme_number'] = $request->msmeNumber;
            $addVendor['gst'] = $request->gstNumber;
            $addVendor['pan'] = $request->panNumber;
            $addVendor['msme_certificate'] = $msmeCertificate;
            $addVendor['gst_certificate'] = $gstpath;
            $addVendor['cancel_cheque'] = $cancelChequepath;
            $addVendor['upload_pan'] = $panPath;
            if ($request->vendorCode) {
                $addVendor['status'] = 1;
            }

            $vendorAdded = Vendor::create($addVendor);

            if ($vendorAdded) {

                $checkUser = User::where('email', $request->contactPersonEmail)->first();
                if (empty($checkUser)) {
                    $addVendorUser['name'] = $request->contactPersonName;
                    $addVendorUser['mobile'] = $request->contactPersonMobile;
                    $addVendorUser['email'] = $request->contactPersonEmail;
                    $addVendorUser['pfu'] = $request->pfu;
                    $addVendorUser['password'] = Hash::make($request->panNumber);
                    $addVendorUser['status'] = 0;
                    $addVendorUser['is_vendor'] = 1;

                    $user = User::create($addVendorUser);
                    $user->assignRole('Vendor');
                } else {
                    $existpfu = $checkUser->pfu . ',' . $request->pfu;
                    User::where('id', $checkUser->id)->update(['pfu' => $existpfu]);
                }

                $response['success'] = true;
            } else {
                $response['success'] = false;
            }
            DB::commit();
            return response()->json($response);
        } catch (\Exception $e) {
            $response['success'] = false;
            $response['message'] = $e->getMessage();

            return response()->json($response, 500);
        }
    }

    public function viewVendorDetail(Request $request)
    {
        $awsUrl = env('AWS_S3_URL');
        $vendorDetail = Vendor::where('id', $request->vendor_id)->first();

        if ($vendorDetail) {

            return response()->json([
                'success' => true,
                'vendorDetail' => $vendorDetail,
                'awsUrl' => $awsUrl,
            ]);
        } else {
            // If vendor details are not found, return an error message
            return response()->json([
                'success' => false,
                'message' => 'Vendor details not found',
            ]);
        }

    }

    public function editVendor($id)
    {
        $vendor_id = decrypt($id);
        $vendorDetail = Vendor::where('id', $vendor_id)->first();
        return view('admin.vendor.edit-vendor', ['vendorDetail' => $vendorDetail]);
    }

    public function updateVendor(Request $request)
    {
        try {
            DB::beginTransaction();

            $validator = \Validator::make($request->all(), [
                'vendorCode' => 'unique:vendors,erp_code,' . $request->vendor_id,

            ]);

            if ($validator->fails()) {
                $errors = $validator->errors();
                $formattedErrors = [];
                foreach ($errors->keys() as $field) {
                    $formattedErrors[$field] = $errors->get($field);
                }
                return response()->json(['errors' => $formattedErrors], 422);
            }

            $existingVendor = Vendor::where('id', '!=', $request->vendor_id)->where('pfu', $request->pfu)
                ->where('pan', $request->panNumber)
                ->first();

            if ($existingVendor) {

                $response['error'] = true;
                $response['message'] = 'Vendor already exist in this pfu';
                return response()->json($response);
            }

            $checkImg = Vendor::where('id', $request->vendor_id)->first();
            // ------ Msme Certificate
            if ($request->msmeCertificate) {
                $msme = $request->file('msmeCertificate');
                $path = Storage::disk('s3')->put('vendor', $msme);
                $msmeCertificate = $path;
            } else {
                if ($checkImg) {
                    $msmeCertificate = $checkImg->msme_certificate;
                } else {
                    $msmeCertificate = null;
                }

            }
            // ------ gst Certificate
            if ($request->gstCertificate) {
                $gstupload = $request->file('gstCertificate');
                $gstpath = Storage::disk('s3')->put('vendor', $gstupload);
            } else {
                if ($checkImg) {
                    $gstpath = $checkImg->gst_certificate;
                } else {
                    $gstpath = null;
                }
            }
            // ------ cancelCheque Certificate
            if ($request->cancelCheque) {
                $cheque_upload = $request->file('cancelCheque');
                $cancelChequepath = Storage::disk('s3')->put('vendor', $cheque_upload);
            } else {
                if ($checkImg) {
                    $cancelChequepath = $checkImg->cancel_cheque;
                } else {
                    $cancelChequepath = null;
                }
            }
            // ------ uploadPan
            if ($request->panUpload) {
                $pan_upload = $request->file('panUpload');
                $panPath = Storage::disk('s3')->put('vendor', $pan_upload);
            } else {
                if ($checkImg) {
                    $panPath = $checkImg->upload_pan;
                } else {
                    $panPath = null;
                }
            }

            $updateVendor['company_name'] = $request->companyName;
            $updateVendor['nature_of_assesse'] = $request->natureOfAssesse;
            $updateVendor['erp_code'] = $request->vendorCode;
            $updateVendor['state'] = $request->state;
            $updateVendor['pin_code'] = $request->pincode;
            $updateVendor['address'] = $request->vendorAddress;
            $updateVendor['name'] = $request->contactPersonName;
            $updateVendor['designation'] = $request->contactPersonDesignation;
            $updateVendor['mobile'] = $request->contactPersonMobile;
            $updateVendor['primary_email'] = $request->contactPersonEmail;
            $updateVendor['secondary_email'] = $request->contactPersonAltEmail;
            $updateVendor['acc_no'] = $request->accountNumber;
            $updateVendor['ifsc_code'] = $request->ifsc;
            $updateVendor['branch_name'] = $request->branch;
            $updateVendor['bank_name'] = $request->bankName;
            $updateVendor['acc_holder_name'] = $request->holderName;
            $updateVendor['cash_flow'] = $request->cashFlow;
            $updateVendor['vendor_group'] = $request->vendorGroup;
            $updateVendor['terms_of_payment'] = $request->paymentTerms;
            $updateVendor['owner_name'] = $request->ownerName;
            $updateVendor['nature_of_service'] = $request->natureOfService;
            $updateVendor['msme_number'] = $request->msmeNumber;
            $updateVendor['gst'] = $request->gstNumber;
            $updateVendor['pan'] = $request->panNumber;
            $updateVendor['msme_certificate'] = $msmeCertificate;
            $updateVendor['gst_certificate'] = $gstpath;
            $updateVendor['cancel_cheque'] = $cancelChequepath;
            $updateVendor['upload_pan'] = $panPath;
            if ($request->vendorCode) {
                $updateVendor['status'] = 1;
            }

            $vendorUpdated = Vendor::where('id', $request->vendor_id)->update($updateVendor);

            if ($vendorUpdated) {

                $response['success'] = true;
            } else {
                $response['success'] = false;
            }
            DB::commit();
            return response()->json($response);
        } catch (\Exception $e) {
            $response['success'] = false;
            $response['message'] = $e->getMessage();

            return response()->json($response, 500);
        }

    }

    public function publicVendor(Request $request)
    {
        return view('vendor.public-vendor-form');
    }

    public function vendorLedgerSheet(Request $request)
    {
        $loginPfu = $request->session()->get('pfu');
        $vendorLedgerBalance = VendorLedgerBalance::where('pfu', $loginPfu)->whereDate('date_time', date('Y-m-d'))->get();
        $lastUploadData = VendorLedgerBalance::select('id', 'date_time')->where('pfu', $loginPfu)->orderBy('date_time', 'desc')->first();

        return view('ledger-sheet.vendor-ledger-sheet', ['vendorLedgerBalance' => $vendorLedgerBalance, 'lastUploadData' => $lastUploadData]);
    }

    public function uploadLedgerSheet(Request $request)
    {
        $file = $request->file('ledger_file');
        $pfu = $request->pfu;
        $failedRows = [];

        try {
            $import = new VendorLedgerImport($pfu);
            Excel::import($import, $file);

            $failedRows = $import->getFailedRows();
           
            // Check if any failed rows exist
            if (!empty($failedRows)) {
                $response['failedRows'] = $failedRows;
            }
            
            $response['failedRows'] = $failedRows;
            $response['success'] = true;
            return response()->json($response);
        } catch (\Exception $e) {
            $response['success'] = false;
            $response['message'] = $e->getMessage();
            $response['failedRows'] = $failedRows; 

            return response()->json($response, 500);
        }
    }
    public function vendorLedgerSample()
    {
        $path = public_path('sample/vendor_ledger.csv');
        return response()->download($path);
    }

    public function vendorInvoiceDue(Request $request)
    {
        $loginPfu = $request->session()->get('pfu');
        $vendorInvoiceDue = VendorInvoiceDue::where('pfu', $loginPfu)->whereDate('date_time', date('Y-m-d'))->get();
        $lastUploadData = VendorInvoiceDue::select('id', 'date_time')->where('pfu', $loginPfu)->orderBy('date_time', 'desc')->first();
        return view('invoice-dues.invoice-dues', ['vendorInvoiceDue' => $vendorInvoiceDue, 'lastUploadData' => $lastUploadData]);
    }

    public function uploadVendorInvoice(Request $request)
    {

        $file = $request->file('invoice_dues');
        $pfu = $request->pfu;
        $failedRows = [];
        try {
            $import = new VendorInvoiceDueImport($pfu);
            Excel::import($import, $file);

            $failedRows = $import->vendorLedgerNotUpload();
            // Check if any failed rows exist
            if (!empty($failedRows)) {
                $response['failedRows'] = $failedRows;
            }
            
            $response['failedRows'] = $failedRows;
            $response['success'] = true;
            return response()->json($response);
        } catch (\Exception $e) {
            $response['success'] = false;
            $response['message'] = $e->getMessage();
            $response['failedRows'] = $failedRows; 

            return response()->json($response, 500);
        }
    }
}
