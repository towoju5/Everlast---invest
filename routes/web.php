<?php

use App\Http\Controllers\Admin\DepositMethodController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SignalController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\TradingController;
use App\Http\Controllers\WithdrawController;
use App\Models\Withdrawal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::group(['middleware' => ['web', 'auth', 'kyc']], function () {
    Route::get('home',              [HomeController::class,         'index'])->name('home');
    Route::get('dashboard',         [DashboardController::class,    'index'])->name('dashboard');
    Route::get('activity-log',      [HomeController::class,         'events'])->name('events');
    Route::get('subscription',      [SubscriptionController::class, 'index'])->name('subscription');
    Route::get('referral',          [SubscriptionController::class, 'referral'])->name('referral');


    Route::group(['prefix' => 'deposit'], function() {
        Route::get('list',      [DepositController::class,      'index'])->name('deposit');
        Route::post('process',  [DepositController::class,     'process_deposit'])->name('deposit.process');
        Route::get('status/{id}/{action}',  [DepositController::class,     'update_status'])->name('deposit.status');
    });

    Route::group(['prefix' => 'subscribe'], function() {
        Route::post('plan/{id}',        [SubscriptionController::class, 'process'])->name('subscribe.post');
        Route::post('process',          [SubscriptionController::class, 'update_status'])->name('process.signal');
    });

    Route::group(['prefix' => 'signal'], function() {
        Route::post('process/{id}', [SignalController::class, 'process'])->name('subscribe.post');
        Route::post('purchase',     [SignalController::class, 'update_status'])->name('process.signal');
    });

    Route::group(['prefix' => 'trade'], function() {
        Route::post('/',        [TradingController::class, 'index'])->name('trade');
        Route::post('process',  [TradingController::class, 'update_status'])->name('trade.process');
    });

    Route::group(['prefix' => 'withdrawal'], function() {
        Route::get('/',                     [WithdrawController::class,     'index'])->name('withdrawal');
        Route::get('status/{id}/{action}',  [WithdrawController::class,     'update_status'])->name('withdrawal.status');
        Route::post('process',              [WithdrawController::class,     'process_withdrawal'])->name('withdrawal.process');
    });
});
Route::get('logout',    [HomeController::class, 'logout'])->name('logout');
