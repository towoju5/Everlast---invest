<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
            'amount'=>  'required|numeric'
        ]);
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
