<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Partner;
use Illuminate\Http\Request;
use App\Models\CompanyProfile;

class LayananKamiController extends Controller
{
    public function layananKami(){
        $companyProfile = CompanyProfile::first();
        $layanans = Layanan::where('status', 1)->get();
        $partners = Partner::where('status', 1)->get();
        return view('Frontend.Pages.layanan',compact(
            'companyProfile',
            'layanans',
            'partners',
        ));
    }
}
