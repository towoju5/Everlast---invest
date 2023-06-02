<?php

namespace App\Http\Controllers;

use App\Models\Withdrawal;
use App\Notifications\UpdateNotification;
use Illuminate\Http\Request;

class WithdrawController extends Controller
{
    public function index()
    {
        $withdraw = Withdrawal::whereUserId(auth()->id())->orderBy('created_at', 'desc')->paginate(per_page());
        return view('users.withdraw.index', compact('withdraw'));
    }

    public function process_withdrawal(Request $request)
    {
        $request->validate([
            'amount'            =>  'required|int|min:'.settings('minimum_withdrawal_amount'),
            'payment_method'    =>  "required|in:bank,bitcoin",
        ]);

        $user = $request->user();
        if($request->amount > $user->profit){
            return redirect()->back()->with('error', 'Insufficient profit balance');
        }

        $info = [];

        if($request->payment_method == 'bitcoin'){
            $request->validate([
                "bitcoin_address"    =>  "required"
            ]);
            $info['bitcoin_address'] = $request->bitcoin_address;
        }

        if($request->payment_method == 'bank'){
            $request->validate([
                "bank_name"         =>  "required",
                "account_name"      =>  "required",
                "account_number"    =>  "required|int"
            ]);

            $info['bank_name']      = $request->bank_name;
            $info['account_name']   = $request->account_name;
            $info['account_number'] = $request->account_number;
        }

        $user = request()->user();
        $user->profit  -=  $request->amount;
        $user->save();

        $withdraw = Withdrawal::create([
            'user_id'   =>  $user->id,
            'amount'    =>  $request->amount,
            'withdrawal_info'   =>  $info,
            'payment_method'    =>  $request->payment_method,
        ]);

        $notif = [
            'title' =>  "withdrawal request",
            "body"  =>  "You withdrawal request of $request->amount via $request->payment_method  has been inititated successfully, and will be process soon"
        ];

        if ($withdraw) {
            $user->notify(new UpdateNotification($notif));
            return back()->with('success', 'Withdrawal request received successfully');
        }
        return back()->with('error', 'Unable to process withdrawal request at the moment, please try again later');
    }

    public function update_status($id, $action)
    {
        $wd = Withdrawal::whereId($id)->first();
        $wd->status = get_status($action);
        if($wd->save()){
            if ($action == 'cancel') {
                $user = request()->user();
                $user->profit  +=  $wd->amount;
                $user->save();
            }
            $notif = [
                'title' =>  "withdrawal status updated",
                "body"  =>  "You withdrawal status has been successfully  updated to '$action'  as requested by you."
            ];
            $user->notify(new UpdateNotification($notif));
            return back()->with('success', 'Action completed successfully');
        }
        return back()->with('error', 'Error encourted');
    }
}
