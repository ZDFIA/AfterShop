<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Models\OrderDetail;
use App\Models\Order;
use App\Models\User;
use App\Models\Item;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $item = Item::find($id);

        return view('order.home', compact('item'));
    }

    public function order(Request $request, $id)
    {
    	$item = Item::find($id);
        $date = Carbon::now();

    	if($request->total_order > $item->stock)
    	{
            Alert::error('Stock Tidak Cukup', 'Silah Pesan Sesuai Stok yang Tersedia');
    		return redirect('order/'.$id);
    	}

        $check_order = Order::where('user_id', Auth::user()->id)->where('status',0)->first();

    	if(empty($check_order))
    	{
    		$order = new Order;
	    	$order->user_id = Auth::user()->id;
	    	$order->date = $date;
	    	$order->status = 0;
	    	$order->total_price = 0;
            $order->code = mt_rand(100, 999);
	    	$order->save();
    	}

    	$new_order = Order::where('user_id', Auth::user()->id)->where('status',0)->first();
        $check_order_detail = OrderDetail::where('item_id', $item->id)->where('order_id', $new_order->id)->first();

    	if(empty($check_order_detail))
    	{
    		$order_detail = new OrderDetail;
	    	$order_detail->item_id = $item->id;
	    	$order_detail->order_id = $new_order->id;
	    	$order_detail->total = $request->total_order;
	    	$order_detail->total_price = $item->price*$request->total_order;
	    	$order_detail->save();
        }

        else
    	{
    		$order_detail = OrderDetail::where('item_id', $item->id)->where('order_id', $new_order->id)->first();
    		$order_detail->total = $order_detail->total+$request->total_order;
	    	$order_detail->total_price = $order_detail->total_price + $item->price*$request->total_order;
	    	$order_detail->update();
    	}

    	$order = Order::where('user_id', Auth::user()->id)->where('status',0)->first();
    	$order->total_price = $order->total_price+$item->price*$request->total_order;
    	$order->update();

        Alert::success('Pesanan Sukses Masuk Keranjang', 'Success');
    	return redirect('home');

    }

    public function check_out()
    {
        $order = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();

        if (!empty($order)) {
            $order_details = OrderDetail::where('order_id', $order->id)->get();
        }
        else
        {
            Alert::error('Keranjang Kosong', 'Silahkan Memesan Barang');
            return redirect('home');
        }

        return view ('order.check-out', ['no' => 1], compact('order', 'order_details') );
    }

    public function delete($id)
    {
        $order_detail = OrderDetail::find($id);
        $order = Order::where('id', $order_detail->order_id)->first();
        $order->total_price = $order->total_price - $order_detail->total_price;
        $order->update();

        $order_detail->delete();

        Alert::error('Dihapus', 'Pesanan Berhasil Dihapus');
        return redirect('check-out');
    }

    public function confirm()
    {
        $user = User::where('id', Auth::user()->id)->first();

        if (empty($user->address) || empty($user->hp))
        {
            Alert::error('Error', 'Harap Lengkapi Profil Anda');
            return redirect('profile');
        }

        $order = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $order_id = $order->id;
        $order->status = 1;
        $order->update();

        $order_details = OrderDetail::where('order_id', $order_id)->get();

        foreach ($order_details as $order_detail) {
            $item = Item::where('id', $order_detail->item_id)->first();
            $item->stock = $item->stock - $order_detail->total;
            $item->update();
        }

        Alert::success('Berhasil', 'Pesanan Berhasil Dicheckout, Silahkan Lanjutkan Pembayaran');
        return redirect('history/' . $order_id);
    }
}
