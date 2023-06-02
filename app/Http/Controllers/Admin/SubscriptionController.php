<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Trade;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    /**
     * View all active subscriptions
     */
    public function index()
    {
        $collection = Trade::orderBy('created_at', 'desc')->paginate(per_page());
        return view('admin.trades.index', compact('collection'));
    }
}
