<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SelengkapnyaController extends Controller
{
    public function index(){
        $auth = Auth::user();
        if ($auth != null) {
            if ($auth->aktif == 5) {
                Auth::logout();
            }
        }
        $data = Produk::where('aktif',1)->get();
        return view('Frontend.Pages.selengkapnya',compact('data'));
    }
}
