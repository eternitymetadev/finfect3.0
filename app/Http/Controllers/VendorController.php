<?php

namespace App\Http\Controllers;

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
        echo'<pre>'; print_r($request->all()); die;
       
        $validator = \Validator::make($request->all(), [
            'accountNumber' => 'required|unique:bank_details,bank_acc_no',
            'holderName' => 'required',
            'ifsc' => 'required',
            'branch' => 'required',
            'bankName' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $formattedErrors = [];
            // Loop through each field's errors
            foreach ($errors->keys() as $field) {
                $formattedErrors[$field] = $errors->get($field);
            }
            return response()->json(['errors' => $formattedErrors], 422);
        }

        $addBank['bank_acc_no'] = $request->companyName;
        $addBank['acc_holder_name'] = $request->natureOfAssesse;
        $addBank['ifsc_code'] = $request->vendorCode;
        $addBank['branch_name'] = $request->branch;
        $addBank['bank_name'] = $request->bankName;
        $addBank['pfu_id'] = $pfu;

        $add = BankDetail::create($addBank); 

        if ($add) {
            $response['success'] = true;
        } else {
            $response['success'] = false;
        }

        return response()->json($response);
    }

}
