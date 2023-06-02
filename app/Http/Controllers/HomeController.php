<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\Deposit;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('logout');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $withdrawal         = Withdrawal::whereUserId($user->id)->count();
        $total_withdrawal   = Withdrawal::whereUserId($user->id)->sum('amount');
        $deposit            = Deposit::whereUserId($user->id)->count();
        return $total_deposit      = Deposit::whereUserId($user->id)->sum('amount');
        return view('home', compact(['withdrawal', 'total_withdrawal', 'deposit', 'total_deposit']));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function events()
    {
        $logs = ActivityLog::whereId(auth()->id())->orderBy('created_at', 'desc')->paginate(per_page());
        $logs = DB::table('notifications')->select(['data', 'created_at'])->where('notifiable_id', auth()->id())->orderBy('created_at', 'desc')->paginate(per_page());
        return view('users.logs', compact('logs'));
    }

}
