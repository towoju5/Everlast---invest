<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\Trade;
use App\Models\User;
use App\Models\Withdrawal;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();
        // $user = $request->user();
        // $user->givePermissionTo('standard');
        // $user->revokePermissionTo('admin');
        // return $user->permissions;
        // return $user->getAllPermissions();

        // return $user->can('read articles');
        $withdrawal         = Withdrawal::whereUserId($user->id)->whereStatus(true)->count();
        $total_withdrawal   = Withdrawal::whereUserId($user->id)->whereStatus(true)->sum('amount');
        $deposits           = Deposit::whereUserId($user->id)->whereStatus(true)->count();
        $total_deposit      = Deposit::whereUserId($user->id)->whereStatus(true)->sum('amount');
        $trades             = Trade::whereUserId($user->id)->orderBy('created_at', 'desc')->limit(10)->get();
        return view('home', compact(['withdrawal', 'total_withdrawal', 'deposits', 'total_deposit', 'trades']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
