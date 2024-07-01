<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class BerandaController extends Controller
{
    public function beranda(){
        $auth = Auth::user();
        if ($auth != null) {
            if ($auth->aktif == 5) {
                Auth::logout();
            }
        }
        $produk = Produk::with('gambarproduk','kategori_produk')->take(2)->get();
        foreach ($produk as $key) {
            $key->encryptId = Crypt::encrypt($key->id);
        }
        // dd($produk[0]->gambarproduk[0]->gambar);
        return view('Frontend.Pages.beranda',compact('produk'));
    }
}
