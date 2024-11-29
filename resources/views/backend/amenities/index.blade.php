@extends('backend.layouts.template')

@section('content')
  <div class="row">
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Daftar Amenities</h4>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Fasilitas</th>
                  <th>Icon</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($amenities as $amenity)
                  <tr>
                    <td>#</td>
                    <td>{{ $amenity->name }}</td>
                    <td>{{ $amenity->icon }}</td>
                    <td class="d-flex">
                      {{-- <form method="POST" action="{{ route('backend.amenities-types.delete', ['id' => $amenity->id ]) }}" onsubmit="return confirm('Yakin ingin menghapus data?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                      </form> --}}
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Amenities</h4>
          <p class="card-description">
            Tambah Fasilitas
          </p>
          <form class="forms-sample" method="POSt" action="{{ route('backend.amenities.store') }}">
            @csrf
            <div class="form-group">
              <label for="name">Nama</label>
              <input type="text" class="form-control" name="name" id="name" placeholder="Nama Amenity">
            </div>
            <div class="form-group">
              <label for="icon">Icon</label>
              <p id="icon" class="card-description">Icon class menggunakan <strong>fontawesome v6.5.1</strong> , dokumentasi icon class dapat dilihat <a target="_blank" href="https://fontawesome.com/search">disini</a>.</p>
              <input type="text" class="form-control" name="icon" id="name" placeholder="Icon">
            </div>
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
