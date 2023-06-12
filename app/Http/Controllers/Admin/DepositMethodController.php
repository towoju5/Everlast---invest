<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DepositMethod;
use Illuminate\Http\Request;

class DepositMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $methods = DepositMethod::all();
        return view('admin.deposit.method.index', compact('methods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.deposit.method.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'method_name' => 'requierd',
            'method_value' => 'required',
        ]);

        if ($request->post('max_amount')) {
            $request->validate([
                'max_amount' => 'required|min:1|numeric',
            ]);
            $validate['max_amount'] = $request->post('max_amount');
        }
        if ($request->post('min_amount')) {
            $request->validate([
                'min_amount' => 'required|min:0|numeric',
            ]);
            $validate['min_amount'] = $request->post('min_amount');
        }
        if ($request->post('network')) {
            $request->validate([
                'min_amount' => 'required',
            ]);
            $validate['network'] = $request->post('network');
        }

        if (DepositMethod::create($validate)) {
            return back()->with('success', 'Data created successfully');
        }

        return back()->with('error', 'Unable to create record');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $method = DepositMethod::whereId($id)->first();
        return view('admin.deposit.method.edit', compact('method'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $validate = $request->validate([
                'method_name' => 'requierd',
                'method_value' => 'required',
            ]);

            if ($request->post('max_amount')) {
                $request->validate([
                    'max_amount' => 'required|min:1|numeric',
                ]);
                $validate['max_amount'] = $request->post('max_amount');
            }
            if ($request->post('min_amount')) {
                $request->validate([
                    'min_amount' => 'required|min:0|numeric',
                ]);
                $validate['min_amount'] = $request->post('min_amount');
            }
            if ($request->post('network')) {
                $request->validate([
                    'min_amount' => 'required',
                ]);
                $validate['network'] = $request->post('network');
            }

            if (DepositMethod::whereId($id)->update($validate)) {
                return back()->with('success', 'Data  updated successfully');
            }
            return back()->with('error', 'Unable to update Data');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
