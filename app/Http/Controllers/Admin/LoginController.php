<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        // Admin::create([
        //     'email' =>  'admin@gmail.com',
        //     'password'=>    bcrypt('123456'),
        //     'name'  =>  'super admin'
        // ]);

        $login_url = route('admin.login');
        // $errors = validator();
        return view('admin.auth.login', compact('login_url'));
    }

    public function process_login(Request  $request)
    {
        $credentials = $request->validate([
            'email'     =>  'required',
            'password'  =>  'required'
        ]);

        $login = auth('admin')->attempt($credentials, true);

        if($login) {
            return redirect(route('admin.dashboard'));
        }

        return back()->withErrors('Invalid credentials');
    }
}
