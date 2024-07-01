<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Produk;
use App\Models\Keranjang;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\OrderController;

class OrderController extends Controller
{
    public function view(){
        $auth = Auth::user();
        if ($auth != null) {
            if ($auth->aktif == 5) {
                Auth::logout();
                return redirect('/');
            }
        }
        $data = Keranjang::with('produk.gambarproduk')->where('user_id',Auth::user()->id)->where('aktif',1)->get();
        $totalHarga = 0;

        foreach ($data as $item) {
            $qty = $item->qty;
            $hargaProduk = $item->produk->harga; // Misalnya harga_produk diambil dari relasi produk

            // Hitung total harga untuk tiap item
            $totalItem = $qty * $hargaProduk;

            // Tambahkan ke totalHarga
            $totalHarga += $totalItem;
        }
        return view('Frontend.Pages.createOrder',compact('data','totalHarga'));
    }

    public function submit(Request $request){
        try {
            DB::beginTransaction();
            $keranjang = Keranjang::where('user_id',Auth::user()->id)->whereIn('produk_id',$request->produk_id)->where('aktif',1)->get();
            // dd($keranjang);
            $gambar = $request->file('gambar');
            $gambar->storeAs('public/image', $gambar->hashName());
            $order = Order::create([
                'user_id'=>Auth::user()->id,
                'nama'=>$request->nama_pemesan,
                'no_telp'=>$request->no_telp,
                'total_bayar'=>$request->total_bayar,
                'alamat'=>$request->alamat,
                'bukti_bayar' => $gambar->hashName(),
            ]);
            foreach ($keranjang as $key) {
                OrderItem::create([
                    'order_id'=>$order->id,
                    'produk_id'=>$key->produk_id,
                    'nama_produk'=>$key->produk->nama,
                    'qty'=>$key->qty,
                    'user_id'=>Auth::user()->id,
                    'harga'=>$key->produk->harga
                ]);
            }

            $keranjang->each->update([
                'aktif'=>0
            ]);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            dd($th);
        }
        return redirect('/order-history')->with(['success'=>'Success Order.']);
    }

    public function history(){
        $order = Order::with('order_item')->where('user_id',Auth::user()->id)->get();
        foreach ($order as $key) {
            # code...
            $key->total_bayar = OrderItem::where('order_id',$key->id)->sum('harga');
            $key->total_item = OrderItem::where('order_id',$key->id)->count();
        }
        // $total_bay
        return view('Frontend.Pages.orderHistory',compact('order'));
    }

    public function admin_view(){
        if (request()->ajax()) {
            $data = Order::with('order_item')->get();
            foreach ($data as $key) {
                # code...
                $key->total_bayar = OrderItem::where('order_id',$key->id)->sum('harga');
            }
            return DataTables::of($data)->make(true);
        }

        return view('admin.order');
    }

    public function admin_verif($id){
        $order = Order::find($id);
        $order->update([
            'status'=>'success',
        ]);
        return redirect('/admin/order')->with(['success'=>'Success Order Verifikasi.']);
    }
    public function admin_detail($id){
        $order = Order::find($id);
        $orderItems = OrderItem::where('order_id',$id)->get();
        $subtotal = OrderItem::where('order_id',$id)->sum('harga');
        return view('admin.detail-order', compact('order','orderItems','subtotal'));
    }
}
