<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pfu;

class PfuController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:pfu-list|save-pfu', ['only' => ['pfuList','storePfu']]);
        // $this->middleware('permission:create-user', ['only' => ['create','store']]);
        // $this->middleware('permission:edit-user', ['only' => ['edit','update']]);
        // $this->middleware('permission:delete-user', ['only' => ['destroy']]);
    }

    public function pfuList()
    {
        $pfuLists = Pfu::get();

       return view('admin.pfu.pfu',['pfuLists' => $pfuLists]);
    }
    
    public function storePfu(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'pfuName' => 'required|unique:pfus,pfu',
            'domain' => 'required',
            'clientCode' => 'required',
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
    
       $savePfu['pfu'] = $request->pfuName;
       $savePfu['domain'] = $request->domain;
       $savePfu['client_code'] = $request->clientCode;

       $save = Pfu::create($savePfu);
        
       if($save){
            $response['success'] = true;
       }else{
        $response['success'] = false;
       }

    
        return response()->json($response);
    }
}
