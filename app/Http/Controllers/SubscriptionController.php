<?php

namespace App\Http\Controllers;

use App\Models\Invest;
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

    /**
     * Process subscription plan request
     */
    public function process(Request $request, $planId)
    {
        $plan = Plan::findorfail($planId);
        $request->validate([
            'amount'    =>  "numeric|required|min:$plan->minimum_amount|max:$plan->maximum_amount"
        ]);

        $invest = new Invest();
        $invest->
    }
}
