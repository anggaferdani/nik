@extends('admin.layout')
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="w-100">Daftar Kategori Produk</h4>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#kategoriprodukmodal">
                        <span class="text">+ Tambah</span>
                    </button>
                </div>
                <div class="card-body">
                            <table class="table table-striped w-100" id="kategori">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kategori</th>
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
                    data: "kategori",
                },
                {
                data: null,
                render: function (data) {
                    var deleteUrl = '/admin/delete-kategori-produk/' + data.id;
                    var editUrl = '/admin/edit-kategori-produk/' + data.id;
                    return `
                    <form action="${deleteUrl}" method="POST" onsubmit="return confirm('Apakah anda yakin akan menghapus kategori ini ? jika ya maka semua produk yang ada di kategori ini akan terhapus');">
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
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="kategoriProdukLabel">Form Input Kategori Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/admin/submit-kategori-produk" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kategori <span style="color: red">*</span></label>
                        <input type="text" class="form-control" name="kategori" required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
