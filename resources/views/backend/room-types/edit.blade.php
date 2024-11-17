@extends('backend.layouts.template')

@section('content')
<div class="row">

    <div class="col-md-8 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Tipe Kamar</h4>
          <p class="card-description">
            Edit data tipe kamar
          </p>
          {!! Form::open(['url' => route('backend.rooms-types.update', ['id' => $roomType->id]), 'method' => 'POST', 'class' => 'forms-sample', 'files' => true]) !!}
            @csrf
            @method('PUT')
            <div class="form-group">
              {!! Form::label('name', 'Nama Tipe Kamar') !!}
              {!! Form::text('name', $roomType->name, ['class' => 'form-control', 'placeholder' => 'Nama Tipe Kamar']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('price', 'Harga') !!}
                {!! Form::number('price', $roomType->price, ['class' => 'form-control', 'placeholder' => 'Harga Tipe Kamear', 'min' => 0]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('capacity', 'Kapasitas Kamar') !!}
                {!! Form::number('capacity', $roomType->capacity, ['class' => 'form-control', 'placeholder' => 'Kapasitas', 'min' => 0]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('number_of_room', 'Jumlah Kamar Tersedia') !!}
                {!! Form::number('number_of_room', $roomType->number_of_room, ['class' => 'form-control', 'placeholder' => 'Kapasitas', 'min' => 0]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('size', 'Ukuran Ruangan') !!}
                {!! Form::number('size', $roomType->size, ['class' => 'form-control', 'placeholder' => 'Kapasitas', 'min' => 0]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('discount', 'Diskon') !!}
                {!! Form::number('discount', $roomType->discount, ['class' => 'form-control', 'placeholder' => 'Discount Kamar', 'min' => 0]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('description', 'Deskripsi Tipe Kamar') !!}
                <textarea class="form-control" name="description" id="myeditorinstance">{{ $roomType->description }}</textarea>
            </div>
            <div class="form-group">
                {!! Form::label('bed_type', 'Bed Type') !!}
                {!! Form::text('bed_type',$roomType->bed_type, ['class' => 'form-control', 'placeholder' => 'Bed Type']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('view', 'View') !!}
                {!! Form::text('view', $roomType->view, ['class' => 'form-control', 'placeholder' => 'View']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('main_image', 'Gambar Utama') !!}<br>
                <img src="{{ asset('storage' . $roomType->main_image) }}" alt="" width="200px">
                {!! Form::file('main_image', ['class' => 'form-control']) !!}
            </div>
            <button type="submit" class="btn btn-primary mr-2">Edit</button>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
@endsection
