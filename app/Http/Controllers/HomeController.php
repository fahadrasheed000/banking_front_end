<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $banks=$this->getBanksList();
        return view('home',compact('banks'));
    }

    function getBanksList()
    {
           
            /**
             * apiRequest app/Http/Helpers/ApiRequestHelper 
             * custom helper handle all types of request
             */
            $response = apiRequest('/bank/get_banks', 'get', ['Accept' => 'application/json','Authorization'=>"Bearer ".session('access_token').""], "");
            $responseBody = json_decode($response->getBody(), true);
            if ($responseBody['status'] == "success") {
              return $responseBody['data'];
            } else {
                return [];
            }
        
    }
}
