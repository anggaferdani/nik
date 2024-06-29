@extends('Frontend.main')
@section('title', 'Keranjang')
<link rel="stylesheet" href="{{asset('../Css/Frontend/keranjang.css')}}"> 
<link rel="stylesheet" href="{{asset('../Css/Frontend/global.css')}}"> 
    
@section('content')
    
    
    <div class="container my-5" id="keranjang">
        
        <div class="row justify-content-between">
            <div class="col-7">
                <div class="form-check d-flex align-items-center gap-3 text-white">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                      Pilih semua
                    </label>
                </div>

                <div class="foreach-produk">
                    <hr class="hr text-white"></hr>
                    <div class="form-check d-flex align-items-start gap-3 text-white">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label w-100" for="flexCheckDefault">
                            <div class="judul d-flex align-items-center gap-3">
                                <div class="border-order p-2 text-white">
                                    <div class="gambar-layanan">
                                        <div class="text-center">
                                            <div class="d-flex justify-content-center align-items-center">
                                                {{-- <img class="blur-bottom w-50" src="{{ asset('storage/image/'.$item->gambarproduk[0]->gambar) }}" alt=""> --}}
                                                <img src="{{ asset('Images/thuraya.png') }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-white">
                                    <h5>Thuraya</h5>
                                    <p class="my-1">FDU - XT</p>
                                    <h5>Rp. 1.300.000</h5>
                                </div>
                            </div>
                            <div class="bawah-judul mt-2 d-flex justify-content-between align-items-center w-100 gap-5">
                                <input type="email" class="form-control tulis-catatan" id="exampleFormControlInput1" placeholder="Tulis catatan">
                                <div class="wishlist d-flex align-items-center gap-2">
                                    <a href=""><p>Pindahkan ke Wishlist</p></a>
                                    <vr class="vr"></vr>
                                    <p>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512"><path fill="none" d="M296 64h-80a7.91 7.91 0 0 0-8 8v24h96V72a7.91 7.91 0 0 0-8-8"/><path fill="none" d="M292 64h-72a4 4 0 0 0-4 4v28h80V68a4 4 0 0 0-4-4"/><path fill="white" d="M447.55 96H336V48a16 16 0 0 0-16-16H192a16 16 0 0 0-16 16v48H64.45L64 136h33l20.09 314A32 32 0 0 0 149 480h214a32 32 0 0 0 31.93-29.95L415 136h33ZM176 416l-9-256h33l9 256Zm96 0h-32V160h32Zm24-320h-80V68a4 4 0 0 1 4-4h72a4 4 0 0 1 4 4Zm40 320h-33l9-256h33Z"/></svg>
                                    </p>
                                </div>
                                <div class="quantity">
                                    <button class="minus" aria-label="Decrease">
                                        <p>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14"/></svg>
                                        </p>
                                    </button>
                                    <input type="number" class="input-box" value="1" min="1" max="100" readonly>
                                    <button class="plus" aria-label="Increase">
                                        <p>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h7m7 0h-7m0 0V5m0 7v7"/></svg>
                                        </p>
                                    </button>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="foreach-produk">
                    <hr class="hr text-white"></hr>
                    <div class="form-check d-flex align-items-start gap-3 text-white">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label w-100" for="flexCheckDefault">
                            <div class="judul d-flex align-items-center gap-3">
                                <div class="border-order p-2 text-white">
                                    <div class="gambar-layanan">
                                        <div class="text-center">
                                            <div class="d-flex justify-content-center align-items-center">
                                                {{-- <img class="blur-bottom w-50" src="{{ asset('storage/image/'.$item->gambarproduk[0]->gambar) }}" alt=""> --}}
                                                <img src="{{ asset('Images/thuraya.png') }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-white">
                                    <h5>Thuraya</h5>
                                    <p class="my-1">FDU - XT</p>
                                    <h5>Rp. 1.300.000</h5>
                                </div>
                            </div>
                            <div class="bawah-judul mt-2 d-flex justify-content-between align-items-center w-100 gap-5">
                                <input type="email" class="form-control tulis-catatan" id="exampleFormControlInput1" placeholder="Tulis catatan">
                                <div class="wishlist d-flex align-items-center gap-2">
                                    <a href=""><p>Pindahkan ke Wishlist</p></a>
                                    <vr class="vr"></vr>
                                    <p>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512"><path fill="none" d="M296 64h-80a7.91 7.91 0 0 0-8 8v24h96V72a7.91 7.91 0 0 0-8-8"/><path fill="none" d="M292 64h-72a4 4 0 0 0-4 4v28h80V68a4 4 0 0 0-4-4"/><path fill="white" d="M447.55 96H336V48a16 16 0 0 0-16-16H192a16 16 0 0 0-16 16v48H64.45L64 136h33l20.09 314A32 32 0 0 0 149 480h214a32 32 0 0 0 31.93-29.95L415 136h33ZM176 416l-9-256h33l9 256Zm96 0h-32V160h32Zm24-320h-80V68a4 4 0 0 1 4-4h72a4 4 0 0 1 4 4Zm40 320h-33l9-256h33Z"/></svg>
                                    </p>
                                </div>
                                <div class="quantity">
                                    <button class="minus" aria-label="Decrease">
                                        <p>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14"/></svg>
                                        </p>
                                    </button>
                                    <input type="number" class="input-box" value="1" min="1" max="100" readonly>
                                    <button class="plus" aria-label="Increase">
                                        <p>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h7m7 0h-7m0 0V5m0 7v7"/></svg>
                                        </p>
                                    </button>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>

            </div>
            <div class="col-4 par-ringkasan-belanja text-white">
                <div class="ringkasan-belanja">
                    <p class="fw-bold">Ringkasan belanja</p>
                    <div class="d-flex align-items-center justify-content-between">
                        <p>Total Harga (0 barang)</p>
                        <p>Rp0</p>
                    </div>
                    <div class="hr"></div>
                    <p class="fw-bold">Total Harga</p>
                    <button class="btn-pesan-sekarang bg-cyan mt-4">Pesan Sekarang (0)</button>
                </div>
            </div>
        </div>
        
    </div>
    

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const minusButton = document.querySelector('.minus');
            const plusButton = document.querySelector('.plus');
            const inputBox = document.querySelector('.input-box');

            minusButton.addEventListener('click', function() {
                let currentValue = parseInt(inputBox.value);
                if (currentValue > parseInt(inputBox.min)) {
                    inputBox.value = currentValue - 1;
                }
            });

            plusButton.addEventListener('click', function() {
                let currentValue = parseInt(inputBox.value);
                if (currentValue < parseInt(inputBox.max)) {
                    inputBox.value = currentValue + 1;
                }
            });
        });
    </script>
        
@endsection