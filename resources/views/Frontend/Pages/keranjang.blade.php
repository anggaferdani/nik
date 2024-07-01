@extends('Frontend.main')
@section('title', 'Keranjang')
<link rel="stylesheet" href="{{asset('../Css/Frontend/keranjang.css')}}">
<link rel="stylesheet" href="{{asset('../Css/Frontend/global.css')}}">

@section('content')


<div class="container my-5" id="keranjang">
    <form action="/submit-keranjang" method="post">
        @csrf
        <div class="row justify-content-between">
            <div class="col-7">
                <div class="form-check text-white" style="padding-left: 0 !important">
                    <label class="form-check-label" for="flexCheckDefault">
                        Pilih Produk
                    </label>
                </div>
                @foreach ($data as $item)

                <div class="foreach-produk">
                    <hr class="hr text-white">
                    </hr>
                    <div class="form-check d-flex align-items-start gap-3 text-white">
                        <input class="form-check-input" type="checkbox" name="produk_id[]" value="{{$item->id}}"
                            id="produkId">
                        <label class="form-check-label w-100" for="flexCheckDefault">
                            <div class="judul d-flex align-items-center gap-3">
                                <div class="border-order p-2 text-white">
                                    <div class="gambar-layanan">
                                        <div class="text-center">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <img class="blur-bottom w-50"
                                                    src="{{ asset('storage/image/'.$item->gambarproduk[0]->gambar) }}"
                                                    alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-white">
                                    <h5>{{$item->nama}}</h5>
                                    <p class="my-1">{{$item->kategori_produk->kategori}}</p>
                                    <h5 class="harga-produk" data-harga="{{$item->harga}}">Rp. {{$item->harga}}</h5>
                                </div>
                            </div>
                            <div class="bawah-judul mt-2 d-flex justify-content-end align-items-center w-100 gap-5">
                                <div class="quantity">
                                    <div class="minus button" aria-label="Decrease">
                                        <p>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                viewBox="0 0 24 24">
                                                <path fill="none" stroke="white" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="M5 12h14" /></svg>
                                        </p>
                                    </div>
                                    <input type="number" class="input-box" id="qty-{{ $item->id }}" value="0"
                                        name="qty[]" min="1" max="100" readonly>
                                    <div class="plus button" aria-label="Increase">
                                        <p>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                viewBox="0 0 24 24">
                                                <path fill="none" stroke="white" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M5 12h7m7 0h-7m0 0V5m0 7v7" /></svg>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>
                @endforeach

            </div>
            <div class="col-4 par-ringkasan-belanja text-white">
                <div class="ringkasan-belanja">
                    <p class="fw-bold">Total Belanja</p>
                    <hr>
                    <div class="">
                        Rp. <input type="text" id="total-harga" name="total_belanja" value="0"
                            style="background: none; border:none; color:white" readonly>
                    </div>
                    <button type="submit" class="btn-pesan-sekarang bg-cyan mt-4">Pesan Sekarang</button>
                </div>
            </div>
        </div>
    </form>

</div>
@if (session('error'))
    <script>
        alert('{{session('error')}}')
    </script>
@endif

<script>
    $(document).ready(function () {
        totalHarga = 0;
        totalBarang = 0;
        $('input[name="produk_id[]"]').change(function () {
            let produk_id = $(this).val();
            let isChecked = $(this).prop('checked');
            let harga = parseInt($(this).closest('.form-check').find('.harga-produk').attr(
                'data-harga'));
            if (isChecked) {
                // Tambahkan harga produk * qty ke totalHarga

                qty = parseInt($('#qty-' + produk_id).val(1));
                totalHarga += harga;
                $('#total-harga').val(totalHarga);
                totalBarang += 1;
                $('#jumlah-produk-dicentang').text('(' + totalBarang + ')');
                // console.log('tothrg',totalHarga)
            } else {
                qtyini = parseInt($('#qty-' + produk_id).val());
                // console.log('qty',qtyini)
                // console.log('hrg',harga)
                // console.log('tothrg',totalHarga)
                totalHarga -= qtyini * harga
                $('#total-harga').val(totalHarga);
                $('#qty-' + produk_id).val(0)
                totalBarang -= 1;
                $('#jumlah-produk-dicentang').text('(' + totalBarang + ')');
            }
            // console.log('totalharga', totalHarga);
            // Update nilai #total-harga
        });

        $('.plus').click(function () {
            let produk_id = $(this).closest('.form-check').find('input[name="produk_id[]"]').val();
            let harga = parseInt($(this).closest('.form-check').find('.harga-produk').attr(
                'data-harga'));
            let currentQty = parseInt($('#qty-' + produk_id).val());
            noQty = currentQty + 1;

            $('#qty-' + produk_id).val(noQty);
            totalHarga += harga
            // console.log('totalharga',totalHarga);
            $('#total-harga').val(totalHarga);
            // Check checkbox produk_id
            $('input[name="produk_id[]"][value="' + produk_id + '"]').prop('checked', true);

        });


        // // Event handler saat tombol minus di klik
        $('.minus').click(function () {
            let produk_id = $(this).closest('.form-check').find('input[name="produk_id[]"]').val();
            let harga = parseInt($(this).closest('.form-check').find('.harga-produk').attr('data-harga'));
            let currentQty = parseInt($('#qty-' + produk_id).val());
            if (currentQty > 0) {
                noQty = currentQty - 1;
                $('#qty-' + produk_id).val(noQty);
    
                totalHarga -= harga
                $('#total-harga').val(totalHarga);
            }
            if(currentQty == 1){
            $('input[name="produk_id[]"][value="' + produk_id + '"]').prop('checked', false);
            totalBarang -= 1;
                $('#jumlah-produk-dicentang').text('(' + totalBarang + ')');

            }

        });
       

    });

</script>

@endsection
