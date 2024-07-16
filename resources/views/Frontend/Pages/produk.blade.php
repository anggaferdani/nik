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

    <div id="fifth-content" class="py-4">
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
                                <a href="/keranjang"><button class="btn-beli border-white" type="submit">Beli</button></a>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
