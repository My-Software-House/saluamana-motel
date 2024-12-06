@extends('backend.layouts.template')
@section('content')
<div class="row">
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tambah Jadwal Booking</h4>
                <form action="{{ route('backend.schedules.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama Pelanggan</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Nomor Telepon</label>
                        <input type="text" class="form-control" name="phone" id="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="check_in">Check-In</label>
                        <input type="date" class="form-control" name="check_in" id="check_in" required>
                    </div>
                    <div class="form-group">
                        <label for="check_out">Check-Out</label>
                        <input type="date" class="form-control" name="check_out" id="check_out" required>
                    </div>
                    <div class="form-group">
                        <label for="room_type_id">Tipe Kamar</label>
                        <select class="form-control" name="room_type_id" id="room_type_id" required>
                            @foreach($roomTypes as $roomType)
                                <option value="{{ $roomType->id }}">{{ $roomType->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="total_amount">Total Biaya</label>
                        <input type="number" class="form-control" name="total_amount" id="total_amount" required>
                    </div>
                    <div class="form-group">
                        <label for="total_room">Total Kamar</label>
                        <input type="number" class="form-control" name="total_room" id="total_room" required>
                    </div>
                    <div class="form-group">
                        <label for="total_guest">Jumlah Tamu</label>
                        <input type="number" class="form-control" name="total_guest" id="total_guest" required>
                    </div>
                    <div class="form-group">
                        <label for="total_child">Jumlah Anak</label>
                        <input type="number" class="form-control" name="total_child" id="total_child" required>
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
