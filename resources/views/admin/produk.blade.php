@extends('admin.layout')
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="w-100">Daftar Produk</h4>
                    <button type="button" class="btn btn-success" data-toggle="modal"
                        data-target="#kategoriprodukmodal">
                        <span class="text">+ Tambah</span>
                    </button>
                </div>
                <div class="card-body">
                    <table class="table table-striped w-100" id="kategori">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#kategori').DataTable({
            // responsive: true,
            processing: true,
            ordering: false,
            serverSide: true,
            ajax: {
                url: '{{ url()->current() }}',
            },
            columns: [{
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    },
                },
                {
                    data: 'gambarproduk',
                    render: function (data) {
                        a = '';
                        if (data.length >
                            0) { // Periksa apakah data tidak null dan memiliki elemen
                            a += '<img src="/storage/image/' + data[0].gambar +
                                '" style="width: 100px; height:100px; box-shadow: rgba(0, 0, 0, 0.16) 0px 2px 2px; margin:5px; padding:0.25rem; border:1px solid #dee2e6; ">';
                        } else {
                            a += '-'
                        }

                        return a;
                    },
                },
                {
                    data: "nama",
                },
                {
                    data: "harga",
                    render: function(data, type, row, meta) {
                            if (type === 'display') {
                                // Mengubah data menjadi format mata uang dengan simbol IDR
                                return "Rp " + parseInt(data).toLocaleString('id-ID', {
                                    minimumFractionDigits: 0
                                });
                            }
                            return data;
                        }
                },
                {
                    data: null,
                    render: function (data) {
                        var deleteUrl = '/admin/delete-produk/' + data.id;
                        var editUrl = '/admin/edit-produk/' + data.id;
                        return `
                    <form action="${deleteUrl}" method="POST" onsubmit="return confirm('Apakah anda yakin akan menghapus produk ini?');">
                        <span><a class="btn btn-primary" href="${editUrl}"><i class="far fa-edit"></i>Edit</a></span>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="PUT">
                        <button class="btn btn-danger" type="submit"><i class="far fa-trash-alt"></i> Hapus</button>
                    </form>
                    `;
                    },
                },
            ],
        });
    });

</script>
@endsection
@section('modal')
<!-- Modal -->
<div class="modal fade" id="kategoriprodukmodal" tabindex="-1" role="dialog" aria-labelledby="kategoriProdukLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="kategoriProdukLabel">Form Input Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/admin/submit-produk" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kategori <span style="color: red">*</span></label>
                        <select class="form-control selectric" id="tokos" name="kategori_id" required>
                            <option selected disabled>-- Pilih Kategori --</option>
                            @foreach ($kategori as $item)
                            <option value="{{ $item->id }}">{{ $item->kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama <span style="color: red">*</span></label>
                        <input type="text" class="form-control" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label>Harga <span style="color: red">*</span></label>
                        <input type="text" class="form-control" name="harga" onkeyup="formatNumber(this)" required>
                    </div>
                    <div class="form-group">
                        <label>Keterangan <span style="color: red">*</span></label>
                        <textarea class="summernote-simple" name="deskripsi" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Gambar</small><span
                                style="color: red">*</span></label>
                        <div class="input-images"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $('.input-images').imageUploader({
        imagesInputName: 'gambar',
        maxSize: 2 * 1024 * 1024,
        maxFiles: 1

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
