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
                <button class="btn btn-option rgb-red" data-kategori="all" type="button">Semua</button>
                @foreach ($kategori as $item)
                <button class="btn btn-option" data-kategori="{{ $item->kategori }}" type="button">{{ $item->kategori }}</button>
                @endforeach
            </div>
        </div>
    </div>

    <div id="fifth-content" class="py-4 container">
        <div class="parent-grid-fifth">
            @foreach ($produk as $item)
            <div class="grid-fifth" data-kategori="{{ $item->kategori_produk->kategori }}">
                <div class="border-cyan p-4 text-white d-flex justify-content-center">
                    <div class="gambar-layanan">
                        <div class="image-wrapper-cyan text-center">
                            <div class="d-flex justify-content-center">
                                <img class="blur-bottom w-50" src="{{ asset('storage/image/'.$item->gambarproduk[0]->gambar) }}" alt="">
                            </div>
                        </div>
                        <div class="text-center">
                            <h1>{{ $item->nama }}</h1>
                            <h3>{{ $item->kategori_produk->kategori }}</h3>
                            <div class="button d-flex justify-content-center gap-3 mt-3">
                                <a href="/detail-produk/{{$item->encryptId}}"><button class="btn-pelajari solid-blue text-white" type="submit">Pelajari</button></a>
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
            <a href=""><button class="btn-pelajari mx-auto border-white" type="submit">Selengkapnya>></button></a>
        </div>
    </div>

    <div id="confirmation-modal"></div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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

    <script>
        $(document).ready(function() {
            $('.btn-option').on('click', function() {
                // Hapus class rgb-red dari semua tombol
                $('.btn-option').removeClass('rgb-red');
                // Tambahkan class rgb-red ke tombol yang diklik
                $(this).addClass('rgb-red');

                // Dapatkan kategori yang dipilih
                var kategori = $(this).data('kategori');

                // Tampilkan/hilangkan produk berdasarkan kategori
                if (kategori === 'all') {
                    $('.grid-fifth').show();
                } else {
                    $('.grid-fifth').hide();
                    $('.grid-fifth[data-kategori="' + kategori + '"]').show();
                }
            });
        });
    </script>





    {{-- <div id="fifth-content" class="py-4">
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
    </div> --}}
@endsection
