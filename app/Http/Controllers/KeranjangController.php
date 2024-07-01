<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    public function index(){
        $user = Auth::user();
        if ($user == null) {
            return redirect('/login');
        }elseif($user->aktif == 5){
            Auth::logout();
        }

        $data = Produk::where('aktif',1)->get();
        return view('Frontend.Pages.keranjang',compact('data'));
    }

    public function submit_keranjang(Request $request){
        try {
            DB::beginTransaction();
            $qty = array_values(array_filter($request->qty));
            foreach ($qty as $key => $value) {
                $qty[$key] = preg_replace('/[^0-9]/', '', $value);
            }
            foreach ($request->produk_id as $index => $produkid) {
                Keranjang::create([
                    'user_id' => Auth::user()->id,
                    'produk_id' => $produkid,
                    'qty' => $qty[$index],
                ]);
            }
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            //throw $th;
            return back()->with(['error'=>'Ada Kesalahan',$th->getMessage()]);
        }
        return redirect('/create-order');
    }
}
