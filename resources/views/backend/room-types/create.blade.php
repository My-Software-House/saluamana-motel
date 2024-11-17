@extends('backend.layouts.template')

@section('content')
  <div class="row">

    <div class="col-md-8 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Tipe Kamar</h4>
          <p class="card-description">
            Tambah data tipe kamar
          </p>
          {!! Form::open(['url' => route('backend.rooms-types.store'), 'method' => 'POST', 'class' => 'forms-sample', 'files' => true]) !!}
            @csrf
            <div class="form-group">
              {!! Form::label('name', 'Nama Tipe Kamar') !!}
              {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Nama Tipe Kamar']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('price', 'Harga') !!}
                {!! Form::number('price', old('price'), ['class' => 'form-control', 'placeholder' => 'Harga Tipe Kamear', 'min' => 0]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('capacity', 'Kapasitas Kamar') !!}
                {!! Form::number('capacity', old('capacity'), ['class' => 'form-control', 'placeholder' => 'Kapasitas', 'min' => 0]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('number_of_room', 'Jumlah Kamar Tersedia') !!}
                {!! Form::number('number_of_room', old('number_of_room'), ['class' => 'form-control', 'placeholder' => 'Kapasitas', 'min' => 0]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('size', 'Ukuran Ruangan') !!}
                {!! Form::number('size', old('size'), ['class' => 'form-control', 'placeholder' => 'Kapasitas', 'min' => 0]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('discount', 'Diskon') !!}
                {!! Form::number('discount', old('discount'), ['class' => 'form-control', 'placeholder' => 'Discount Kamar', 'min' => 0]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('description', 'Deskripsi Tipe Kamar') !!}
                <textarea class="form-control" name="description" id="myeditorinstance">{{ old('description') }}</textarea>
            </div>
            <div class="form-group">
                {!! Form::label('bed_type', 'Bed Type') !!}
                {!! Form::text('bed_type', old('bed_type'), ['class' => 'form-control', 'placeholder' => 'Bed Type']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('view', 'View') !!}
                {!! Form::text('view', old('view'), ['class' => 'form-control', 'placeholder' => 'View']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('main_image', 'Gambar Utama') !!}
                {!! Form::file('main_image', ['class' => 'form-control']) !!}
            </div>
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
@endsection
