<?php

namespace App\Http\Controllers;

use App\Models\DepositMethod;
use App\Models\Signal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SignalController extends Controller
{

    public function purchase_signal(Request $request)
    {
        $req = $request;
        $data = [
            'page' => 'purchase_signal',
            'plans' => Signal::All(),
            'pmeth' => DepositMethod::all(), //$this->payment_methods->where('active_status', '1')->findAll(),
            'deposits' => DB::select(DB::raw("SELECT su.firstname as firstname, su.lastname as lastname, p.name as name, t.amount, t.id as id, t.created_at, t.payment_status, p.method, t.image FROM signals t JOIN users su ON su.id = t.userId JOIN payment_methods p ON p.id = t.payment_method WHERE t.deleted_at IS NULL AND t.userId='{$req->user()->id}' ORDER BY t.created_at DESC LIMIT 10")),
        ];

        if ($req->post()) {
            $amount = $req->input('amount');
            $duration = $req->input('duration');

            $tranx = [
                'amount' => $amount,
                'userId' => session()->get('id'),
                'type' => $req->input('pay_type'),
                'duration' => $duration,
            ];
            $save = Signal::create($tranx);

            if ($save) {
                // Send login alert to user.
                // $this->send_email(session()->get('email'), "deposit", null, $amount);
                return redirect()->to(base_url("users/process_signal/$save"))->with('success', 'Please upload prove of Payment to complete deposit');
            } else {
                return redirect()->back()->with('error', 'please select a valid payment method');
            }
        } elseif (($req->getMethod() == 'post') && empty($req->getPost('duration'))) {
            return redirect()->back()->with('error', 'please select a valid payment method');
        }

        return view('users.purchase-signal', compact('signal'));
    }

    public function process_signal(Request $request, $id = null)
    {
        $req = $request;

        if ($req->post() && $req->hasFile('signal')):
            $payment_id = $req->payment_id;
            $fileName = $_FILES['signal']['name'];
            $logo = save_image('signals', $request->signal, $fileName);
            $logo = [
                'image' => $fileName,
            ];
            
            Signal::where('id', $payment_id)->update($logo);
            return redirect()->to(route('purchase-signal'))->with('success', 'Upload succesfull, please wait while we validate your payment');
        elseif(null  === $id):
            return back()->with('error', 'Unable to process buy signal');
        endif;

        $signal = Signal::findorfail($id);

        return view('users.process-signal', compact('signal'));
    }
}
