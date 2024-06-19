<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function beranda(){
        $produk = Produk::with('kategori_produk')->get();
        return view('Frontend.Pages.beranda',compact('produk'));
    }
}
