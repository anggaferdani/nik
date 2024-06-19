<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('beranda', function () {return view('Frontend.Pages.beranda');})->name('beranda');
Route::get('layanan', function () {return view('Frontend.Pages.layanan');})->name('layanan');
Route::get('produk', function () {return view('Frontend.Pages.produk');})->name('produk');
