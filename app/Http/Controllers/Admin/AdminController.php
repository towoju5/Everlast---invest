<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Deposit;
use App\Models\User;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function dashboard(Request $request)
    {
        // $user = $request->user();
        // $user->givePermissionTo('admin');
        // return $user->permissions;

        $users = User::count();
        $balance = User::sum('balance');
        $profit = User::sum('profit');
        $bonus = User::sum('bonus');
        $withdrawal = Withdrawal::count();
        $total_withdrawal = Withdrawal::sum('amount');
        $deposits = Deposit::count();
        $total_deposit = Deposit::sum('amount');
        return view('admin.dashboard', compact('balance', 'profit', 'bonus', 'users', 'withdrawal', 'total_withdrawal', 'deposits', 'total_deposit'));
    }

    public function users()
    {
        $users = User::paginate(per_page());
        return view('admin.users.index', compact('users'));
    }
}
