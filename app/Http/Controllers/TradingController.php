<?php

namespace App\Http\Controllers;

use App\Models\Trade;
use Illuminate\Http\Request;

class TradingController extends Controller
{
    /**
     * Store new trading request into database
     * @return object
     */
    public function index(Request $request)
    {
        $validate = $request->validate([
            "type" => "required",
            "currency_pair" => "required",
            "lot_size" => "required",
            "entry_price" => "required",
            "stop_loss" => "required",
            "take_profit" => "required",
            "action" => "required",
        ]);

        $user = $request->user();
        if ($user->balance > $request->entry_price) {
            $validate['user_id'] = $user->id;
            $trade = Trade::create($validate);
            if ($trade) {
                return back()->with('success', 'Trade placed successfully');
            }
            return back()->with('error', 'Error encountered');
        }
        return back()->with('error', 'Insufficient balance');
    }

    public function update_status($id, $action)
    {
        if (Trade::whereId($id)->update(['status' => get_status($action)])) {
            return back()->with('success', 'Action completed successfully');
        }
        return back()->with('error', 'Error encourted');
    }
}
