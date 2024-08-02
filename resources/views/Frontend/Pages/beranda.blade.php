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
                <p class="">{{ $companyProfile->subsubtitle }}</p>
            </div>
            <div class="desc text-white text-sm-start text-center">
                <h3 class="w-40 fw-bold my-3">{{ $companyProfile->title }}</h3>
                <p class="w-30">{{ $companyProfile->subtitle }}</p>
            </div>
            <div class="button d-flex justify-content-sm-start justify-content-center gap-3 mt-3">
                <a href=""><button class="btn-nik rgb-red text-white" type="submit">Lorem ipsum.</button></a>
                <a href=""><button class="btn-nik rgb-blue text-white" type="submit">Lorem ipsum.</button></a>
            </div>
        </div>
    </div>


    <div id="animated-image" class="image-animasi hidden">
        {{-- !WIP: needs to be fixed --}}
        <img src="{{ asset('Images/animasi-transparan.png') }}" alt="Animated Image">
    </div>

    <div id="second-content" class="second-content">
        <img class="ellipse d-none" src="{{ asset('Images/ellipse-second.png') }}" alt="">
        <div class="container">

            <div class="isi-second-content">
                <div class="text-white text-center">
                    <img id="animationVisible1" class=" mb-5 satellite-image" src="{{ asset('Images/satellite-station.png') }}" alt="">

                    <div class="" id="animationVisible2">
                        <h3 class="mb-3 ">SIAPA KAMI?</h3>
                        <p class="mb-5 ">{{ $companyProfile->description }}</p>
                        {{-- <p class="red my-3">Selengkapnya>></p> --}}
                    </div>
                </div>

                <div class="row justify-content-center" id="visi">
                    <div class="col-lg-4 col-10 my-lg-0 my-3">
                        <div class="border-cyan p-4 text-white">
                            <div class="d-flex align-items-center justify-content-between w-100  mb-3">
                                <div class="text-start" id="judul-visi">
                                    <h5 class="cyan fw-bold">VISI SATELIT</h5>
                                    <h5 class="cyan fw-bold">STATION</h5>
                                </div>
                                <img class="rotate h-25" src="{{ asset('Images/panah.png')}}" alt="">
                            </div>
                            <p class="fw-200">{{ $companyProfile->visi }}</p>
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
                </div>
            </div>
        </div>
    </div>

    <div id="third-content" class="py-5">
        <h3 class="text-center cyan mb-3">LAYANAN KAMI</h3>
        <div class="container">
            <div class="row">
                @foreach ($layanans as $layanan)
                    <div class="col-md-6 col-12 my-md-0 my-2">
                        <div class="content-layanan p-2">
                            <div class="gambar-layanan w-100">
                                <div class="image-wrapper">
                                    <img class="blur-bottom w-100" src="layanan/file/{{ $layanan->file }}" alt="">
                                </div>

                                <div class="cyan-text d-flex align-items-center gap-2 cyan">
                                    <h2>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16"><path fill="currentColor" d="M0 7h16v1H0z"/></svg>
                                    </h2>
                                    <p>{{ $layanan->category }}</p>
                                </div>
                            </div>
                            <div class="deskripsi-layanan text-white text-md-start text-center">
                                <h3 class="my-3">{{ $layanan->title }}</h3>
                                <p class="fw-300 w-60">{{ $layanan->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
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

    <div id="fifth-content" class="py-4">
        <div class="container">
            <div class="parent-grid-fifth">
                @foreach ($produk as $item)
                    <div class="grid-fifth">
                        <div class="border-cyan p-4 text-white d-flex justify-content-center">
                            <div class="gambar-layanan">
                                <div class="image-wrapper-cyan text-center">
                                    <div class="d-flex justify-content-center">
                                        <div class="image-container">
                                            <img class="w-100" src="/produk/file/{{ $item->file }}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <h1>{{ $item->nama }}</h1>
                                    <h3>{{ $item->kategori_produk->kategori }}</h3>
                                    <div class="button d-flex justify-content-center gap-3 mt-3">
                                        <a href="{{ Route('detail.produk', $item->encryptId) }}">
                                            <button class="btn-pelajari solid-blue text-white" type="submit">Detail</button>
                                        </a>

                                        <button class="btn-beli border-white" onclick="handleModal({
                                            productId: '{{ $item->encryptId }}',
                                            productName: '{{ $item->nama }}'
                                        })">Add to cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center my-5">
                <a href="{{ Route('produk-kami') }}"><button class="btn-pelajari  mx-auto  border-white" type="submit">Selengkapnya>></button></a>
            </div>
        </div>
    </div>

    <div id="confirmation-modal"></div>

    {{-- @auth --}}
        <script>
            function handleModal({
                productId = null,
                productName = null
            }) {
                if (!productName || !productId) { throw "Kurangnya parameter modal!"; }

                const modalSet = document.getElementById("confirmation-modal");

                const url = ["{{ Route('post.submit.keranjang', '') }}", productId];

                const action = url.join('/');

                @auth
                const modalDom =
                    '<div class="custom-modal">' +
                        '<div class="custom-modal-container">' +
                            '<div style="display: flex; flex-direction: column; justify-content: center; align-items: center; gap: 2rem;">' +
                                '<svg  xmlns="http://www.w3.org/2000/svg"  width="48"  height="48"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-help-hexagon"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19.875 6.27c.7 .398 1.13 1.143 1.125 1.948v7.284c0 .809 -.443 1.555 -1.158 1.948l-6.75 4.27a2.269 2.269 0 0 1 -2.184 0l-6.75 -4.27a2.225 2.225 0 0 1 -1.158 -1.948v-7.285c0 -.809 .443 -1.554 1.158 -1.947l6.75 -3.98a2.33 2.33 0 0 1 2.25 0l6.75 3.98h-.033z" /><path d="M12 16v.01" /><path d="M12 13a2 2 0 0 0 .914 -3.782a1.98 1.98 0 0 0 -2.414 .483" /></svg>' +
                                '<span style="font-weight: bold; font-size: 2rem; text-align: center;">' + productName + '</span>' +
                                '<span style="text-align: center">Apakah anda ingin memasukkan produk ini <br> kedalam keranjang anda?</span>' +
                                '<div style="display: flex; justify-content: center; align-items: center; gap: 1rem;">' +
                                    '<button onclick="handleCloseModal()" id="cancel-button" style="padding: .5rem 4rem; color: white; background: hsla(358, 86%, 45%, 1); border: 2px solid hsla(358, 86%, 45%, 1); border-radius: 100rem;">Tidak</button>' +
                                    '<button form="confirmation-form" style="padding: .5rem 4rem; color: white; background: hsla(201, 100%, 41%, 1); border: 2px solid hsla(201, 100%, 41%, 1); border-radius: 100rem;">Lanjut</button>' +
                                '</div>' +
                            '</div>' +
                            '<form id="confirmation-form" action="' + action + '" method="post">' +
                                '{{ csrf_field() }}'
                            '</form>' +
                        '</div>' +
                    '</div>'
                ;
                @endauth

                @guest
                const modalDom =
                    '<div class="custom-modal">' +
                        '<div class="custom-modal-container">' +
                            '<div style="display: flex; flex-direction: column; justify-content: center; align-items: center; gap: 2rem;">' +
                                '<svg  xmlns="http://www.w3.org/2000/svg"  width="48"  height="48"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-help-hexagon"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19.875 6.27c.7 .398 1.13 1.143 1.125 1.948v7.284c0 .809 -.443 1.555 -1.158 1.948l-6.75 4.27a2.269 2.269 0 0 1 -2.184 0l-6.75 -4.27a2.225 2.225 0 0 1 -1.158 -1.948v-7.285c0 -.809 .443 -1.554 1.158 -1.947l6.75 -3.98a2.33 2.33 0 0 1 2.25 0l6.75 3.98h-.033z" /><path d="M12 16v.01" /><path d="M12 13a2 2 0 0 0 .914 -3.782a1.98 1.98 0 0 0 -2.414 .483" /></svg>' +
                                '<span style="font-weight: bold; font-size: 2rem; text-align: center;">Apakah anda sudah mempunyai akun?</span>' +
                                '<span style="text-align: center">Masuk sebagai User untuk melakukan pembelian barang.</span>' +
                                '<div style="display: flex; justify-content: center; align-items: center; gap: 1rem;">' +
                                    '<button onclick="handleCloseModal()" id="cancel-button" style="padding: .5rem 4rem; color: white; background: hsla(358, 86%, 45%, 1); border: 2px solid hsla(358, 86%, 45%, 1); border-radius: 100rem;">Batal</button>' +
                                    '<button form="confirmation-form" style="padding: .5rem 4rem; color: white; background: hsla(201, 100%, 41%, 1); border: 2px solid hsla(201, 100%, 41%, 1); border-radius: 100rem;">Masuk</button>' +
                                '</div>' +
                            '</div>' +
                            '<form id="confirmation-form" action="' + action + '" method="post">' +
                                '{{ csrf_field() }}'
                            '</form>' +
                        '</div>' +
                    '</div>'
                ;
                @endguest

                if (modalSet) { modalSet.innerHTML = modalDom; }
            }

            function handleCloseModal() {
                const modalSet = document.getElementById("confirmation-modal");

                if (modalSet) { modalSet.innerHTML = null; }
            }
        </script>
    {{-- @endauth --}}

    <script>
            window.addEventListener('scroll', function() {
            var animationVisible1 = document.getElementById('animationVisible1');
            var animationVisible2 = document.getElementById('animationVisible2');
            var animationVisible3 = document.getElementById('animationVisible3');
            var topContent = document.getElementById('top-content');
            var animatedImage = document.getElementById('animated-image');
            var sec = document.getElementById('second-content');
            var animatedImg = animatedImage.querySelector('img');

            var topContentHeight = topContent.offsetHeight;
            var scrollPosition = window.scrollY;

            // Calculate the 10% threshold
            var threshold = topContentHeight * 0.1;

            // Calculate scale based on scroll position
            var scaleValue = Math.max(1, 50 - (scrollPosition / topContentHeight * 55));

            animatedImg.style.transform = `scale(${scaleValue})`;

            // Check if top-content is scrolled past 10% and handle visibility
            if (scrollPosition > threshold && scaleValue > 1) {
                animatedImage.classList.add('visible');
                animatedImage.classList.remove('hidden');
                setTimeout(function() {
                    animationVisible1.classList.add('non-visible');
                    animationVisible2.classList.add('non-visible');
                    animationVisible3.classList.add('non-visible');
                    animationVisible1.classList.add('animated-none');
                    animationVisible2.classList.add('animated-none');
                    animationVisible3.classList.add('animated-none');

                    animationVisible1.classList.remove('animated-visible');
                    animationVisible2.classList.remove('animated-visible');
                    animationVisible3.classList.remove('animated-visible');
                    animationVisible1.classList.remove('slide-up');
                    animationVisible2.classList.remove('slide-up');
                    animationVisible3.classList.remove('slide-up');
                }, 100);
            } else {
                animatedImage.classList.remove('visible');
                animatedImage.classList.add('hidden');
                // Use a setTimeout to add a delay before adding the slide-up class
                setTimeout(function() {
                    animationVisible1.classList.remove('non-visible');
                    animationVisible2.classList.remove('non-visible');
                    animationVisible3.classList.remove('non-visible');
                    animationVisible1.classList.remove('animated-none');
                    animationVisible2.classList.remove('animated-none');
                    animationVisible3.classList.remove('animated-none');

                    animationVisible1.classList.add('animated-visible');
                    animationVisible2.classList.add('animated-visible');
                    animationVisible3.classList.add('animated-visible');
                    animationVisible1.classList.add('slide-up');
                    animationVisible2.classList.add('slide-up');
                    animationVisible3.classList.add('slide-up');
                }, 100); // Adjust the delay as needed
            }

            // Parallax effect for the background image
            var parallaxSpeed = 0.5; // Adjust the speed as needed
            topContent.style.backgroundPositionY = -(scrollPosition * parallaxSpeed) + 'px';
        });

    </script>
@endsection
