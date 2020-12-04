<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\OrderDetail;
use App\Models\Order;

class HistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $orders = Order::where('user_id', Auth::user()->id)->where('status', '!=', 0)->get();

        return view('history.home', ['no' => 1], compact('orders'));

    }

    public function detail($id)
    {
        $order = Order::find($id);
        $order_details = OrderDetail::where('order_id', $order->id)->get();

        return view('history.detail', ['no' => 1], compact('order', 'order_details'));
    }
}
