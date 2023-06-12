<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\User;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    public function index()
    {
        $r = request();
        $status = false;
        if($r->has('status') && !empty($r->status)){
            $status = get_status($r->status);
        }
        $deposits = Deposit::whereStatus($status)->orderBy('created_at', 'desc')->paginate(per_page());
        return view('admin.deposit.index', compact('deposits'));
    }

    /**
     * @action cancel, success, failed, pending
     * @method get_status to get status ID
     * @return back  previous pahe
     */
    public function update_status($id, $action)
    {
        if(Deposit::whereId($id)->update(['status' => get_status($action)])){
            return back()->with('success', 'Action completed successfully');
        }
        return back()->with('error', 'Error encourted');
    }

    public function show($id)
    {
        $deposit  = Deposit::findorfail($id);
        return view('admin.deposit.show', compact('deposit'));
    }
}
