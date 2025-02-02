@extends('backend.layouts.template')

@section('content')
  <div class="row">

    <div class="col-md-8 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Edit Customer / Tamu</h4>
          <div class="d-flex justify-content-between align-items-center">
             <p class="card-description">Edit data customer / tamu</p>
          <a href="{{ route('backend.schedules.create') }}" class="btn btn-primary btn-sm">Tambah Jadwal Booking</a>
          </div>

          {!! Form::open(['url' => route('backend.customers.update', ['id' => $customer->id]), 'method' => 'PUT', 'class' => 'forms-sample']) !!}
            @csrf
            <div class="form-group">
              {!! Form::label('name', 'Nama Tamu / Customer') !!}
              {!! Form::text('name', $customer->name, ['class' => 'form-control', 'placeholder' => 'Nama Customer']) !!}
            </div>
            <div class="form-group">
              {!! Form::label('phone', 'Nomer HP / Whatsapp') !!}
              {!! Form::text('phone', $customer->phone, ['class' => 'form-control', 'placeholder' => 'Nomer Telephone']) !!}
            </div>
             <div class="form-group">
              {!! Form::label('email', 'Email (optional)') !!}
              {!! Form::text('email',$customer->email, ['class' => 'form-control', 'placeholder' => 'Email customer']) !!}
            </div>
            <div class="form-group">
              {!! Form::label('address', 'Alamat (optional)') !!}
              {!! Form::text('address',$customer->address, ['class' => 'form-control', 'placeholder' => 'Alamat customer']) !!}
            </div>
            <button type="submit" class="btn btn-primary mr-2">Edit</button>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
@endsection
