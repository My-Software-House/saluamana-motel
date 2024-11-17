@extends('backend.layouts.template')

@section('content')
  <div class="row">

    <div class="col-md-8 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Fasilitas Kamar</h4>
          <p class="card-description">
            Tambah Fasilitas
          </p>
          {!! Form::open(['url' => route('backend.rooms-types.store-amenity', ['id' => $roomType->id]), 'method' => 'PUT', 'class' => 'forms-sample', 'files' => true]) !!}
            @csrf
            <div class="form-group">
                <label for="amenity_id">Fasilitas</label>
                <select name="amenity_id" class="form-control form-control-sm" id="amenity_id">
                    <option value="">-- Pilih Fasilitas --</option>
                    @foreach ($amenities as $amenity)
                        <option value="{{ $amenity->id }}">{{ $amenity->name }}</option>
                    @endforeach
                </select>

            </div>

            <div class="form-group">
                <label for="amenity_type">Tipe Fasilitas</label>
                <select name="amenity_type" class="form-control form-control-sm" id="amenity_type">
                    <option value="">-- Pilih Tipe Fasilitas --</option>
                    <option value="Utama">Fasilitas Utama</option>
                    <option value="Kamar">Fasilitas Kamar</option>
                    <option value="Kamar Mandi">Fasilitas Kamar Mandi</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary mr-2">Tambah</button>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
@endsection
