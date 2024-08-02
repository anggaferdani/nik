@extends('Frontend.main')
@section('title', 'Keranjang')
<link rel="stylesheet" href="{{asset('../Css/Frontend/keranjang.css')}}">
<link rel="stylesheet" href="{{asset('../Css/Frontend/global.css')}}">

@section('content')
<div class="container my-5" id="keranjang">
    @if(Session::get('success'))
        <div class="alert alert-important alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    @if ($keranjangs->count())
        <form id="orderForm" action="" method="post">
            <div class="row justify-content-between px-md-0 px-2">
                <div class="col-md-7 col-12">
                    <div class="form-check text-white" style="padding-left: 0 !important; display: flex; justify-content: space-between; align-items: flex-start">
                        <label class="form-check-label" for="flexCheckDefault">Keranjang anda</label>
                        <button id="deleteAllProduct" type="button" style="background: none; border: 2px solid hsla(358, 86%, 45%); color: hsla(358, 86%, 45%); border-radius: 20px; padding-inline: 1rem">Hapus semua</button>
                    </div>
                    @forelse ($keranjangs as $keranjang)
                        <div class="foreach-produk">
                            <hr class="hr text-white">
                            <div class="form-check d-flex align-items-start gap-3 text-white">
                                <label class="form-check-label w-100" for="flexCheckDefault">
                                    <div class="judul d-flex align-items-center gap-3">
                                        <div class="border-order p-2 text-white">
                                            <div class="gambar-layanan">
                                                <div class="text-center">
                                                    <div class="d-flex justify-content-center align-items-center">
                                                        <img class="blur-bottom w-50" src="/produk/file/{{ $keranjang->produk->file }}" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-white">
                                            <h5>{{$keranjang->produk->nama}}</h5>
                                            <h5 class="hargaProduk" data-harga-produk="{{ $keranjang->produk->harga }}">@rupiah($keranjang->produk->harga)</h5>
                                        </div>
                                    </div>
                                    <div class="bawah-judul d-flex justify-content-end align-items-center w-100 gap-5">
                                        <div class="quantity">
                                            <div class="button me-3 minusButton" data-id="{{ $keranjang->id }}" data-produk-nama="{{ $keranjang->produk->nama }}"><i class="fa-solid fa-minus"></i></div>
                                            <div class="quantityProduct">1</div>
                                            <div class="button ms-3 plusButton" data-id="{{ $keranjang->id }}" data-produk-nama="{{ $keranjang->produk->nama }}"><i class="fa-solid fa-plus"></i></div>
                                        </div>

                                        <button class="deleteProductButton" type="button" data-id="{{ $keranjang->id }}" data-produk-nama="{{ $keranjang->produk->nama }}" style="background: none; border: 2px solid hsla(358, 86%, 45%); color: hsla(358, 86%, 45%); border-radius: 20px; padding-inline: 1rem">Hapus</button>
                                    </div>
                                </label>
                            </div>
                        </div>
                    @empty
                        <div class="xy-center" style="height: 25rem">
                            <div class="text-white" style="display: flex; flex-direction: column; justify-content: center; align-items: center; gap: 1rem;">Keranjang anda kosong</div>
                        </div>
                    @endforelse
                </div>
                <div class="col-md-4 mb-md-0 mb-4 par-ringkasan-belanja text-white">
                    <div class="ringkasan-belanja d-md-block">
                        <div>
                            <p class="fw-bold">Total Belanja</p>
                            <hr class="d-md-block d-none">
                            <div class="">
                                <div style="color: rgb(200, 200, 200);">Total:</div>
                                <div class="fs-5 hargaTotal">Rp. </div>
                            </div>
                        </div>
                        <button type="button" class="btn-pesan-sekarang bg-cyan mt-4" data-bs-toggle="modal" data-bs-target="#pesanModal">Buat Pesanan</button>
                    </div>
                </div>
            </div>
        </form>
    @else
        <div class="xy-center" style="height: 25rem">
            <div class="text-white" style="display: flex; flex-direction: column; justify-content: center; align-items: center; gap: 1rem;">Keranjang anda kosong</div>
        </div>
    @endif
