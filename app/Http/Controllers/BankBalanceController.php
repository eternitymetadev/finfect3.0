<?php

namespace App\Http\Controllers;

use App\Models\BankDetail;
use Illuminate\Http\Request;

class BankBalanceController extends Controller
{

    public function myBankBalance()
    {
        return view('my-bank-balance.my-bank-balance');
    }

    public function storeBank(Request $request)
    {

        $validator = \Validator::make($request->all(), [
            'accountNumber' => 'required',
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

        $pfu = '2';
        // Check if the account number or PFU ID already exists in the database
        $existingBank = BankDetail::where('bank_acc_no', $request->accountNumber)
            ->Where('pfu_id', $pfu)
            ->first();

        if ($existingBank) {

            $response['errors'] = true;
            $response['message'] = 'Account number or Pfu already exists.';
            return response()->json($response);
        }

        $addBank['bank_acc_no'] = $request->accountNumber;
        $addBank['acc_holder_name'] = $request->holderName;
        $addBank['ifsc_code'] = $request->ifsc;
        $addBank['branch_name'] = $request->branch;
        $addBank['bank_name'] = $request->bankName;
        $addBank['pfu_id'] = $pfu;
        if ($request->is_active) {
            $addBank['status'] = 1;
        } else {
            $addBank['status'] = 0;
        }

        $add = BankDetail::create($addBank);

        if ($add) {
            $response['success'] = true;
        } else {
            $response['success'] = false;
        }

        return response()->json($response);
    }
}
