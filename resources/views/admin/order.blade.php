@extends('admin.layout')
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="">Daftar Pesanan</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped w-100" id="tablepesanan">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Total Item</th>
                                <th>Total Harga</th>
                                <th>Bukti Pembayaran</th>
                                <th>Status</th>
                                <th>Opsi</th>
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
        let table = $('#tablepesanan').DataTable({
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
                    data: "nama",
                },

                {
                    data: null,
                    render: function (data, row, type, meta) {
                        a = '<span>' + data.order_item.length + '</span>'
                        return a;
                    }
                },
                {
                    data: "total_bayar",
                    render: function (data, type, row, meta) {
                        if (type === 'display') {
                            // Mengubah data menjadi format mata uang dengan simbol IDR
                            return "Rp " + parseInt(data).toLocaleString('id-ID', {
                                minimumFractionDigits: 0
                            });
                        } else {
                            // Untuk tipe data lain, kembalikan data aslinya
                            return data;
                        }
                    }
                },
                {
                    data: "bukti_bayar",
                    render: function (data) {
                        a = '';
                        if (data.length > 0) { // Periksa apakah data tidak null dan memiliki elemen
                            a += '<a href="/storage/image/' + data + '" target="_blank"><img src="/storage/image/' + data + '" style="width: 100px; height: 100px; box-shadow: rgba(0, 0, 0, 0.16) 0px 2px 2px; margin: 5px; padding: 0.25rem; border: 1px solid #dee2e6;"></a>';
                        }else{
                            a += '-'
                        }

                        return a;
                    },
                },
              
                {
                    data: "status",
                    render: function (data, type, row, meta) {
                        if (data == "pending") {
                            badge = `<span class="badge badge-primary">PENDING</span>`
                        } else {
                            badge = `<span class="badge badge-success">SUCCESS</span>`
                        }
                        return badge;
                    }
                },

                {
                    data: null,
                    render: function (data) {
                        var verifUrl = '/admin/verif-order/' + data.id;
                        var detailUrl = '/admin/detail-order/' + data.id;
                        return `
                        <form action="${verifUrl}" method="POST" onsubmit="return confirm('Apakah anda yakin akan memverifikasi data ini ?');">
                            <span><a class="btn btn-dark" href="${detailUrl}">Detail</a></span>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="PUT">
                            <button class="btn btn-success" type="submit">Verifikasi</button>
                        </form>
                    `;
                    },
                },
            ],
        });

       
    });

</script>

@endsection
