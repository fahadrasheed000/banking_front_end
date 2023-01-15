<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class BankTransferController extends Controller
{


    
    function saveBankTransfer(Request $request)
    {
        $data = array(
            'user_id' => session('user_id'),
            'from_account' => session('account_id'),
            'to_account' => $request->to_account,
            'amount' => $request->amount
        );
       
        /**
         * apiRequest app/Http/Helpers/ApiRequestHelper 
         * custom helper handle all types of request
         */
        $response = apiRequest('/bank/transfer', 'post', ['Accept' => 'application/json','Authorization'=>"Bearer ".session('access_token').""], $data);
        $responseBody = json_decode($response->getBody(), true);
        if ($responseBody['status'] == "success") {
            /**
             * resetSession app/Http/Helpers/GlobalHelper .php
             * custom helper to reset session
             */
            resetSession($responseBody);
            return redirect()->route('home')->with('success', $responseBody['message']);
        } else {
            return redirect()->route('home')->with('error', $responseBody['message']);
        }
    }


    function verifyReceiverAccount(Request $request)
    {
        $html="";
        if($request->account_no != session('account_number')){
            $data=array('bank_id'=>$request->bank_id, "account_no" => $request->account_no);
      $response = apiRequest('/bank/account/verify', 'post', ['Accept' => 'application/json','Authorization'=>"Bearer ".session('access_token').""],$data);
        $responseBody = json_decode($response->getBody(), true);
        if ($responseBody['status'] == "success") {
           $html.='<div  class="newsection col-md-12">
           <div class="form-group">
               <label for="name">Amount:</label>
               <input type="number" min="1" max="'.session('balance').'" id="tamount"  name="amount" class="form-control"
                   placeholder="" required>
                   <input type="hidden" value="'.$responseBody['data']['account_id'].'" name="to_account">
           </div>
       </div>
       <div class="newsection col-md-12">
           <div style="float:right">
               <button type="button" class="btn btn-danger"
                   onclick="closeTransferModal()">Cancel</button>
               <button type="submit" class="btn btn-primary hiddensection">Transfer</button>
           </div>
       </div>';
       return response()->json(['status'=>0,'message'=>"Account is not valid","data" =>$html ]);
        } else {
           return response()->json(['status'=>1,'message'=>"Account is not valid"]);
        }
    }else{
        return response()->json(['status'=>1,'message'=>"Sorry you can't transfer into same account"]);
    }
    }
}
