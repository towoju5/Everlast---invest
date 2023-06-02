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
        $users = User::orderBy('created_at','desc')->paginate(per_page());
        return view('admin.users.index', compact('users'));
    }

    /**
     * View a particular user data.
     */
    public function show($userId)
    {
        $user = User::findorfail($userId);
        return view('admin.users.show', compact(['user']));
    }

    /**
     * Add and subtract balance.
     */
    public function add_substract_balance(Request $request)
    {
        $request->validate([
            'user'  =>  'required',
            'action'=>  'required',
            'amount'=>  'required|numeric',
            'wallet'=>  'required',
        ]);

        $user = User::findorfail($request->user);
        $wallet = $request->wallet;
        if($request->action == 'add'){
            $user->$wallet += $request->amount;
        } else {
            $user->$wallet -= $request->amount;
        }
        if($user->save()){
            return back()->with('success', 'Action completed successfully');
        }

        return back()->with('error', 'Error encountered');
    }

    /**
     * Grab all investment by a particular user.
     */
    public function investments($userId)
    {
        $collection = Invest::whereUserId($userId)->orderBy('invest_status', true)->paginate(per_page());
        return $collection;
    }
}