</div>

<div class="modal fade" id="pesanModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="{{ route('submit-order') }}" method="POST" enctype="multipart/form-data" class="mb-0">
            @csrf
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Data Pemesanan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" class="form-control" name="user_id" value="{{ Auth::user()->id }}" placeholder="">
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama" placeholder="">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" placeholder="">
                </div>
                <div class="mb-3">
                    <label class="form-label">No. Telp</label>
                    <input type="number" class="form-control" name="no_telp" placeholder="">
                </div>
                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea class="form-control" name="alamat" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Bukti Bayar</label>
                    <input type="file" class="form-control" name="bukti_bayar" placeholder="">
                </div>
                <input type="hidden" id="produk_ids" name="produk_ids" value="">
                <input type="hidden" id="quantities" name="quantities" value="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                <button type="submit" class="btn btn-primary">Pesan</button>
            </div>
        </form>
      </div>
    </div>
</div>

@if (session('error'))
    <script>
        alert('{{session('error')}}')
    </script>
@endif


@endsection
@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.btn-pesan-sekarang').on('click', function() {
            let productIds = [];
            let quantities = [];

            $('.foreach-produk').each(function() {
                let productId = $(this).find('.deleteProductButton').data('id');
                let quantity = $(this).find('.quantityProduct').text().trim();

                productIds.push(productId);
                quantities.push(quantity);
            });

            $('#produk_ids').val(productIds.join(','));
            $('#quantities').val(quantities.join(','));
        });
    });

    $(document).ready(function() {
        $(document).on('click', '.plusButton', function() {
            let quantityElement = $(this).siblings('.quantityProduct');
            let currentQuantity = parseInt(quantityElement.text());
            let productId = $(this).data('id');

            quantityElement.text(currentQuantity + 1);
            updateTotal();
        });

        // Handle click event for the minus button
        $(document).on('click', '.minusButton', function() {
            let quantityElement = $(this).siblings('.quantityProduct');
            let currentQuantity = parseInt(quantityElement.text());
            let productId = $(this).data('id');

            if (currentQuantity > 1) {
                quantityElement.text(currentQuantity - 1);
                updateTotal();
            } else {
                let productName = $(this).data('produk-nama');
                if (confirm('Apakah Anda yakin ingin menghapus ' + productName + ' dari keranjang?')) {
                    $.ajax({
                        type: 'GET',
                        url: '/keranjang/delete/' + productId,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            $(quantityElement).closest('.foreach-produk').remove();
                            updateTotal();
                            alert('Berhasil dihapus');
                        },
                        error: function(xhr) {
                            console.error(xhr.responseText);
                            alert('Failed to delete product. Please try again.');
                        }
                    });
                }
            }
        });

        // Function to update the total amount
        function updateTotal() {
            let total = 0;

            $('.foreach-produk').each(function() {
                let quantity = parseInt($(this).find('.quantityProduct').text());
                let price = parseFloat($(this).find('.hargaProduk').data('harga-produk'));

                if (!isNaN(quantity) && !isNaN(price)) {
                    total += quantity * price;
                }
            });

            let formattedTotal = total.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' });
            $('.hargaTotal').text(formattedTotal);
        }

        // Initial update of total amount
        updateTotal();
    });


    $(document).on('click', '.deleteProductButton', function() {
        var productId = $(this).data('id');
        var productName = $(this).data('produk-nama');
        var button = $(this);

        if (confirm('Apakah Anda yakin ingin menghapus ' + productName + ' dari keranjang?')) {
            $.ajax({
                type: 'GET',
                url: '/keranjang/delete/' + productId,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    button.closest('.foreach-produk').remove();
                    alert('Berhasil dihapus');
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                    alert('Failed to delete product. Please try again.');
                }
            });
        }
    });

    document.getElementById('deleteAllProduct').addEventListener('click', function() {
        if (confirm('Apakah anda yakin ingin menghapus semuanya?')) {
            var form = document.getElementById('orderForm');
            form.action = "{{ route('clear-keranjang') }}";
            form.method = 'GET';
            form.submit();
        }
    });
</script>
@endpush
