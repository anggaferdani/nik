<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index(Request $request) {
        $layanans = Layanan::where('status', 1)->latest()->paginate(10);

        return view('admin.layanan.index', compact(
            'layanans',
        ));
    }

    public function create() {}

    public function store(Request $request) {
        try {
            $request->validate([
                'file' => 'required|file|mimes:png,jpg,jpeg',
                'title' => 'required',
                'description' => 'required',
                'category' => 'required',
            ]);
    
            $array = [
                'title' => $request['title'],
                'description' => $request['description'],
                'category' => $request['category'],
                'file' => $this->handleFileUpload($request->file('file'), 'layanan/file/'),
            ];

            Layanan::create($array);
    
            return redirect()->route('admin.layanan.index')->with('success', 'Success');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function show($id) {}

    public function edit($id) {}

    public function update(Request $request, $id) {
        try {
            $layanan = Layanan::find($id);
    
            $request->validate([
                'file' => 'nullable|file|mimes:png,jpg,jpeg',
                'title' => 'required',
                'description' => 'required',
                'category' => 'required',
            ]);
    
            $array = [
                'title' => $request['title'],
                'description' => $request['description'],
                'category' => $request['category'],
            ];

            if ($request->hasFile('file')) {
                $array['file'] = $this->handleFileUpload($request->file('file'), 'layanan/file/');
            }
    
            $layanan->update($array);
    
            return redirect()->route('admin.layanan.index')->with('success', 'Success');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function destroy($id) {
        try {
            $layanan = Layanan::find($id);

            $layanan->update([
                'status' => 0,
            ]);

            return redirect()->route('admin.layanan.index')->with('success', 'Success');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    private function handleFileUpload($file, $path)
    {
        if ($file) {
            $fileName = date('YmdHis') . rand(999999999, 9999999999) . $file->getClientOriginalName();
            $file->move(public_path($path), $fileName);
            return $fileName;
        }
        return null;
    }
}
