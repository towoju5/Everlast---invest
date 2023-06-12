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
                'minimum_amount'    =>  'required|numeric|min:0',
                'maximum_amount'    =>  'required|numeric|min:0',
                'duration'          =>  'required',
                'image'             =>  'required'
            ]);

            $validate['image']  =   save_image('plans', $request->file('image'));
    
            $create = Plan::create($validate);
    
            if($create){
                return  back()->with('success', 'New subscription plan created successfully');
            }
        } catch (\Throwable $th) {
            return  back()->with('error', $th->getMessage());
        }
    }


    /**
     * Show a subscription plan
     * @param plan_id
     */
    public function show($plan_id)
    {
        $plan = Plan::findorfail($plan_id)->makeHidden(['created_at', 'updated_at', 'deleted_at', 'id']);
        return view('admin.plans.show', compact('plan'));
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
     * Update record after editing
     */
    public function update(Request $request, $planId)
    {
        try {
            $validate = $request->validate([
                'plan_name'         =>  'required',
                'minimum_amount'    =>  'required|numeric|min:0',
                'maximum_amount'    =>  'required|numeric|min:0',
                'duration'          =>  'required|numeric',
            ]);
    
            if($request->hasFile('image')){
                $validate['image']  =   save_image('plans', $request->file('image'));
            }
    
            $create = Plan::whereId($planId)->update($validate);
    
            if($create)
                return back()->with('success', 'Data  updated successfully');
               
            return back()->with('error', 'Unable to update Data');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
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
