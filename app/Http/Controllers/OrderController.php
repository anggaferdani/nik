<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

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
}
