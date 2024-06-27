<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function beranda(){
        $produk = Produk::with('gambarproduk','kategori_produk')->get();
        // dd($produk[0]->gambarproduk[0]->gambar);
        return view('Frontend.Pages.beranda',compact('produk'));
    }
}
