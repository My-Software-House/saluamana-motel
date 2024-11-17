@extends('backend.layouts.template')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Daftar Amenities</h4>
          <a href="{{ route('backend.rooms-types.create') }}" class="btn btn-primary btn-md my-2">Tambah Tipe Kamar</a>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Gambar</th>
                  <th>Nama Tipe Kamar</th>
                  <th>Harga</th>
                  <th>Diskon</th>
                  <th>Jumlah Kamar</th>
                  <th>Amenity</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @if ($roomTypes->count() === 0)
                    <tr>
                        <td colspan="8">Belum ada tipe kamar</td>
                    </tr>
                @endif
                @foreach($roomTypes as $room)
                  <tr>
                    <td>#</td>
                    <td><img class="rounded-0" src="{{ asset('storage' . $room->main_image) }}" alt="" width="300px"></td>
                    <td>{{ $room->name }}</td>
                    <td>Rp. {{ $room->price }}</td>
                    <td>
                        <span class="badge badge-success font-weight-bold">{{ $room->discount }} %</span>
                    </td>
                    <td>{{ $room->number_of_room }}</td>
                    <td>
                        @foreach ($room->amenities()->get() as $amenity)
                            <span class="badge badge-light">
                                <i class="{{ $amenity->icon }} text-primary"></i> {{ $amenity->name }}
                            </span>
                        @endforeach
                    </td>

                    <td class="d-flex">
                        <a href="{{ route('backend.rooms-types.detail', ['id' => $room->id]) }}" class="btn btn-sm btn-info mr-2">Detail</a>
                        <a href="{{ route('backend.rooms-types.edit', ['id' => $room->id]) }}" class="btn btn-sm btn-info mr-2">Edit</a>
                        <a class="btn btn-sm btn-danger btn-sm">Hapus</a>
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
@endsection
