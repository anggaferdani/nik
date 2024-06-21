<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\KategoriProduk;
use Yajra\DataTables\Facades\Datatables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class KategoriProdukController extends Controller
{
    public function kategori_produk(){
        if (request()->ajax()) {
            $data = KategoriProduk::where('aktif',1)->get();
            return Datatables::of($data)->make(true);
        }

        return view('admin.kategori_produk');
    }
    
    public function submit(Request $request){
        try {
            DB::beginTransaction();
            KategoriProduk::create([
                'kategori'=>$request->kategori
            ]);
            DB::commit();
            } catch (\Throwable $th) {
            DB::rollback();
            return back()->with(['error'=> $th->getMessage()]);   
            //throw $th;
        }
        return redirect('/admin/kategori-produk')->with(['success'=>'Data Berhasil Ditambah.']);   
    }

    public function edit($id){
        $data = kategoriProduk::find($id);
        return view('admin.edit_kategori_produk',compact('data'));
    }
    public function update(Request $request, $id){
        try {
            DB::beginTransaction();
            $data = kategoriProduk::find($id);
            $data->update([
                'kategori'=>$request->kategori
            ]);
            DB::commit();
            } catch (\Throwable $th) {
            DB::rollback();
            return back()->with(['error'=> $th->getMessage()]);   

            //throw $th;
        }
        return redirect('/admin/kategori-produk')->with(['success'=>'Data Berhasil Diupdate.']);
    }

    public function delete($id){
        try {
            DB::beginTransaction();
            $data = kategoriProduk::find($id);
            $data->update([
                'aktif'=> 0
            ]);
            DB::commit();
            } catch (\Throwable $th) {
            DB::rollback();
            return back()->with(['error'=> $th->getMessage()]);   

            //throw $th;
        }
        return redirect('/admin/kategori-produk')->with(['success'=>'Data Berhasil Dihapus.']);
    }
}
