@extends('admin.layout')
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="w-100">Produk</h4>
                    <button type="button" class="btn btn-success" data-toggle="modal"
                        data-target="#createModal">
                        <span class="text">+ Tambah</span>
                    </button>
                </div>
                <div class="card-body">
                    <table class="table table-striped w-100" id="kategori">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kategori</th>
                                <th>Name</th>
                                <th>Harga</th>
                                <th>File</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($produks as $produk)
                            <tr>
                              <td>{{ ($produks->currentPage() - 1) * $produks->perPage() + $loop->iteration }}</td>
                              <td>{{ $produk->nama }}</td>
                              <td>{{ $produk->kategori_produk->kategori }}</td>
                              <td>Rp. {{ number_format($produk->harga, 0, ',', '.') }}</td>
                              <td><img src="/produk/file/{{ $produk->file }}" class="img-fluid" width="100" alt=""></td>
                              <td>
                                <form action="{{ route('admin.produk.destroy', $produk->id) }}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button type="button" class="btn btn-icon btn-primary" data-toggle="modal" data-target="#editModal{{ $produk->id }}"><i class="fa-solid fa-pen"></i></button>
                                  <button type="button" class="btn btn-danger delete"><i class="fas fa-trash"></i></button>
                                </form>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                    <div class="float-right">
                      {{ $produks->appends(request()->query())->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Create</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('admin.produk.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Kategori</label>
            <select class="form-control" name="kategori_produk_id">
              <option value="" selected disabled>Select</option>
              @foreach ($kategoris as $kategori)
                <option value="{{ $kategori->id }}">{{ $kategori->kategori }}</option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label required">File</label>
            <input type="file" class="form-control" name="file" placeholder="File">
            @error('file')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label class="form-label required">Nama</label>
            <input type="text" class="form-control" name="nama" placeholder="Nama">
            @error('nama')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label class="form-label required">Deskripsi</label>
            <textarea class="form-control" name="deskripsi" rows="6" placeholder="Deskripsi"></textarea>
            @error('deskripsi')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label class="form-label required">Harga</label>
            <input type="text" class="form-control" name="harga" placeholder="Harga" onkeyup="formatNumber(this)">
            @error('harga')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

@foreach ($produks as $produk)
<div class="modal fade" id="editModal{{ $produk->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('admin.produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Kategori</label>
            <select class="form-control" name="kategori_produk_id">
              <option value="" selected disabled>Select</option>
              @foreach ($kategoris as $kategori)
                <option value="{{ $kategori->id }}" @if($kategori->id == $produk->kategori_produk_id) @selected(true) @endif>{{ $kategori->kategori }}</option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label required">File</label>
            <input type="file" class="form-control" name="file" placeholder="File" value="{{ $produk->file }}">
            <a href="/produk/file/{{ $produk->file }}" target="_blank">{{ $produk->file }}</a>
            @error('file')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label class="form-label required">Nama</label>
            <input type="text" class="form-control" name="nama" placeholder="Nama" value="{{ $produk->nama }}">
            @error('nama')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label class="form-label required">Deskripsi</label>
            <textarea class="form-control" name="deskripsi" rows="6" placeholder="Deskripsi">{{ $produk->deskripsi }}</textarea>
            @error('deskripsi')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label class="form-label required">Harga</label>
            <input type="text" class="form-control" name="harga" placeholder="Harga" value="{{ $produk->harga }}" onkeyup="formatNumber(this)">
            @error('harga')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
        </div>
        <div class="modal-footer">
          <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
            Cancel
          </a>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endforeach
@endsection
