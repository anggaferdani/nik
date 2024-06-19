@extends('Frontend.main')
@section('title', 'produk')
<link rel="stylesheet" href="{{asset('../Css/Frontend/beranda.css')}}"> 
<link rel="stylesheet" href="{{asset('../Css/Frontend/produk.css')}}"> 
<link rel="stylesheet" href="{{asset('../Css/Frontend/global.css')}}"> 
    
@section('content')

    <div id="forth-content">
        <img  src="{{ asset('Images/bg-starlink.png') }}" alt="">
        <div class="container">
            <div class="starlink-desc">
                <div class="text-starlink text-white">
                    <h1>STARLINK</h1>
                    <p>Produk terbaru dari STARLINK tersedia di kami</p>
                </div>
                <div class="button d-flex gap-3 mt-3">
                    <a href=""><button class="btn-nik rgb-red text-white" type="submit">Lorem ipsum.</button></a>
                    <a href=""><button class="btn-nik rgb-blue text-white" type="submit">Lorem ipsum.</button></a>
                </div>
            </div>
        </div>
    </div>

    <div class="option py-5 text-center">
        <h1 class="text-white">
            Jelajahi seluruh produk
        </h1>
        <div class="option-2 my-4">
            <div class="optional">
                <button class="btn btn-option rgb-red" type="button">Semua</button>
                <button class="btn btn-option" type="button">Thuraya</button>
                <button class="btn btn-option" type="button">Koden</button>
                <button class="btn btn-option" type="button">Inmarsat</button>
                <button class="btn btn-option" type="button">Iridium</button>
                <button class="btn btn-option" type="button">Starlink</button>
                <button class="btn btn-option" type="button">Samyung Enc</button>
                <button class="btn btn-option" type="button">Hytera</button>
                <button class="btn btn-option" type="button">Icom</button>
                <button class="btn btn-option" type="button">Sailor</button>
                <button class="btn btn-option" type="button">Jrc</button>
            </div>
        </div>
    </div>


    <div id="fifth-content" class="py-4">
        <div class="parent-grid-fifth">
            <div class="grid-fifth">
                <div class="border-cyan p-4 text-white d-flex justify-content-center">
                    <div class="gambar-layanan">
                        <div class="image-wrapper-cyan text-center">
                            <div class="d-flex justify-content-center">
                                <img class="blur-bottom w-50" src="{{ asset('Images/thuraya.png') }}" alt="">
                            </div>
                        </div>
                        <div class="text-center">
                            <h1>THURAYA</h1>
                            <h3>FDU - XT</h3>
                            <div class="button d-flex justify-content-center gap-3 mt-3">
                                <a href=""><button class="btn-pelajari solid-blue text-white" type="submit">Pelajari</button></a>
                                <a href=""><button class="btn-beli border-white" type="submit">Beli</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid-fifth">
                <div class="border-cyan2 p-4 text-white d-flex justify-content-center">
                    <div class="gambar-layanan">
                        <div class="image-wrapper-cyan2 text-center">
                            <div class="d-flex justify-content-center">
                                <img class="blur-bottom w-50" src="{{ asset('Images/samyung.png') }}" alt="">
                            </div>
                        </div>
                        <div class="text-center blue">
                            <h1>SAMYUNG</h1>
                            <h3>FDU - XT</h3>
                            <div class="button d-flex justify-content-center gap-3 mt-3">
                                <a href=""><button class="btn-pelajari solid-blue text-white" type="submit">Pelajari</button></a>
                                <a href=""><button class="btn-beli border-blue" type="submit">Beli</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center my-5">
            <a href=""><button class="btn-pelajari  mx-auto  border-white" type="submit">Selengkapnya>></button></a>
        </div>
    </div>
@endsection