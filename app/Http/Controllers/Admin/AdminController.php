<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\User;
use App\Models\Withdrawal;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $users              = User::count();
        $balance            = User::sum('balance');
        $profit             = User::sum('profit');
        $bonus              = User::sum('bonus');
        $withdrawal         = Withdrawal::count();
        $total_withdrawal   = Withdrawal::sum('amount');
        $deposits           = Deposit::count();
        $total_deposit      = Deposit::sum('amount');
        return view('admin.dashboard',  compact('balance', 'profit', 'bonus', 'users', 'withdrawal', 'total_withdrawal', 'deposits', 'total_deposit'));
    }
}
