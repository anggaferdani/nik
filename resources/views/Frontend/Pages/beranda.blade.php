@extends('Frontend.main')
@section('title', 'beranda')
<link rel="stylesheet" href="{{asset('../Css/Frontend/beranda.css')}}"> 
<link rel="stylesheet" href="{{asset('../Css/Frontend/global.css')}}"> 
    
@section('content')
    <div id="top-content">
        <div class="container">
            <div class="d-flex align-items-center gap-2 cyan">
                <h2>
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16"><path fill="currentColor" d="M0 7h16v1H0z"/></svg>
                </h2>
                <p>Lorem ipsum dolor sit amet consectetur.</p>
            </div>
            <div class="desc text-white text-sm-start text-center">
                <h3 class="w-40 fw-bold my-3"> PENYEDIA PERANGKAT TELEKOMUNIKASI SATELIT DAN NAVIGASI LAUT </h3>
                <p class="w-30">Lorem ipsum dolor sit amet consectetur. Venenatis tortor quam sollicitudin nulla amet id faucibus.</p>
            </div>
            <div class="button d-flex justify-content-sm-start justify-content-center gap-3 mt-3">
                <a href=""><button class="btn-nik rgb-red text-white" type="submit">Lorem ipsum.</button></a>
                <a href=""><button class="btn-nik rgb-blue text-white" type="submit">Lorem ipsum.</button></a>
            </div>
        </div>
        <div class="button-down text-center">
            <h1><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="white" d="M9 4h6v8h4.84L12 19.84L4.16 12H9z"/></svg></h1>
            <span class="text-white">SCROLL DOWN</span>
        </div>
    </div>

    
    <div id="animated-image" class="image-animasi1">
        <img src="{{ asset('Images/animasi-transparan.png') }}" alt="Animated Image">
    </div>


            <div id="second-content" class="">
                <img class="ellipse d-none" src="{{ asset('Images/ellipse-second.png') }}" alt="">
                <div class="container">
                    
                    <div class="isi-second-content">
                        <div class="text-white text-center" id="sc-content">
                            <img class="mb-5 satellite-image" src="{{ asset('Images/satellite-station.png') }}" alt="">
                            {{-- <div class="">
                                <h3>SIAPA KAMI?</h3>
                            <p>Perusahaan kami berpengalaman menyediakan solusi dan perangkat dibidang telekomunikasi satelit dan navigasi laut dengan membawa beberapa merek ternama. Sebagai distributor resmi dari Thuraya, KODEN, dan beberapa brand lainnya, kami memastikan bahwa setiap produk yang kami jual adalah produk asli dan berkualitas tinggi...</p>
                            <p class="red my-3">Selengkapnya>></p>
                            </div> --}}
                        </div>
            
                        {{-- <div class="row justify-content-center ">
                            <div class="col-lg-4 col-10 my-lg-0 my-3">
                                <div class="border-cyan p-4 text-white">
                                    <div class="d-flex align-items-center justify-content-between w-100  mb-3">
                                        <div class="text-start" id="judul-visi">
                                            <h5 class="cyan fw-bold">VISI SATELIT</h5>
                                            <h5 class="cyan fw-bold">STATION</h5>
                                        </div>
                                        <img class="rotate h-25" src="{{ asset('Images/panah.png')}}" alt="">
                                    </div>
                                    <p class="fw-200">Menjadi pemimpin terkemuka dalam layanan konektivitas satelit dan alat navigasi kapal, menjadi pilihan utama pelanggan untuk solusi komunikasi dan navigasi yang handal dan inovatif di Indonesia.</p>
                                </div>
                            </div>
                            <div class="col-lg-8 col-10" id="grid-second-content">
                                <div class="grid-visi-satelit">
                                    <div class="border-cyan p-4 text-white">
                                        <div class="d-flex justify-content-start w-100">
                                            <img class="w-30" src="{{ asset('Images/panah.png')}}" alt="">
                                        </div>
                                        <p class="fw-200 text-end fw-bold">GOOD SOLUTION</p>
                                    </div>
                                </div>
                                <div class="grid-visi-satelit">
                                    <div class="border-cyan p-4 text-white">
                                        <div class="d-flex justify-content-start w-100">
                                            <img class="w-30" src="{{ asset('Images/panah.png')}}" alt="">
                                        </div>
                                        <p class="fw-200 text-end fw-bold">CUSTOMER FIRST</p>
                                    </div>
                                </div>
                                <div class="grid-visi-satelit">
                                    <div class="p-3 text-white">
                                        <div class="" id="judul-misi">
                                            <h5 class="cyan fw-bold text-start">MISI SATELIT</h5>
                                            <h5 class="cyan fw-bold text-center">STATION</h5>
                                        </div>
                                        <div class="d-flex justify-content-end w-100 mt-2">
                                            <img src="{{ asset('Images/panah.png')}}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="grid-visi-satelit">
                                    <div class="border-cyan p-4 text-white">
                                        <div class="d-flex justify-content-start w-100">
                                            <img class="w-30" src="{{ asset('Images/panah.png')}}" alt="">
                                        </div>
                                        <p class="fw-200 text-end fw-bold">SUSTAINABLE DEVELOPMENT</p>
                                    </div>
                                </div>
                                <div class="grid-visi-satelit">
                                    <div class="border-cyan p-4 text-white">
                                        <div class="d-flex justify-content-start w-100">
                                            <img class="w-30" src="{{ asset('Images/panah.png')}}" alt="">
                                        </div>
                                        <p class="fw-200 text-end fw-bold">LOCAL MARKET LEADER</p>
                                    </div>
                                </div>
                                <div class="grid-visi-satelit">
                                    <div class="border-cyan p-4 text-white">
                                        <div class="d-flex justify-content-start w-100">
                                            <img class="w-30" src="{{ asset('Images/panah.png')}}" alt="">
                                        </div>
                                        <p class="fw-200 text-end fw-bold">PARTNERSHIP</p>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        
            <div id="third-content" class="py-5">
                <h3 class="text-center cyan mb-3">LAYANAN KAMI</h3>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-12 my-md-0 my-2">
                            <div class="content-layanan p-2">
                                <div class="gambar-layanan w-100">
                                    <div class="image-wrapper">
                                        <img class="blur-bottom w-100" src="{{ asset('Images/kapal.png') }}" alt="kapal">
                                    </div>
                                        
                                    <div class="cyan-text d-flex align-items-center gap-2 cyan">
                                        <h2>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16"><path fill="currentColor" d="M0 7h16v1H0z"/></svg>
                                        </h2>
                                        <p>Navigasi & Radio</p>
                                    </div>
                                </div>
                                <div class="deskripsi-layanan text-white text-md-start text-center">
                                    <h3 class="my-3">PENYEDIA ALAT NAVIGASI MARITIM</h3>
                                    <p class="fw-300 w-60">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Minima quibusdam soluta illo!</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12 my-md-0 my-2">
                            <div class="content-layanan p-2">
                                <div class="gambar-layanan w-100">
                                    <div class="image-wrapper">
                                        <img class="blur-bottom w-100" src="{{ asset('Images/antena.png') }}" alt="kapal">
                                    </div>
                                        
                                    <div class="cyan-text d-flex align-items-center gap-2 cyan">
                                        <h2>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16"><path fill="currentColor" d="M0 7h16v1H0z"/></svg>
                                        </h2>
                                        <p>Internet Satelit & Telepon Satelit</p>
                                    </div>
                                </div>
                                <div class="deskripsi-layanan text-white text-md-start text-center">
                                    <h3 class="my-3">PEYEDIA LAYANAN KOMUNIKASI
                                        SATELIT DAN RADIO DI INDONESIA</h3>
                                    <p class="fw-300 w-60">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Minima quibusdam soluta illo!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
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
<<<<<<< HEAD
        
        
            <div id="fifth-content" class="py-4">
                <div class="parent-grid-fifth">
                    @foreach ($produk as $item)
                    <div class="grid-fifth">
                        <div class="border-cyan p-4 text-white d-flex justify-content-center">
                            <div class="gambar-layanan">
                                <div class="image-wrapper-cyan text-center">
                                    <div class="d-flex justify-content-center">
                                        <img class="blur-bottom w-50" src="{{ asset('Images/thuraya.png') }}" alt="">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <h1>{{$item->nama}}</h1>
                                    <h3>{{$item->kategori_produk->kategori}}</h3>
                                    <div class="button d-flex justify-content-center gap-3 mt-3">
                                        <a href=""><button class="btn-pelajari solid-blue text-white" type="submit">Pelajari</button></a>
                                        <a href=""><button class="btn-beli border-white" type="submit">Beli</button></a>
                                    </div>
                                </div>
=======
        </div>
    </div>

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


    <div id="fifth-content" class="py-4">
        <div class="parent-grid-fifth">
            @foreach ($produk as $item)
            <div class="grid-fifth">
                <div class="border-cyan p-4 text-white d-flex justify-content-center">
                    <div class="gambar-layanan">
                        <div class="image-wrapper-cyan text-center">
                            <div class="d-flex justify-content-center">
                                <img class="blur-bottom w-50" src="{{ asset('storage/image/'.$item->gambarproduk[0]->gambar) }}" alt="">
                            </div>
                        </div>
                        <div class="text-center">
                            <h1>{{$item->nama}}</h1>
                            <h3>{{$item->kategori_produk->kategori}}</h3>
                            <div class="button d-flex justify-content-center gap-3 mt-3">
                                <a href=""><button class="btn-pelajari solid-blue text-white" type="submit">Pelajari</button></a>
                                <a href=""><button class="btn-beli border-white" type="submit">Beli</button></a>
>>>>>>> ff9ac9a2ec5374e3c9c49ab2fdb49f73dbf57607
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-center my-5">
                    <a href=""><button class="btn-pelajari  mx-auto  border-white" type="submit">Selengkapnya>></button></a>
                </div>
            </div>
<<<<<<< HEAD
=======
            @endforeach
        </div>
        <div class="d-flex justify-content-center my-5">
            <a href="/selengkapnya"><button class="btn-pelajari  mx-auto  border-white" type="submit">Selengkapnya>></button></a>
        </div>
    </div>
>>>>>>> ff9ac9a2ec5374e3c9c49ab2fdb49f73dbf57607

    {{-- <div id="top-content">
        <div class="button-down text-center">
            <h1><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="white" d="M9 4h6v8h4.84L12 19.84L4.16 12H9z"/></svg></h1>
            <span class="text-white">SCROLL DOWN</span>
        </div>
    </div>
    <div id="animated-image" class="image-animasi hidden">
        <img src="{{ asset('Images/animasi.png') }}" alt="Animated Image" style="width: 100%; height: 100%;">
    </div>
    <div id="second-content"></div>
    <div id="third-content"></div>
    <div id="forth-content"></div>
    <div id="fifth-content"></div> --}}

    
    <script>
        window.addEventListener('scroll', function() {
            var topContent = document.getElementById('top-content');
            var secondContent = document.getElementById('second-content');
            var animatedImage = document.getElementById('animated-image');
            var scrollY = window.scrollY;
            var scrollPercentage = scrollY / topContent.offsetHeight;
            var secondContentMiddle = secondContent.offsetTop + (secondContent.offsetHeight / 1000);

            if (scrollPercentage >= 0.2 && scrollY < secondContentMiddle) {
            // if (scrollPercentage >= 0.2) {
                animatedImage.classList.remove('hidden');
            } else {
                animatedImage.classList.add('hidden');
            }
        });
    </script>
    
    
        
@endsection