<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('admin.auth.login');
    }

    public function process_login(Request  $request)
    {
        $credentials = $request->validate([
            'email'     =>  'required',
            'password'  =>  'required'
        ]);

        $do_login = Auth::guard('admin')->attempt($credentials);

        if($do_login) {
            Auth::guard('admin')->loginUsingId(auth('admin')->user(), true);
            // if(auth('admin')->check()){
            //     var_dump(auth('admin')->user()); exit;
            // }
            return redirect(route('admin.dashboard'));
        }

        return back()->withErrors('Invalid credentials');
    }
}
