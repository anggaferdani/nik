<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\SelengkapnyaController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KategoriProdukController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', [AuthController::class,'login'])->name('login');
Route::get('/registered', [AuthController::class, 'register'])->name('registered');
Route::post('/submit-register', [AuthController::class, 'submit_register']);
Route::post('/proces-login', [AuthController::class, 'proces_login']);
Route::post('/user-logout', [AuthController::class, 'logout']);
Route::get('/selengkapnya', [SelengkapnyaController::class,'index'])->name('selengkapnya');

Route::get('/createorder', function () { return view('Frontend.Pages.createOrder'); });
Route::get('/orderhistory', function () { return view('Frontend.Pages.orderHistory'); })->name('orderhistory');
Route::get('/keranjang', function () { return view('Frontend.Pages.keranjang'); })->name('orderhistory');

Route::get('/', [BerandaController::class,'beranda'])->name('beranda');
Route::get('layanan', function () {return view('Frontend.Pages.layanan');})->name('layanan');
Route::get('produk', [ProdukController::class,'frontend_produk'])->name('produk');

Route::middleware(['auth','admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'dashboard']);
        //kategori produk
        Route::get('/kategori-produk', [KategoriProdukController::class, 'kategori_produk']);
        Route::post('/submit-kategori-produk', [KategoriProdukController::class, 'submit']);
        Route::get('/edit-kategori-produk/{id}', [KategoriProdukController::class, 'edit']);
        Route::put('/update-kategori-produk/{id}', [KategoriProdukController::class, 'update']);
        Route::put('/delete-kategori-produk/{id}', [KategoriProdukController::class, 'delete']);
        //produk
        Route::get('/produk', [ProdukController::class, 'produk']);
        Route::post('/submit-produk', [ProdukController::class, 'submit']);
        Route::get('/edit-produk/{id}', [ProdukController::class, 'edit']);
        Route::put('/update-produk/{id}', [ProdukController::class, 'update']);
        Route::put('/delete-produk/{id}', [ProdukController::class, 'delete']);
        Route::delete('/delete-gambar-produk/{id}/', [ProdukController::class, 'delete_gambar_produk']);
        Route::get('/layanan-kami', [ProdukController::class, 'layanan_kami']);
        });
});

require __DIR__.'/auth.php';
