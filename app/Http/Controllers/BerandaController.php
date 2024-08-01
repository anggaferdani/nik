<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Layanan;
use Illuminate\Http\Request;
use App\Models\CompanyProfile;
use App\Models\Partner;
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
        $produk = Produk::with('gambarproduk','kategori_produk')->where('status', 1)->take(2)->get();
        foreach ($produk as $key) {
            $key->encryptId = Crypt::encrypt($key->id);
        }
        $companyProfile = CompanyProfile::first();
        $layanans = Layanan::where('status', 1)->get();
        $partners = Partner::where('status', 1)->get();
        return view('Frontend.Pages.beranda',compact(
            'produk',
            'companyProfile',
            'layanans',
            'partners',
        ));
    }
}
