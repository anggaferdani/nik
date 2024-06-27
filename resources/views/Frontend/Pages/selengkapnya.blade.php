@extends('Frontend.main')
@section('title', 'layanan')
<link rel="stylesheet" href="{{asset('../Css/Frontend/layanan.css')}}"> 
<link rel="stylesheet" href="{{asset('../Css/Frontend/global.css')}}"> 
    
@section('content')
    <div id="pages-layanan">

        {{-- <div id="top-content">
            <div class="container">
                <h3 class="cyan fw-bold">LAYANAN SATELIT STATION</h3>
                <p class="text-white my-3">Lorem ipsum dolor sit amet consectetur. Aliquam et ut risus amet tortor nulla. Consectetur nisl quam purus in. Mauris lectus dolor morbi potenti quam dictum. Odio lorem sed lectus volutpat tincidunt eget nisl egestas cursus. Egestas maecenas interdum egestas tellus rhoncus at pretium sit suspendisse.</p>
            </div>
        </div> --}}

        <div id="bottom-content" class="my-5">
            {{-- <img class="ellipse-blur" src="{{ asset('Images/ellipse-blur.png') }}" alt=""> --}}
            @foreach ($data as $item)
            <div class="row align-items-center justify-content-lg-start justify-content-center my-xl-3 my-5">
                <div class="col-lg-7 col-12 d-flex justify-content-lg-start justify-content-center my-lg-0 my-3">
                    <div class="image-container w-80">
                        <img class="image-blur" src="{{ asset('storage/image/'.$item->gambarproduk[0]->gambar) }}" alt="kapal">
                    </div>
                </div>
                <div class="col-lg-4 col-9">
                    <div class="cyan-text d-flex align-items-center gap-2 cyan">
                        <h2>
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16"><path fill="currentColor" d="M0 7h16v1H0z"/></svg>
                        </h2>
                        <p>{{$item->kategori_produk->kategori}}</p>
                    </div>
                    <div class="text-white text-lg-start text-center">
                        <h2 class="my-3">{{$item->nama}}</h2>
                        <p class="fw-200">{!! $item->deskripsi !!}</p>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

    </div>
@endsection