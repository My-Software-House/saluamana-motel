@extends('backend.layouts.template')


@section('content')
  <div class="row">
    <div class="col-md-7">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Daftar Kamar</h4>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nomer Kamar</th>
                  <th>Nama Tipe Kamar</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @if ($rooms->count() === 0)
                    <tr>
                        <td colspan="8">Belum ada Kamar</td>
                    </tr>
                @endif
                @foreach($rooms as $room)
                  <tr>
                    <td>#</td>
                    <td>{{ $room->name }}</td>
                    <td>{{ $room->roomType->name }}</td>
                    <td class="d-flex">
                        <a href="{{ route('backend.rooms-types.detail', ['id' => $room->id]) }}" class="btn btn-sm btn-info mr-2">Detail</a>
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
    <div class="col-md-5">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Tambah Kamar</h4>
          {!! Form::open(['url' => route('backend.rooms.store'), 'method' => 'POST', 'class' => 'forms-sample', 'files' => true]) !!}
            @csrf
            <div class="form-group">
              {!! Form::label('name', 'Nama / Nomor Kamar') !!}
              {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Nama Tipe Kamar']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('room_type_id', 'Tipe Kamar') !!}
                {!! Form::select('room_type_id', $roomTypes, old('room_type_id'), ['class' => 'form-control', 'placeholder' => '-- Pilih Tipe Kamar --', 'min' => 0]) !!}
            </div>

            <button type="submit" class="btn btn-primary mr-2">Tambah</button>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
@endsection
