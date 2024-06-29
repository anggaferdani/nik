@extends('Frontend.main')
@section('title', 'Order History')
<link rel="stylesheet" href="{{asset('../Css/Frontend/orderhistory.css')}}"> 
<link rel="stylesheet" href="{{asset('../Css/Frontend/global.css')}}"> 
    
@section('content')
    
    
    <div class="container my-5">
        <h4 class="text-white daftar-order">Daftar Order</h4>

        <div class="foreach-daftar-order d-flex align-items-center justify-content-between my-2">
            <div class="left-for d-flex align-items-center gap-3">
                <div class="border-order p-4 text-white">
                    <div class="gambar-layanan d-flex align-items-center">
                        <div class="text-center">
                            <div class="d-flex justify-content-center">
                                {{-- <img class="blur-bottom w-50" src="{{ asset('storage/image/'.$item->gambarproduk[0]->gambar) }}" alt=""> --}}
                                <img src="{{ asset('Images/thuraya.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-white">
                    <h1>Thuraya</h1>
                    <p>FDU - XT</p>
                    <div class="d-flex align-items-center gap-2">
                        <div class="bg-cyan px-2 py-1 br-5">
                            <p class="text-black">28 juni 2024</p>
                        </div>
                        <div class="bg-red px-2 py-1 br-5">
                            <p>Berhasil</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right-for d-flex align-items-center text-white">
                <div>
                    <p>Total Harga</p>
                    <h3>Rp 35.000.000</h3>
                </div>
            </div>
        </div>
        
    </div>
    
        
@endsection