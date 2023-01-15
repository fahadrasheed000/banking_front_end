<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\LoginRequest;

class UserController extends Controller
{
    public function index()
    {
        $getAll = $this->getAllUsersWithRoles();
        $users = $getAll['data'];
        $currentUser = $getAll['current_user'];
        return view('users.index', compact('users', 'currentUser'));
    }
    public function login(LoginRequest $request)
    {
        /**
         * apiRequest app/Http/Helpers/ApiRequestHelper 
         * custom helper handle all types of request
         */
        $response = apiRequest('/login', 'post', ['Accept' => 'application/json'], $request->all());
        $responseBody = json_decode($response->getBody(), true);
        if ($responseBody['status'] == "success") {
            /**
             * setSession app/Http/Helpers/GlobalHelper.php
             * custom helper to set session
             */
            setSession($responseBody, $response->header('Authorization'));
            return redirect()->route('home')->with('success', $responseBody['message']);
        } else {
            return redirect()->route('users.login')->with('error', $responseBody['message']);
        }
    }
    public function logout()
    {
        if (session()->has('access_token')) {
            session()->flush();
            return redirect()->route('users.login');
        } else {
            return redirect()->route('users.login');
        }
    }
}
