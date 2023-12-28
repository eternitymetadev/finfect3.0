<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use App\Models\User;
use DB;
use Illuminate\Http\Request;

class VendorController extends Controller
{

    public function vendorDashboard(Request $request)
    {

        return view('vendor.vendor-dashboard');
    }

    public function vendorCreate(Request $request)
    {

        return view('admin.vendor.add-vendor');
    }

    public function addVendor(Request $request)
    {
        try {

          
        $existingVendor = Vendor::where('pfu', $request->pfu)
            ->where('pan', $request->panNumber)
            ->first();

        if ($existingVendor) {

            $response['errors'] = true;
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

            $vendorAdded = Vendor::create($addVendor);

            if ($vendorAdded) {

                $addVendorUser['name'] = $request->contactPersonName;
                $addVendorUser['mobile'] = $request->contactPersonMobile;
                $addVendorUser['email'] = $request->contactPersonEmail;
                $addVendorUser['pfu'] = $request->pfu;
                $addVendorUser['password'] = Hash::make($request->panNumber);
                $addVendorUser['status'] = 0;

                $user = User::create($addVendorUser);
                $user->assignRole('Vendor');

                $response['success'] = true;
            } else {
                $response['success'] = false;
            }

            return response()->json($response);
        } catch (\Exception $e) {
            $response['success'] = false;
            $response['message'] = $e->getMessage();

            return response()->json($response, 500); 
        }
    }

}
