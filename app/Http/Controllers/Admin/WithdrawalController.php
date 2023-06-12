<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Withdrawal;
use Illuminate\Http\Request;

class WithdrawalController extends Controller
{
    public function index()
    {
        $r = request();
        $status = false;
        if($r->has('status') && !empty($r->status)){
            $status = get_status($r->status);
        }
        $deposits = Withdrawal::whereStatus($status)->orderBy('created_at', 'desc')->with(['user'])->paginate(per_page());
        return view('admin.payout.index', compact('deposits'));
    }

    /**
     * @action cancel, success, failed, pending
     * @method get_status to get status ID
     * @return back  previous pahe
     */
    public function update_status($id, $action)
    {
        if(Withdrawal::whereId($id)->update(['status' => get_status($action)])){
            return back()->with('success', 'Action completed successfully');
        }
        return back()->with('error', 'Error encourted');
    }

    public function show($id)
    {
        $data  = Withdrawal::whereId($id)->first();
        if(!empty($data)){
            $withdrawal['withdrawal_info']   =  $data->withdrawal_info;
            $withdrawal['customer_name']     =  $data->user->name;
            $withdrawal['customer_email']    =  $data->user->email;
            $withdrawal['amount']            =  $data->currency . $data->amount;
            $withdrawal['payment_method']    =  $data->payment_method;
            
            if ($data->status == 1)
                $withdrawal['status'] = 'Successful';
            elseif($data->status == 0)
                $withdrawal['status'] = 'Pending';
            elseif($data->status == 3)
                $withdrawal['status'] = 'Failed';

        }
        return view('admin.payout.show', compact('withdrawal'));
    }
}
