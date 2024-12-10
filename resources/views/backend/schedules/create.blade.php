@extends('backend.layouts.template')
@section('content')
<div class="row">
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tambah Jadwal Booking</h4>
                <form action="{{ route('backend.schedules.store') }}" method="POST">
                    @csrf
                    {{-- <div class="form-group">
                        <label for="name">Nama Pelanggan</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" >
                    </div>
                    <div class="form-group">
                        <label for="phone">Nomor Telepon</label>
                        <input type="text" class="form-control" name="phone" id="phone" required>
                    </div> --}}
                    <div class="form-group">
                        <label for="room_type_id">Pilih Tamu</label>
                        <select name="user_id" class="js-example-basic-single w-100">
                            <option>-- Pilih Tamu --</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }} - {{ $user->phone }}</option>
                            @endforeach
                        </select>
                        <p class="mt-2">Jika tamu belum terdaftar silahkan daftarkan tamu <a class="btn btn-sm btn-primary">+</a></p>
                    </div>
                    <div class="form-group">
                        <label for="check_in">Check-In</label>
                        <input type="date" value="{{ old('check_in') }}" class="form-control" name="check_in" id="check_in" required>
                    </div>
                    <div class="form-group">
                        <label for="check_out">Check-Out</label>
                        <input type="date" value="{{ old('check_out') }}" class="form-control" name="check_out" id="check_out" required>
                    </div>
                    <div class="form-group">
                        <label for="room_type_id">Tipe Kamar</label>
                        <select class="form-control" name="room_type_id" id="room_type_id" required>
                            <option value="">-- Pilih Tipe Kamar --</option>
                            @foreach($roomTypes as $roomType)
                                <option value="{{ $roomType->id }}">{{ $roomType->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="total_amount">Total Biaya</label>
                        <input type="number" min="0" value="{{ old('total_amount') }}" class="form-control" name="total_amount" id="total_amount" required>
                    </div>
                    <div class="form-group">
                        <label for="total_room">Total Kamar</label>
                        <input type="number" min="0" value="{{ old('total_room') }}" class="form-control" name="total_room" id="total_room" required>
                    </div>
                    <div class="form-group">
                        <label for="total_guest">Jumlah Tamu</label>
                        <input type="number" min="0" value="{{ old('total_guest') }}" class="form-control" name="total_guest" id="total_guest" required>
                    </div>
                    <div class="form-group">
                        <label for="total_child">Jumlah Anak</label>
                        <input type="number" min="0" value="{{ old('total_child') }}"  class="form-control" name="total_child" id="total_child" required>
                    </div>
                    <div class="form-group">
                        <label for="is_breakfast">Sarapan</label>
                        <select class="form-control" name="is_breakfast" id="is_breakfast" required>
                            <option value="1">Ya</option>
                            <option value="0">Tidak</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="platform">Platform</label>
                        <select class="form-control" name="platform" id="platform" required>
                            <option value="Traveloka">Traveloka</option>
                            <option value="Agoda">Agoda</option>
                            <option value="Booking.com">Booking.com</option>
                            {{-- <option value="Website">Website</option> --}}
                            <option value="Whatsapp">Whatsapp</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Booking</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


@section('css')
<link rel="stylesheet" href="{{ asset('backend/vendors/select2/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
@endsection

@section('js')
<script src="{{ asset('backend/vendors/typeahead.js/typeahead.bundle.min.js') }}"></script>
<script src="{{ asset('backend/vendors/select2/select2.min.js') }}"></script>
<script src="{{ asset('backend/js/select2.js') }}"></script>
@endsection
