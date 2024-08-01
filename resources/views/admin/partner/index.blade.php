@extends('admin.layout')
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="w-100">Partner</h4>
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
                                <th>File</th>
                                <th>Partner</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($partners as $partner)
                            <tr>
                              <td>{{ ($partners->currentPage() - 1) * $partners->perPage() + $loop->iteration }}</td>
                              <td><img src="/partner/logo/{{ $partner->logo }}" class="img-fluid" width="100" alt=""></td>
                              <td>{{ $partner->partner }}</td>
                              <td>
                                <form action="{{ route('admin.partner.destroy', $partner->id) }}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button type="button" class="btn btn-icon btn-primary" data-toggle="modal" data-target="#editModal{{ $partner->id }}"><i class="fa-solid fa-pen"></i></button>
                                  <button type="button" class="btn btn-danger delete"><i class="fas fa-trash"></i></button>
                                </form>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                    <div class="float-right">
                      {{ $partners->appends(request()->query())->links('pagination::bootstrap-4') }}
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
      <form action="{{ route('admin.partner.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label required">Logo</label>
            <input type="file" class="form-control" name="logo" placeholder="Logo">
            @error('logo')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label class="form-label required">Partner</label>
            <input type="text" class="form-control" name="partner" placeholder="Partner">
            @error('partner')<div class="text-danger">{{ $message }}</div>@enderror
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

@foreach ($partners as $partner)
<div class="modal fade" id="editModal{{ $partner->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('admin.partner.update', $partner->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label required">Logo</label>
            <input type="file" class="form-control" name="logo" placeholder="Logo" value="{{ $partner->logo }}">
            <a href="/partner/logo/{{ $partner->logo }}" target="_blank">{{ $partner->logo }}</a>
            @error('logo')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label class="form-label required">Partner</label>
            <input type="text" class="form-control" name="partner" placeholder="Partner" value="{{ $partner->partner }}">
            @error('partner')<div class="text-danger">{{ $message }}</div>@enderror
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
