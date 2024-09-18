<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ComproController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\ProdukUserController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\LayananKamiController;
use App\Http\Controllers\SelengkapnyaController;
use App\Http\Controllers\CompanyProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KategoriProdukController;
use App\Http\Controllers\OrderController as OrderController2;
use App\Http\Controllers\ProdukController;

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
// Route::get('/selengkapnya', [SelengkapnyaController::class,'index'])->name('selengkapnya');

Route::middleware(['user'])->group(function () {
    // Route::get('/create-order', [OrderController::class,'view']);
    Route::get('/order-history', [OrderController2::class,'history'])->name('orderhistory');
    Route::get('/keranjang', [KeranjangController::class,'index'])->name('keranjang');
    Route::get('/keranjang/clear', [KeranjangController::class, 'clear_all'])->name('clear-keranjang');
    Route::get('/keranjang/delete/{id}', [KeranjangController::class,'clear_one'])->name('clear.one.keranjang');
    Route::post('/submit-keranjang/{id}', [KeranjangController::class,'submit_keranjang'])->name('post.submit.keranjang');
    Route::get('/submit-keranjang/{id}', [KeranjangController::class,'get_submit_keranjang'])->name('get.submit.keranjang');
    Route::post('/submit-order', [OrderController2::class,'submit'])->name('submit-order');
});

Route::get('/', [BerandaController::class,'beranda'])->name('beranda');
Route::get('/layanan-kami', [LayananKamiController::class,'layananKami'])->name('layanan-kami');
Route::get('produk-kami', [ProdukUserController::class,'frontend_produk'])->name('produk-kami');
Route::get('/detail-produk/{id}', [ProdukUserController::class,'detail_produk'])->name('detail.produk');

Route::middleware(['auth:web', 'admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('/kategori-produk', [KategoriProdukController::class, 'kategori_produk'])->name('kategori-produk');
        Route::post('/submit-kategori-produk', [KategoriProdukController::class, 'submit']);
        Route::get('/edit-kategori-produk/{id}', [KategoriProdukController::class, 'edit']);
        Route::put('/update-kategori-produk/{id}', [KategoriProdukController::class, 'update']);
        Route::put('/delete-kategori-produk/{id}', [KategoriProdukController::class, 'delete']);
        Route::post('/submit-produk', [ProdukUserController::class, 'submit']);
        Route::get('/edit-produk/{id}', [ProdukUserController::class, 'edit']);
        Route::put('/update-produk/{id}', [ProdukUserController::class, 'update']);
        Route::put('/delete-produk/{id}', [ProdukUserController::class, 'delete']);
        Route::delete('/delete-gambar-produk/{id}/', [ProdukUserController::class, 'delete_gambar_produk']);
        Route::get('/layanan-kami', [ProdukUserController::class, 'layanan_kami']);



        Route::resource('company-profile', CompanyProfileController::class);

        Route::name('admin.')->group(function(){
            Route::resource('layanan', LayananController::class);
            Route::resource('partner', PartnerController::class);
            Route::resource('produk', ProdukController::class);
            Route::resource('order', OrderController2::class);
            Route::get('order/verify/{id}', [OrderController2::class, 'verify'])->name('order.verify');
        });
    });
});

require __DIR__.'/auth.php';
