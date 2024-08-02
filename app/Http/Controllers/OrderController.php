<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(Request $request) {
        $orders = Order::with('order_item')->latest()->paginate(10);

        return view('admin.order.index', compact(
            'orders',
        ));
    }

    public function verify($id) {
        try {
            $order = Order::find($id);

            $order->update([
                'status' => 'success',
            ]);

            return back()->with('success', 'Success');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function history(){
        $orders = Order::with('order_item.produk.gambarproduk')->where('user_id',Auth::user()->id)->get();
        return view('Frontend.Pages.orderHistory',compact('orders'));
    }
}
