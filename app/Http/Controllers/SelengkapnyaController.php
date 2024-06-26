<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class SelengkapnyaController extends Controller
{
    public function index(){
        $data = Produk::where('aktif',1)->get();
        return view('Frontend.Pages.selengkapnya',compact('data'));
    }
}
