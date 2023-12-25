<?php

namespace App\Http\Controllers;

use App\Models\BankDetail;
use App\Models\BankBalance;
use Illuminate\Http\Request;

class BankBalanceController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:BankBalance', ['only' => ['myBankBalance']]);
    }

    public function myBankBalance(Request $request)
    {
        $loginPfu = $request->session()->get('pfu');
        $bankdetails = BankDetail::where('status',1)->where('pfu_id', $loginPfu)->get();
        return view('my-bank-balance.my-bank-balance',['bankdetails' => $bankdetails]);
    }

    public function storeBank(Request $request)
    {
       
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

        $pfu = $request->pfu;
        // Check if the account number or PFU ID already exists in the database
        // $existingBank = BankDetail::where('bank_acc_no', $request->accountNumber)
        //     ->Where('pfu_id', $pfu)
        //     ->first();

        // if ($existingBank) {

        //     $response['errors'] = true;
        //     $response['message'] = 'Account number or Pfu already exists.';
        //     return response()->json($response);
        // }

        $addBank['bank_acc_no'] = $request->accountNumber;
        $addBank['acc_holder_name'] = $request->holderName;
        $addBank['ifsc_code'] = $request->ifsc;
        $addBank['branch_name'] = $request->branch;
        $addBank['bank_name'] = $request->bankName;
        $addBank['pfu_id'] = $pfu;
        // if ($request->is_active) {
            $addBank['status'] = 1;
        // } else {
        //     $addBank['status'] = 0;
        // }

        $add = BankDetail::create($addBank); 

        if ($add) {
            $response['success'] = true;
        } else {
            $response['success'] = false;
        }

        return response()->json($response);
    }

     public function updateBankBalance(Request $request)
     {
        
        $addBankBalance['bank_detail_id'] = $request->bank_id;
        $addBankBalance['bank_balance'] = $request->amount;
        $addBankBalance['date'] = date('Y-m-d');

        $addBalance = BankBalance::create($addBankBalance); 

        if ($addBalance) {
            $response['success'] = true;
        } else {
            $response['success'] = false;
        }

        return response()->json($response);
     }
}
