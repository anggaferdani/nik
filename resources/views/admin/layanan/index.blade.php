@extends('admin.layout')
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="w-100">Layanan Kami</h4>
                    {{-- <button type="button" class="btn btn-success" data-toggle="modal"
                        data-target="#createModal">
                        <span class="text">+ Tambah</span>
                    </button> --}}
                </div>
                <div class="card-body">
                    <table class="table table-striped w-100" id="kategori">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>File</th>
                                <th>Title</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($layanans as $layanan)
                            <tr>
                              <td>{{ ($layanans->currentPage() - 1) * $layanans->perPage() + $loop->iteration }}</td>
                              <td><img src="/layanan/file/{{ $layanan->file }}" class="img-fluid" width="100" alt=""></td>
                              <td>{{ $layanan->title }}</td>
                              <td>
                                <form action="{{ route('admin.layanan.destroy', $layanan->id) }}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button type="button" class="btn btn-icon btn-primary" data-toggle="modal" data-target="#editModal{{ $layanan->id }}"><i class="fa-solid fa-pen"></i></button>
                                  <button type="button" class="btn btn-danger delete"><i class="fas fa-trash"></i></button>
                                </form>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                    <div class="float-right">
                      {{ $layanans->appends(request()->query())->links('pagination::bootstrap-4') }}
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
      <form action="{{ route('admin.layanan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label required">File</label>
            <input type="file" class="form-control" name="file" placeholder="File">
            @error('file')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label class="form-label required">Title</label>
            <input type="text" class="form-control" name="title" placeholder="Title">
            @error('title')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label class="form-label required">Description</label>
            <textarea class="form-control" name="description" rows="6" placeholder="Description"></textarea>
            @error('description')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label class="form-label required">Category</label>
            <input type="text" class="form-control" name="category" placeholder="Category">
            @error('category')<div class="text-danger">{{ $message }}</div>@enderror
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

@foreach ($layanans as $layanan)
<div class="modal fade" id="editModal{{ $layanan->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('admin.layanan.update', $layanan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label required">File</label>
            <input type="file" class="form-control" name="file" placeholder="File" value="{{ $layanan->file }}">
            <a href="/layanan/file/{{ $layanan->file }}" target="_blank">{{ $layanan->file }}</a>
            @error('file')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label class="form-label required">Title</label>
            <input type="text" class="form-control" name="title" placeholder="Title" value="{{ $layanan->title }}">
            @error('title')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label class="form-label required">Description</label>
            <textarea class="form-control" name="description" rows="6" placeholder="Description">{{ $layanan->description }}</textarea>
            @error('description')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label class="form-label required">Category</label>
            <input type="text" class="form-control" name="category" placeholder="Category" value="{{ $layanan->category }}">
            @error('category')<div class="text-danger">{{ $message }}</div>@enderror
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
@endforeach
@endsection
