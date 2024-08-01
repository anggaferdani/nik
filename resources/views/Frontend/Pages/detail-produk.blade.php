@extends('Frontend.main')

@section('title', 'layanan')
<link rel="stylesheet" href="{{asset('../Css/Frontend/layanan.css')}}">
<link rel="stylesheet" href="{{asset('../Css/Frontend/global.css')}}">

@section('content')
    <div id="pages-layanan">
        <div class="container">
            <div><a href="{{ route('produk-kami') }}" class="text-white fs-5 text-decoration-none"><i class="fa-solid fa-arrow-left"></i> Kembali</a></div>

            <div id="bottom-content" class="my-5">
                {{-- <img class="ellipse-blur" src="{{ asset('Images/ellipse-blur.png') }}" alt=""> --}}
                <div class="row align-items-center justify-content-lg-start justify-content-center my-xl-3 my-5">
                    <div class="col-lg-7 col-12 d-flex justify-content-lg-start justify-content-center my-lg-0 my-3">
                        <div class="image-container" style="
                            /* background-image: url('{{ asset('produk/file/' . $data->file) }}');
                            background-size: cover;
                            background-repeat: no-repeat;
                            background-position: center;
                            width: 100%;
                            height: 24rem;
                            box-shadow: 0 0 8px 8px #1C4172 inset; */
                            ">
                            <img class="image-blur" src="{{ asset('produk/file/' . $data->file) }}" alt="produk">
                        </div>
                    </div>
                    <div class="col-lg-4 col-9">
                        <div class="cyan-text d-flex align-items-center gap-2 cyan">
                            <h2>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16"><path fill="currentColor" d="M0 7h16v1H0z"/></svg>
                            </h2>
                            <p>{{$data->kategori_produk->kategori}}</p>
                        </div>
                        <div class="text-white text-lg-start text-center">
                            <h2 class="my-3">{{$data->nama}}</h2>
                            <p class="fw-200 mb-3">{!! $data->deskripsi !!}</p>
                            <a href="{{ route('get.submit.keranjang', $data->id) }}" class="btn btn-primary rounded-pill px-4">Add to cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
