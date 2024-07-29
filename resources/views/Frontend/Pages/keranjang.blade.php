@extends('Frontend.main')
@section('title', 'Keranjang')
<link rel="stylesheet" href="{{asset('../Css/Frontend/keranjang.css')}}">
<link rel="stylesheet" href="{{asset('../Css/Frontend/global.css')}}">

@section('content')
<div class="container my-5" id="keranjang">
    @if ($keranjangs->count())
        <form id="clear-all-form" action="{{ Route('clear.all.keranjang') }}" method="post">
            @csrf
            @method('delete')
        </form>

        <form action="/submit-keranjang" method="post">
            @csrf
            <div class="row justify-content-between px-md-0 px-2">
                {{-- <div class="col-md-4 d-md-none d-block mb-3 par-ringkasan-belanja text-white">
                    <div class="ringkasan-belanja d-flex gap-3 align-items-center justify-content-between">
                        <div>
                            <p class="fw-bold mb-2">Total Belanja</p>
                            <div class="d-flex align-items-center ">
                                <p>Rp. </p>
                                <input type="text" id="total-harga" name="total_belanja" value="0"
                                    style="background: none; border:none; color:white" readonly>
                            </div>
                        </div>
                        <button type="submit" class="btn-pesan-sekarang bg-cyan w-25">Pesan</button>
                    </div>
                </div> --}}
                <div class="col-md-7 col-12">
                    <div class="form-check text-white" style="padding-left: 0 !important; display: flex; justify-content: space-between; align-items: flex-start">
                        <label class="form-check-label" for="flexCheckDefault">
                            Keranjang anda
                        </label>
                        <button form="clear-all-form" style="background: none; border: 2px solid hsla(358, 86%, 45%); color: hsla(358, 86%, 45%); border-radius: 20px; padding-inline: 1rem" type="submit">
                            Hapus semua
                        </button>
                    </div>
                    @forelse ($keranjangs as $keranjang)
                        <form id="clear-one-list-{{ $keranjang->id }}" action="{{ Route('clear.one.keranjang', Crypt::encrypt($keranjang->id)) }}" method="post">
                            @csrf
                            @method('delete')
                        </form>

                        <div class="foreach-produk">
                            <hr class="hr text-white" />
                            <div class="form-check d-flex align-items-start gap-3 text-white">
                                <input class="form-check-input" type="checkbox" name="produk_id[]" value="{{$keranjang->id}}" id="produkId">

                                <label class="form-check-label w-100" for="flexCheckDefault">
                                    <div class="judul d-flex align-items-center gap-3">
                                        <div class="border-order p-2 text-white">
                                            <div class="gambar-layanan">
                                                <div class="text-center">
                                                    <div class="d-flex justify-content-center align-items-center">
                                                        <img class="blur-bottom w-50" src="{{ asset('storage/image/'.$keranjang->produk->gambarproduk->first()->gambar) }}" alt="produk">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-white mt-md-0 mt-3 text-md-start text-center">
                                            <h5>{{$keranjang->produk->nama}}</h5>
                                            <p class="my-1">{{$keranjang->produk->kategori_produk->kategori}}</p>
                                            {{-- <h5 class="harga-produk" data-harga="{{$keranjang->produk->harga}}">Rp. {{$keranjang->produk->harga}}</h5> --}}
                                            <h5 class="harga-produk" data-harga="{{$keranjang->produk->harga}}">@rupiah($keranjang->produk->harga)</h5>
                                        </div>
                                    </div>
                                    <div class="bawah-judul mt-2 d-flex justify-content-end align-items-center w-100 gap-5">
                                        <div class="quantity">
                                            <div class="minus button" aria-label="Decrease">
                                                <p>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14" /></svg>
                                                </p>
                                            </div>
                                            <input type="number" class="input-box" id="qty-{{ $keranjang->id }}" value="1" name="qty[]" min="1" max="100" readonly>
                                            <div class="plus button" aria-label="Increase">
                                                <p>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h7m7 0h-7m0 0V5m0 7v7" /></svg>
                                                </p>
                                            </div>
                                        </div>

                                        <button style="background: none; border: 2px solid hsla(358, 86%, 45%); color: hsla(358, 86%, 45%); border-radius: 20px; padding-inline: 1rem" type="submit" form="clear-one-list-{{ $keranjang->id }}">Hapus</button>
                                    </div>
                                </label>
                            </div>
                        </div>
                    @empty
                        <div class="xy-center" style="height: 25rem">
                            <div class="text-white" style="display: flex; flex-direction: column; justify-content: center; align-items: center; gap: 1rem;">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-message-report"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 4a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-5l-5 3v-3h-2a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12z" /><path d="M12 8v3" /><path d="M12 14v.01" /></svg>
                                Keranjang anda kosong..
                            </div>
                        </div>
                    @endforelse
                </div>
                <div class="col-md-4 mb-md-0 mb-3 par-ringkasan-belanja text-white">
                    <div class="ringkasan-belanja d-md-block d-flex align-items-center">
                        <div>
                            <p class="fw-bold">Total Belanja</p>
                            <hr class="d-md-block d-none">
                            <div class="d-flex align-items-center">
                                <p style="color: rgb(200, 200, 200);">Estimated total:&nbsp;</p>
                                <p>Rp. </p>
                                <input type="text" id="total-harga" name="total_belanja" value="0"
                                    style="background: none; border:none; color:white" readonly>
                            </div>
                        </div>
                        <button type="submit" class="btn-pesan-sekarang d-md-block d-none bg-cyan mt-4">Buat Pesanan</button>
                        <button type="submit" class="btn-pesan-sekarang bg-cyan w-25 d-md-none d-block ms-auto">Pesan</button>
                    </div>
                </div>
            </div>
        </form>
    @else
        <div class="xy-center" style="height: 25rem">
            <div class="text-white" style="display: flex; flex-direction: column; justify-content: center; align-items: center; gap: 1rem;">
                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-message-report"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 4a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-5l-5 3v-3h-2a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12z" /><path d="M12 8v3" /><path d="M12 14v.01" /></svg>
                Keranjang anda kosong..
            </div>
        </div>
    @endif
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
