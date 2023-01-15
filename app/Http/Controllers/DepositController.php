<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DepositRequest;


class DepositController extends Controller
{


    function saveDeposit(DepositRequest $request)
    {
        $data = array(
            'user_id' => session('user_id'),
            'account_id' => session('account_id'),
            'amount' => $request->amount
        );
       
        /**
         * apiRequest app/Http/Helpers/ApiRequestHelper 
         * custom helper handle all types of request
         */
        $response = apiRequest('/deposits/save_deposit', 'post', ['Accept' => 'application/json','Authorization'=>"Bearer ".session('access_token').""], $data);
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
}
