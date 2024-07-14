<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\admin\LoginController as AdminLoginController;
use App\Http\Controllers\admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\admin\WController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\WithdrawController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\Admin\ResultController;
use App\Models\Result;

Route::get('/', [TemplateController::class, 'index']);


Route::group(['prefix'=>'account'],function(){
    //guest middleware
    Route::group(['middleware'=>'guest'],function(){

        Route::get('sign-up', [SignUpController::class, 'index'])->name('account.register');
        Route::post('process-sign-up', [SignUpController::class, 'register'])->name('account.processRegister');
        Route::get('login', [LoginController::class, 'index'])->name('account.login');
        Route::post('authenticate', [LoginController::class, 'authenticate'])->name('account.authenticate');//login auth

    });
    //authenticated middleware
    Route::group(['middleware'=>'auth'],function(){

        Route::get('logout', [LoginController::class, 'logout'])->name('account.logout');
        Route::get('user-dashboard', [DashboardController::class, 'index'])->name('account.dashboard');
        Route::get('deposit', [DepositController::class, 'index'])->name('account.deposit');
        Route::get('withdraw', [WithdrawController::class, 'index'])->name('account.withdraw');
        Route::get('wallet', [WalletController::class, 'index'])->name('account.wallet');
        Route::get('team', [TeamController::class, 'index'])->name('account.team');
        
        Route::post('deposit/store', [DepositController::class, 'store'])->name('deposits.store');
        Route::post('withdraw/store', [WithdrawController::class, 'store'])->name('withdraw.store');

        Route::get('/user/result', function() {
            $latestResult = Result::latest()->first();
            return response()->json(['result' => $latestResult->result]);
        })->name('user.result');

        


 






    });

});





Route::get('/admin/login', [AdminLoginController::class, 'index'])->name('admin.login');
Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/withdrawal', [WController::class, 'index'])->name('admin.withdrawal');
Route::post('admin/authenticate', [AdminLoginController::class, 'authenticate'])->name('admin.authenticate');//login auth
//deposit
Route::post('/deposits/approve/{id}', [AdminDashboardController::class, 'approve'])->name('deposits.approve');
Route::post('/deposits/reject/{id}', [AdminDashboardController::class, 'reject'])->name('deposits.reject');
//withdrawal
Route::post('/admin/withdrawal/{id}', [WController::class, 'update'])->name('admin.withdrawal.update');
//Signal
Route::get('/admin/result', [ResultController::class, 'index'])->name('admin.result');
Route::post('/admin/result', [ResultController::class, 'store'])->name('admin.result.store');



Route::get('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');


