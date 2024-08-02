<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Keranjang;
use App\Models\OrderItem;
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

    public function submit(Request $request) {
        try {
            $request->validate([
                'user_id' => 'required',
                'nama' => 'required',
                'email' => 'required',
                'no_telp' => 'required',
                'alamat' => 'required',
                'bukti_bayar' => 'required',
                'produk_ids' => 'required',
                'quantities' => 'required',
            ]);
    
            $orders = [
                'user_id' => $request['user_id'],
                'nama' => $request['nama'],
                'email' => $request['email'],
                'no_telp' => $request['no_telp'],
                'alamat' => $request['alamat'],
                'bukti_bayar' => $this->handleFileUpload($request->file('bukti_bayar'), 'bukti-bayar/'),
            ];

            $order = Order::create($orders);

            if ($order) {
                $productIds = explode(',', $request->input('produk_ids'));
                $quantities = explode(',', $request->input('quantities'));
        
                if (count($productIds) !== count($quantities)) {
                    return back()->with('error', 'Mismatch between product IDs and quantities.');
                }

                foreach ($productIds as $index => $productId) {
                    OrderItem::create([
                        'order_id' => $order->id,
                        'produk_id' => $productId,
                        'qty' => $quantities[$index],
                    ]);
                }

                Keranjang::truncate();

                return back()->with('success', 'Pesanan berhasil dibuat. Check order history.');
            }
    
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    private function handleFileUpload($file, $path)
    {
        if ($file) {
            $fileName = date('YmdHis') . rand(999999999, 9999999999) . $file->getClientOriginalName();
            $file->move(public_path($path), $fileName);
            return $fileName;
        }
        return null;
    }
}
