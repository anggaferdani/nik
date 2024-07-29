<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class KeranjangController extends Controller
{
    public function index(){
        $user = Auth::user();

        if ($user == null) {
            return redirect('/login');
        }elseif($user->aktif == 5){
            Auth::logout();
        }

        $keranjangs = Keranjang::with(['produk.gambarproduk', 'produk.kategori_produk'])->where([['user_id', Auth::id()], ['aktif', 1]])->get();

        return view('Frontend.Pages.keranjang', compact('keranjangs'));
    }

    public function clear_all() {
        try {
            DB::beginTransaction();

            $keranjangs = Keranjang::where([['user_id', Auth::id()], ['aktif', 1]]);

            if (!$keranjangs->count()) { throw new Exception("Keranjang kosong."); }

            $keranjangs->delete();

            DB::commit();

        } catch (\Throwable $th) {

            DB::rollback();

            return back()->with(['error' => 'Ada Kesalahan ', $th->getMessage()]);
        }

        return redirect()->back();
    }

    public function clear_one($encryptedId) {
        try {
            DB::beginTransaction();

            $keranjangId = Crypt::decrypt($encryptedId);

            $keranjang = Keranjang::where([['id', $keranjangId], ['user_id', Auth::id()], ['aktif', 1]])->first();

            if ($keranjang) { $keranjang->delete(); }

            DB::commit();

        } catch (\Throwable $th) {

            DB::rollback();

            return back()->with(['error' => 'Ada Kesalahan ', $th->getMessage()]);
        }

        return redirect()->back();
    }

    public function submit_keranjang(String $encryptedId){
        try {
            DB::beginTransaction();

            $productId = Crypt::decrypt($encryptedId);

            $product = Produk::where([['id', $productId], ['aktif', 1]])->first();

            if (!$product) { throw new Exception("Produk tidak ditemukan."); }

            Keranjang::firstOrCreate([
                'produk_id' => $productId,
                'user_id'   => Auth::id(),
                'qty'       => 1,
                'aktif'     => 1
            ]);

            DB::commit();

        } catch (\Throwable $th) {

            DB::rollback();

            return back()->with(['error' => 'Ada Kesalahan ', $th->getMessage()]);
        }

        return redirect()->back();
    }

    // public function submit_keranjang(Request $request){
    //     try {
    //         DB::beginTransaction();
    //         $qty = array_values(array_filter($request->qty));
    //         foreach ($qty as $key => $value) {
    //             $qty[$key] = preg_replace('/[^0-9]/', '', $value);
    //         }
    //         foreach ($request->produk_id as $index => $produkid) {
    //             Keranjang::create([
    //                 'user_id' => Auth::user()->id,
    //                 'produk_id' => $produkid,
    //                 'qty' => $qty[$index],
    //             ]);
    //         }
    //         DB::commit();
    //     } catch (\Throwable $th) {
    //         DB::rollback();
    //         //throw $th;
    //         return back()->with(['error'=>'Ada Kesalahan',$th->getMessage()]);
    //     }
    //     return redirect('/create-order');
    // }
}
