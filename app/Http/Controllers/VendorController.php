<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vendor;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Storage;

class VendorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:vendor-dashboard', ['only' => ['vendorDashboard']]);
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

}
