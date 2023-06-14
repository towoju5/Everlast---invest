<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DepositController;
use App\Http\Controllers\Admin\DepositMethodController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WithdrawalController;
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

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('login', [LoginController::class, 'process_login'])->name('process_login');

Route::group(['middleware' => ['web','auth']], function () {

    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::group(['prefix' => 'user'], function() {
        Route::get('all',                   [UserController::class, 'index'])->name('users');
        Route::get('show/{userId}',         [UserController::class, 'show'])->name('user.show');
        Route::get('action/{id}/{action}',  [UserController::class, 'action'])->name('user.ban');
        Route::post('balance/{userId}',     [UserController::class, 'balance'])->name('user.balance');
    });

    Route::group(['prefix' => 'deposit'], function() {
        Route::get('/',                     [DepositController::class,  'index'])->name('deposit');
        Route::get('list',                  [DepositController::class,  'index'])->name('deposit.list');
        Route::get('show/{id}',             [DepositController::class,  'show'])->name('deposit.show');
        Route::get('status/{id}/{action}',  [DepositController::class,  'update_status'])->name('deposit.status');
    });

    Route::group(['prefix' => 'deposit-method'], function() {
        Route::get('/',                 [DepositMethodController::class,     'index'])->name('deposit.method');
        Route::get('show/{id}',         [DepositMethodController::class,     'show'])->name('deposit.method.show');
        Route::get('edit/{id}',         [DepositMethodController::class,     'show'])->name('deposit.method.edit');
        Route::post('edit/{id}/update', [DepositMethodController::class,     'update'])->name('deposit.method.update');
        Route::post('store',            [DepositMethodController::class,     'store'])->name('deposit.method.store');
        Route::get('delete/{id}',       [DepositMethodController::class,     'destroy'])->name('deposit.method.delete');
    });

    Route::group(['prefix' => 'subscribe'], function() {
        Route::post('plan/{id}',        [SubscriptionController::class, 'process'])->name('subscribe.post');
        // Route::post('process',          [SubscriptionController::class, 'update_status'])->name('trade.process');
    });

    Route::group(['prefix' => 'trade'], function() {
        Route::post('/',        [TradingController::class, 'index'])->name('trade');
        Route::post('process',  [TradingController::class, 'update_status'])->name('trade.process');
    });

    Route::group(['prefix' => 'plan'], function() {
        Route::get('/',             [PlanController::class, 'index'])->name('plans');
        Route::post('/',            [PlanController::class, 'store'])->name('plan.store');
        Route::get('edit/{id}',     [PlanController::class, 'edit'])->name('plan.edit');
        Route::get('show/{id}',     [PlanController::class, 'show'])->name('plan.show');
        Route::post('update/{id}',  [PlanController::class, 'update'])->name('plan.update');
        Route::get('create',        [PlanController::class, 'create'])->name('plan.create');
        Route::post('delete/{id}',  [PlanController::class, 'destroy'])->name('plan.delete');
    });

    Route::group(['prefix' => 'withdrawal'], function() {
        Route::get('/',                     [WithdrawalController::class,     'index'])->name('withdrawal');
        Route::get('status/{id}/{action}',  [WithdrawalController::class,     'update_status'])->name('withdrawal.status');
        Route::get('show/{id}',             [WithdrawalController::class,     'show'])->name('withdrawal.show');
        Route::post('process',              [WithdrawalController::class,     'process_withdrawal'])->name('withdrawal.process');
    });
});