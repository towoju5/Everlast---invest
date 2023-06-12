<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Grab all users collection  form  ::DB
     */
    public function index()
    {
        $users = User::orderBy('created_at','desc')->withTrashed()->paginate(per_page());
        return view('admin.users.index', compact('users'));
    }

    /**
     * View a particular user data.
     */
    public function show($userId)
    {
        $user = User::findorfail($userId)
                    ->makeHidden([
                        'created_at',
                        'updated_at',
                        'deleted_at',
                        'kyc_verified',
                        'kyc_file_path',
                        'email_verified_at',
                        'account_status',
                        'id'
                    ]);
        return view('admin.users.show', compact(['user']));
    }

    /**
     * View a particular user data.
     */
    public function action($userId, $action)
    {
        $user = User::whereId($userId)->withTrashed()->first();

        if($action == 'ban'){
            $user->deleted_at = now();
        } elseif ($action == 'unban') {
            $user->deleted_at = null;
        }
        if($user->save()){
            return back()->with('success', 'Action  completed successfully');
        }
        return back()->with('error', 'Unable to complete action');
    }

    /**
     * Add and subtract balance.
     */
    public function balance(Request $request, $userId)
    {
        $request->validate([
            'amount'    =>  'numeric|required|min:0',
            'wallet'    =>  'required|in:profit,balance,bonus',
            'action'    =>  'required|in:debit,credit'
        ]);

        $user = User::findorfail($userId);
        if($request->action == 'debit'){
            $user->decrement($request->wallet,  $request->amount);
        }

        if($request->action == 'credit'){
            $user->increment($request->wallet,  $request->amount);
        }

        return back()->with('success', 'Action completed succesfully');
    }

    // public function add_substract_balance(Request $request)
    // {
    //     $request->validate([
    //         'user'  =>  'required',
    //         'action'=>  'required',
    //         'amount'=>  'required|numeric',
    //         'wallet'=>  'required',
    //     ]);

    //     $user = User::findorfail($request->user);
    //     $wallet = $request->wallet;
    //     if($request->action == 'add'){
    //         $user->$wallet += $request->amount;
    //     } else {
    //         $user->$wallet -= $request->amount;
    //     }
    //     if($user->save()){
    //         return back()->with('success', 'Action completed successfully');
    //     }

    //     return back()->with('error', 'Error encountered');
    // }

    /**
     * Grab all investment by a particular user.
     */
    public function investments($userId)
    {
        $collection = Invest::whereUserId($userId)->orderBy('invest_status', true)->paginate(per_page());
        return $collection;
    }
}
