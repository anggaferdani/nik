<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SAT Station | Create Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('../Css/Frontend/createorder.css')}}">
    <link rel="stylesheet" href="{{asset('../Css/Frontend/global.css')}}">
</head>

<body>

    <div class="container">
        <a href="{{ URL::previous() }}" class="button-kembali d-flex align-items-center gap-2 text-white my-3" style="text-decoration: none;">
            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256"><path fill="white" d="M224 128a8 8 0 0 1-8 8H59.31l58.35 58.34a8 8 0 0 1-11.32 11.32l-72-72a8 8 0 0 1 0-11.32l72-72a8 8 0 0 1 11.32 11.32L59.31 120H216a8 8 0 0 1 8 8" /></svg>
            <span>kembali</span>
        </a>
        <form action="/submit-order" method="post" enctype="multipart/form-data" onsubmit="return confirm('Apakah data anda sudah lengkap?');">
        @csrf

        @foreach ($data as $item)

        <div class="row my-3">
            <div class="col-xl-2 col-lg-3 col-sm-4 col-12 mb-sm-0 mb-3">
                <div class="border-order p-4 text-white">
                    <div class="gambar-layanan d-flex align-items-center justify-content-center">
                        <div class="text-center">
                            <div class="d-flex justify-content-center">
                                <img class="blur-bottom w-50" src="{{ asset('storage/image/'.$item->produk->gambarproduk[0]->gambar) }}"
                                alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-10 col-lg-9 col-sm-8 col-12">
                <div class="row">
                    <div class="col-6">
                        <label class="text-white">Nama Produk</label>
                        <div class="form-order my-3">
                            <div class="input-group">
                                <input type="text" class="form-control"  value="{{$item->produk->nama}}" readonly aria-label="Alamat Email Kamu"
                                    required aria-describedby="button-addon2">
                                <input type="hidden" class="form-control" name="produk_id[]"  value="{{$item->produk_id}}" readonly aria-label="Alamat Email Kamu"
                                    required aria-describedby="button-addon2">
                            </div>
                        </div>
                        <label class="text-white">Harga Produk</label>
                        <div class="form-order my-3">
                            <div class="input-group">
                                <input type="text" class="form-control"  value="{{$item->produk->harga}}" readonly aria-label="Alamat Email Kamu"
                                    required aria-describedby="button-addon2">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <label class="text-white">Qty</label>
                        <div class="form-order my-3">
                            <div class="input-group">
                                <input type="number" class="form-control" placeholder="Quantity" value="{{$item->qty}}" readonly aria-label="Alamat Email Kamu"
                                    required aria-describedby="button-addon2">
                            </div>
                        </div>
                        <label class="text-white">Total Harga</label>
                        <div class="form-order my-3">
                            <div class="input-group">
                                <?php
                                    $qty_x_harga = $item->qty * $item->produk->harga
                                    ?>
                                <input type="text" class="form-control" placeholder="Total" aria-label="Alamat Email Kamu"
                                    readonly value="{{$qty_x_harga}}" required aria-describedby="button-addon2">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        <div class="row">

            <div class="col-12">
                <label class="text-white">Nama Pemesan</label>

                <div class="form-order my-3">
                    <div class="input-group">
                        <input type="text" class="form-control" name="nama_pemesan" placeholder="Nama" value="{{Auth::user()->name}}" aria-label="Alamat Email Kamu"
                            required>
                    </div>
                </div>
                <label class="text-white">No Telephone Aktif</label>

                <div class="form-order my-3">
                    <div class="input-group">
                        <input type="number" class="form-control" name="no_telp"  placeholder="No Telephone Aktif"
                            aria-label="Alamat Email Kamu" required>
                    </div>
                </div>
                <label class="text-white">Total Bayar</label>
                <div class="form-order my-3">
                    <div class="input-group">
                        <input type="text" class="form-control" name="total_bayar" value="{{number_format($totalHarga,0,',','.')}}" placeholder="Total Bayar" aria-label="Alamat Email Kamu"
                            readonly required aria-describedby="button-addon2">
                    </div>
                </div>
                <label class="text-white ">Alamat Pemesanan (isi dengan detail)</label>

                <div class="form-order my-3">
                    <textarea type="text" name="alamat" class=" form-control" name="alamat" placeholder="Ketik alamat pemesanan" required
                        aria-label="Ketik alamat pemesanan" aria-describedby="button-addon2"></textarea>
                </div>
                <div class="my-3">
                    <label for="formFile" class="form-label">Upload bukti pembayaran</label>
                    <div class="form-order d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center" id="profile-icon">
                            <div id="preview"></div>
                        </div>
                        <div class="custom-file-input">
                            <input type="file" class="form-control" accept=".jpg, .png, .jpeg" name="gambar" required id="gambar">
                            <label for="gambar" class="file-label">Choose file!</label>
                            <span class="file-name" id="fileName">No file chosen</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-danger d-block ms-auto">Buat Pesanan</button>
        </form>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

<script>
     function previewImages() {
        var preview = document.querySelector('#preview');

        // Hapus semua elemen child di dalam elemen #preview
        while (preview.firstChild) {
            preview.removeChild(preview.firstChild);
        }

        if (this.files) {
            [].forEach.call(this.files, readAndPreview);
        }

        function readAndPreview(file) {
            if (!/\.(jpe?g|png)$/i.test(file.name)) {
                alert(file.name + " format tidak sesuai");
                document.querySelector('#gambar').value = '';
                return;
            }
            var reader = new FileReader();
            reader.addEventListener("load", function () {
                var image = new Image();
                image.width = 200;
                image.title = file.name;
                image.src = this.result;
                preview.appendChild(image);
            }, false);
            reader.readAsDataURL(file);
        }
    }
    document.querySelector('#gambar').addEventListener("change", previewImages);
</script>
</body>

</html>
