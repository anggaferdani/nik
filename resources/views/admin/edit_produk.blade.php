@extends('admin.layout')
@section('content')
<style>
    .image-container {
        position: relative;
        display: inline-block;
    }

    .btn-delete {
        position: absolute;
        top: 1px;
        right: 1px;
        background-color: rgba(0, 0, 0, .5);
        /* Ganti warna sesuai kebutuhan */
        color: white;
        border: none;
        padding: 5px 10px;
        border-radius: 5px;
        cursor: pointer;
    }

</style>
<div class="section-body">
    <form action="/admin/update-produk/{{$data->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-header">
                <h4>Edit Produk</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Kategori Produk:</label>
                    <select class="form-control select2" name="kategori_produk_id" id="kategoris" required>
                        @foreach ($kategori as $item)
                        <option value="{{ $item->id }}" {{ $item->id == $data->kategori_produk_id ? 'selected' : '' }}>
                            {{ $item->kategori }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" value="{{ $data->nama }}" name="nama" required>
                </div>
                <div class="form-group">
                    <label>Harga </label>
                    <input type="text" class="form-control" value="{{ $data->harga }}" name="harga" required
                        onkeyup="formatNumber(this)">
                </div>
                <div class="form-group">
                    <label>Keterangan</label>
                    <textarea class="summernote-simple" name="deskripsi" required>{{$data->deskripsi}}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Gambar Detail Produk:</label>
                    <br>
                    @foreach ($gambar as $item)
                    <div class="image-container">
                        <img class="ms-auto" src="{{ asset('storage/image/'.$item->gambar) }}"
                            style="width:150px; height:150px; box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px; margin-left: 10px; margin-bottom:10px;">
                        <div class="btn-delete" id="deletegambar" data-image-id="{{ $item->id }}">X</div>
                    </div>

                    @endforeach

                </div>
                <div class="form-group gambar">
                    <label>Ganti Gambar Detail Produk <small>(bisa pilih lebih dari satu gambar)</small></label>
                    <br>
                    <div class="input-images"></div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit">Simpan</button>
                </div>
            </div>
        </div>

    </form>
</div>
</div>
<script>
    $('.input-images').imageUploader({
        imagesInputName: 'gambar',
        maxSize: 2 * 1024 * 1024,

    });
    $('#deletegambar').on('click', function (e) {
        e.preventDefault();
        let id = $(this).data('image-id');
        let elementToRemove = $(this).closest('.image-container');
        $.ajax({
            method: 'post',
            url: '/admin/delete-gambar-produk/' + id,
            data: {
                _method: 'delete',
            },
            success: function (res) {
                elementToRemove.remove();
                iziToast.success({
                    title: 'Notifikasi',
                    message: res.success,
                    position: 'topRight'
                });
            },
            error: function (res) {
                iziToast.error({
                    title: 'Ada Kesalahan',
                    message: res.responseJSON.error,
                    position: 'topRight'
                });
            }
        });
    });

   

    function formatNumber(input) {
        // Menghilangkan karakter selain angka
        var num = input.value.replace(/[^0-9]/g, '');

        // Memformat angka menjadi format ribuan dan desimal
        var formattedNum = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        }).format(num);

        // Memasukkan nilai format ke dalam input
        input.value = formattedNum;
    }

</script>
@endsection
