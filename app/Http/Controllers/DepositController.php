<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Notifications\UpdateNotification;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    public function index()
    {
        $deposits = Deposit::whereUserId(auth()->id())->orderBy('created_at', 'desc')->paginate(per_page());
        return view('users.deposit.index', compact('deposits'));
    }

    public function process_deposit(Request $request)
    {
        $request->validate([
            'payment_method'    =>  'required',
            'amount'            =>  'required',
            'payment_verify'    =>  'required'
        ]);

        $user  = $request->user();

        $deposit = Deposit::create([
            "user_id"       =>  $user->id,
            "currency"      =>  $request->payment_method,
            "amount"    	=>  $request->amount,
            "proof_of_pay"  =>  save_image('deposit', $request->payment_verify),
        ]);

        $notif = [
            'title' =>  "withdrawal request",
            "body"  =>  "You deposit request of $request->amount via $request->payment_method  has been inititated successfully.\nPlease  make payment and upload your proof of payment to complete deposit process"
        ];


        if ($deposit) {
            $user->notify(new UpdateNotification($notif));
            return back()->with('success', 'Request received successfully');
        }
        return back()->with('error', 'Unable to process deposit request at the moment, please try again later');
    }

    public function update_status($id, $action)
    {
        if(Deposit::whereId($id)->whereUserId(request()->user()->id)->update(['status' => get_status($action)])){
            return back()->with('success', 'Action completed successfully');
        }
        return back()->with('error', 'Error encourted');
    }
}
