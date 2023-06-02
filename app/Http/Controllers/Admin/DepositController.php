<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    public function index()
    {
        $deposits = Deposit::orderBy('created_at', 'desc')->paginate(per_page());
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
}
