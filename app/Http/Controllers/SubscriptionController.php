<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    /**
     * Grab plan lists and return to view
     * @return view
     */
    public  function index()
    {
        $plans = Plan::all();
        return view('users.subscription', compact('plans'));
    }
}
