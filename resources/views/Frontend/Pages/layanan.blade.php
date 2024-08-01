@extends('Frontend.main')
@section('title', 'layanan')
<link rel="stylesheet" href="{{asset('../Css/Frontend/layanan.css')}}"> 
<link rel="stylesheet" href="{{asset('../Css/Frontend/global.css')}}"> 
    
@section('content')
    <div id="pages-layanan">

        <div id="top-content">
            <div class="container">
                <h3 class="cyan fw-bold">{{ $companyProfile->title_layanan }}</h3>
                <p class="text-white my-3">{{ $companyProfile->description_layanan }}</p>
            </div>
        </div>

        <div id="bottom-content" class="my-5">
            @foreach ($layanans as $index => $layanan)
                @if ($index % 2 == 0)
                    <div class="row align-items-center justify-content-lg-start justify-content-center my-xl-3 my-5">
                        <div class="col-lg-7 col-12 d-flex justify-content-lg-start justify-content-center my-lg-0 my-3">
                            <div class="image-container w-80">
                                <img class="image-blur" src="layanan/file/{{ $layanan->file }}" alt="kapal">
                            </div>
                        </div>
                        <div class="col-lg-4 col-9">
                            <div class="cyan-text d-flex align-items-center gap-2 cyan">
                                <h2>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16">
                                        <path fill="currentColor" d="M0 7h16v1H0z"/>
                                    </svg>
                                </h2>
                                <p>{{ $layanan->category }}</p>
                            </div>
                            <div class="text-white text-lg-start text-center">
                                <h2 class="my-3">{{ $layanan->title }}</h2>
                                <p class="fw-200">{{ $layanan->description }}</p>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="row align-items-center justify-content-lg-end justify-content-center my-xl-3 my-5">
                        <div class="col-lg-4 col-9">
                            <div class="cyan-text d-flex align-items-center gap-2 cyan">
                                <h2>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16">
                                        <path fill="currentColor" d="M0 7h16v1H0z"/>
                                    </svg>
                                </h2>
                                <p>{{ $layanan->category }}</p>
                            </div>
                            <div class="text-white text-lg-start text-center">
                                <h2 class="my-3">{{ $layanan->title }}</h2>
                                <p class="fw-200">{{ $layanan->description }}</p>
                            </div>
                        </div>
                        <div class="col-lg-7 col-12 d-lg-block d-none text-end my-lg-0 my-3">
                            <div class="image-container w-80">
                                <img class="image-blur" src="layanan/file/{{ $layanan->file }}" alt="kapal">
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach

        </div>

    </div>
@endsection