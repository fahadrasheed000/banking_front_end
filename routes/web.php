<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\UserController;

use App\Http\Controllers\DepositController;

use App\Http\Controllers\BankTransferController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get(
    '/',
    function () {
       if (!session()->has('access_token')) {
            return view('users.login');
        } else {
            return redirect('/home');
        }
    }
)->name('users.login');
    Route::post('login', [UserController::class, 'login']);
    Route::group(['middleware' => ['auth.jwt']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::post('/deposits', [DepositController::class, 'saveDeposit'])->name('deposits.save');
    Route::post('/verify_receiver_account', [BankTransferController::class, 'verifyReceiverAccount'])->name('verify.account');
    Route::post('/save_bank_transfer', [BankTransferController::class, 'saveBankTransfer'])->name('transfer.save');
    Route::get('logout', [UserController::class, 'logout'])->name('users.logout');
});

