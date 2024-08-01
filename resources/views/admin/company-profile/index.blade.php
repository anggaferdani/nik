@extends('admin.layout')
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="w-100">Company Profile</h4>
                    
                </div>
                <div class="card-body">
                    <table class="table table-striped w-100" id="kategori">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Description</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($companyProfiles->take(1) as $companyProfile)
                            <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $companyProfile->description }}</td>
                              <td>
                                <button type="button" class="btn btn-icon btn-primary" data-toggle="modal" data-target="#editModal{{ $companyProfile->id }}"><i class="fa-solid fa-pen"></i></button>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@foreach ($companyProfiles as $companyProfile)
<div class="modal fade" id="editModal{{ $companyProfile->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('company-profile.update', $companyProfile->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label required">Title</label>
            <input type="text" class="form-control" name="title" placeholder="Title" value="{{ $companyProfile->title }}">
            <div class="text-muted small">*column ini akan ditampilkan pada bagian title di index</div>
            @error('title')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label class="form-label required">Subtitle</label>
            <input type="text" class="form-control" name="subtitle" placeholder="Subtitle" value="{{ $companyProfile->subtitle }}">
            <div class="text-muted small">*column ini akan ditampilkan pada bagian subtitle di index</div>
            @error('subtitle')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label class="form-label required">Sub Subtitle</label>
            <input type="text" class="form-control" name="subsubtitle" placeholder="Sub Subtitle" value="{{ $companyProfile->subsubtitle }}">
            <div class="text-muted small">*column ini akan ditampilkan pada bagian subsubtitle di index</div>
            @error('subsubtitle')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label class="form-label required">Description</label>
            <textarea class="form-control" name="description" rows="6" placeholder="Description">{{ $companyProfile->description }}</textarea>
            <div class="text-muted small">*column ini akan ditampilkan pada bagian description</div>
            @error('description')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label class="form-label required">Title Layanan</label>
            <input type="text" class="form-control" name="title_layanan" placeholder="Title Layanan" value="{{ $companyProfile->title_layanan }}">
            <div class="text-muted small">*column ini akan ditampilkan pada bagian title di layanan kami</div>
            @error('title_layanan')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label class="form-label required">Description Layanan</label>
            <textarea class="form-control" name="description_layanan" rows="6" placeholder="Description Layanan">{{ $companyProfile->description_layanan }}</textarea>
            <div class="text-muted small">*column ini akan ditampilkan pada bagian di layanan kami</div>
            @error('description_layanan')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label class="form-label required">Visi</label>
            <textarea class="form-control" name="visi" rows="6" placeholder="Visi">{{ $companyProfile->visi }}</textarea>
            <div class="text-muted small">*column ini akan ditampilkan pada bagian visi</div>
            @error('Visi')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label class="form-label required">Misi 1</label>
            <input type="text" class="form-control" name="misi1" placeholder="Misi 1" value="{{ $companyProfile->misi1 }}">
            <div class="text-muted small">*column ini akan ditampilkan pada bagian misi1 di index</div>
            @error('misi1')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label class="form-label required">Misi 2</label>
            <input type="text" class="form-control" name="misi2" placeholder="Misi 2" value="{{ $companyProfile->misi2 }}">
            <div class="text-muted small">*column ini akan ditampilkan pada bagian misi2 di index</div>
            @error('misi2')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label class="form-label required">Misi 3</label>
            <input type="text" class="form-control" name="misi3" placeholder="Misi 3" value="{{ $companyProfile->misi3 }}">
            <div class="text-muted small">*column ini akan ditampilkan pada bagian misi3 di index</div>
            @error('misi3')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label class="form-label required">Misi 4</label>
            <input type="text" class="form-control" name="misi4" placeholder="Misi 4" value="{{ $companyProfile->misi4 }}">
            <div class="text-muted small">*column ini akan ditampilkan pada bagian misi4 di index</div>
            @error('misi4')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label class="form-label required">Misi 5</label>
            <input type="text" class="form-control" name="misi5" placeholder="Misi 5" value="{{ $companyProfile->misi5 }}">
            <div class="text-muted small">*column ini akan ditampilkan pada bagian misi5 di index</div>
            @error('misi5')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label class="form-label required">Address</label>
            <textarea class="form-control" name="address" rows="6" placeholder="Address">{{ $companyProfile->address }}</textarea>
            <div class="text-muted small">*column ini akan ditampilkan pada bagian address</div>
            @error('address')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label class="form-label required">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Email" value="{{ $companyProfile->email }}">
            <div class="text-muted small">*column ini akan ditampilkan pada bagian email di index</div>
            @error('email')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label class="form-label required">Email 2</label>
            <input type="email" class="form-control" name="email2" placeholder="Email 2" value="{{ $companyProfile->email2 }}">
            <div class="text-muted small">*column ini akan ditampilkan pada bagian email2 di index</div>
            @error('email2')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label class="form-label required">WA</label>
            <input type="email" class="form-control" name="wa" placeholder="WA" value="{{ $companyProfile->wa }}">
            <div class="text-muted small">*column ini akan ditampilkan pada bagian wa di index</div>
            @error('wa')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label class="form-label">Link Instagram</label>
            <input type="text" class="form-control" name="instagram" placeholder="Instagram" value="{{ $companyProfile->instagram }}">
            <div class="text-muted small">*column ini akan digunakan untuk meredirect ke akun instagram company</div>
            @error('instagram')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label class="form-label">Link Facebook</label>
            <input type="text" class="form-control" name="facebook" placeholder="Facebook" value="{{ $companyProfile->facebook }}">
            <div class="text-muted small">*column ini akan digunakan untuk meredirect ke akun facebook company</div>
            @error('facebook')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="">
            <label class="form-label">Link Tokopedia</label>
            <input type="text" class="form-control" name="tokopedia" placeholder="Tokopedia" value="{{ $companyProfile->tokopedia }}">
            <div class="text-muted small">*column ini akan digunakan untuk meredirect ke akun tokopedia company</div>
            @error('tokopedia')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="">
            <label class="form-label">Link LinkedIn</label>
            <input type="text" class="form-control" name="linkedin" placeholder="LinkedIn" value="{{ $companyProfile->linkedin }}">
            <div class="text-muted small">*column ini akan digunakan untuk meredirect ke akun linkedin company</div>
            @error('linkedin')<div class="text-danger">{{ $message }}</div>@enderror
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
