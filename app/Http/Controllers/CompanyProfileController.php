<?php

namespace App\Http\Controllers;

use App\Models\CompanyProfile;
use Illuminate\Http\Request;

class CompanyProfileController extends Controller
{
    public function index() {
        $companyProfiles = CompanyProfile::where('status', 1)->get();
        return view('admin.company-profile.index', compact(
            'companyProfiles',
        ));
    }

    public function create() {}

    public function store(Request $request) {}

    public function show($id) {}

    public function edit($id) {}

    public function update(Request $request, $id) {
        try {
            $companyprofile = CompanyProfile::find($id);
    
            $request->validate([
                'title' => 'required',
                'subtitle' => 'required',
                'subsubtitle' => 'required',
                'description' => 'required',
                'title_layanan' => 'required',
                'description_layanan' => 'required',
                'visi' => 'required',
                'misi1' => 'required',
                'misi2' => 'required',
                'misi3' => 'required',
                'misi4' => 'required',
                'misi5' => 'required',
                'address' => 'required',
                'email' => 'required',
                'email2' => 'required',
                'wa' => 'required',
            ]);
    
            $array = [
                'title' => $request['title'],
                'subtitle' => $request['subtitle'],
                'subsubtitle' => $request['subsubtitle'],
                'description' => $request['description'],
                'title_layanan' => $request['title_layanan'],
                'description_layanan' => $request['description_layanan'],
                'visi' => $request['visi'],
                'misi1' => $request['misi1'],
                'misi2' => $request['misi2'],
                'misi3' => $request['misi3'],
                'misi4' => $request['misi4'],
                'misi5' => $request['misi5'],
                'address' => $request['address'],
                'email' => $request['email'],
                'email2' => $request['email2'],
                'wa' => $request['wa'],
                'instagram' => $request['instagram'],
                'facebook' => $request['facebook'],
                'tokopedia' => $request['tokopedia'],
                'linkedin' => $request['linkedin'],
            ];
    
            $companyprofile->update($array);
    
            return redirect()->route('company-profile.index')->with('success', 'Success');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function destroy($id) {}
}
