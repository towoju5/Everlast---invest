<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Get all subscription plans
     */
    public function index()
    {
        $plans = Plan::paginate(per_page());
        return view('admin.plans.index', compact('plans'));
    }

    /**
     * Create a new subscription plan
     */
    public function create()
    {
        return view('admin.plans.create');
    }


    /**
     * Store new  subscription plan into ::DB
     */
    public function  store(Request $request)
    {
        try {
            $validate = $request->validate([
                'plan_name'         =>  'required',
                'plan_min_amount'   =>  'required',
                'plan_max_amount'   =>  'required',
                'plan_time'         =>  'required'
            ]);
    
            $create = Plan::create($validate);
    
            if($create){
                return  back()->with('success', 'New subscription plan created successfully');
            }
        } catch (\Throwable $th) {
            return  back()->with('error', $th->getMessage());
        }
    }


    /**
     * Edit  a subscription plan
     * @param plan_id
     */
    public function edit($plan_id)
    {
        $plan = Plan::findorfail($plan_id);
        return view('admin.plans.edit', compact('plan'));
    }

    /**
     * Delete/Destroy a subscription plan
     */
    public function delete($plan_id)
    {
        $plan = Plan::findorfail($plan_id);
        if($plan->delete()){
            return back()->with('success', 'Subscription plan deleted successfully');
        }
    }
}
