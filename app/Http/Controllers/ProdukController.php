<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use App\Models\KategoriProduk;

class ProdukController extends Controller
{
    public function index(Request $request) {
        $kategoris = KategoriProduk::where('aktif', 1)->get();
        $produks = Produk::where('status', 1)->latest()->paginate(10);

        return view('admin.produk.index', compact(
            'kategoris',
            'produks',
        ));
    }

    public function create() {}

    public function store(Request $request) {
        try {
            $request->validate([
                'file' => 'required',
                'kategori_produk_id' => 'required',
                'nama' => 'required',
                'deskripsi' => 'required',
                'harga' => 'required',
            ]);

            $h = preg_replace('/\D/', '', $request->harga);
            $harga = trim($h);
    
            $array = [
                'kategori_produk_id' => $request['kategori_produk_id'],
                'nama' => $request['nama'],
                'nama' => $request['nama'],
                'deskripsi' => $request['deskripsi'],
                'harga' => $harga,
                'file' => $this->handleFileUpload($request->file('file'), 'produk/file/'),
            ];

            Produk::create($array);
    
            return redirect()->route('admin.produk.index')->with('success', 'Success');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function show($id) {}

    public function edit($id) {}

    public function update(Request $request, $id) {
        try {
            $produk = Produk::find($id);
    
            $request->validate([
                'kategori_produk_id' => 'required',
                'nama' => 'required',
                'deskripsi' => 'required',
                'harga' => 'required',
            ]);

            $h = preg_replace('/\D/', '', $request->harga);
            $harga = trim($h);
    
            $array = [
                'kategori_produk_id' => $request['kategori_produk_id'],
                'nama' => $request['nama'],
                'deskripsi' => $request['deskripsi'],
                'harga' => $harga,
            ];

            if ($request->hasFile('file')) {
                $array['file'] = $this->handleFileUpload($request->file('file'), 'produk/file/');
            }
    
            $produk->update($array);
    
            return redirect()->route('admin.produk.index')->with('success', 'Success');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function destroy($id) {
        try {
            $produk = Produk::find($id);

            $produk->update([
                'status' => 0,
            ]);

            return redirect()->route('admin.produk.index')->with('success', 'Success');
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
