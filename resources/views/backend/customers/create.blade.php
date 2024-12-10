@extends('backend.layouts.template')

@section('content')
  <div class="row">

    <div class="col-md-8 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Tambah Customer / Tamu</h4>
          <div class="d-flex justify-content-between align-items-center">
             <p class="card-description">Tambah data customer / tamu</p>
          <a href="{{ route('backend.schedules.create') }}" class="btn btn-primary btn-sm">Tambah Jadwal Booking</a>
          </div>

          {!! Form::open(['url' => route('backend.customers.store'), 'method' => 'POST', 'class' => 'forms-sample']) !!}
            @csrf
            <div class="form-group">
              {!! Form::label('name', 'Nama Tamu / Customer') !!}
              {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Nama Customer']) !!}
            </div>
            <div class="form-group">
              {!! Form::label('phone', 'Nomer HP / Whatsapp') !!}
              {!! Form::text('phone', old('phone'), ['class' => 'form-control', 'placeholder' => 'Nomer Telephone']) !!}
            </div>
             <div class="form-group">
              {!! Form::label('email', 'Email (optional)') !!}
              {!! Form::text('email', old('email'), ['class' => 'form-control', 'placeholder' => 'Email customer']) !!}
            </div>
            <button type="submit" class="btn btn-primary mr-2">Tambah</button>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
@endsection
