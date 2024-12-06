@extends('backend.layouts.template')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Admin - Detail Booking</h4>
        <a href="{{ route('backend.bookings.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
    </div>
    <div class="card-body">
        <!-- Informasi Booking -->
        <h5 class="mb-3">Informasi Booking</h5>
        <div class="row mb-3">
            <div class="col-md-6">
                <p><strong>Kode/ID Booking:</strong> <span class="text-primary">{{ $booking->booking_id }}</span></p>
            </div>
            <div class="col-md-6">
                <p><strong>Tanggal Booking:</strong> {{ $booking->created_at }}</p>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <p><strong>Tipe Kamar:</strong> {{ $booking->roomType->name }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>Status Booking:</strong> <span class="badge bg-warning text-dark">{{ $booking->bookingStatus->name }}</span></p>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <p><strong>Jumlah Tamu:</strong> {{ $booking->total_guest }} Dewasa</p>
            </div>
            <div class="col-md-6">
                <p><strong>Jumlah Anak-Anak:</strong> {{ $booking->total_child }} Anak</p>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <p><strong>Check-In:</strong> {{ $booking->check_in }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>Check-Out:</strong> {{ $booking->check_out }}</p>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <p><strong>Layanan Breakfast:</strong> @if ($booking->is_breakfast)
                <span class="badge bg-success text-white">Termasuk</span></p>
                @else
                <span class="badge bg-danger">Tidak Termasuk</span></p>
                @endif
            </div>
            <div class="col-md-6">
                <p><strong>Jumlah Kamar:</strong> {{ $booking->total_room }} Kamar</p>
            </div>
        </div>
        <hr>

        <!-- Informasi Pelanggan -->
        <h5 class="mb-3">Informasi Pelanggan</h5>
        <div class="row mb-3">
            <div class="col-md-6">
                <p><strong>Nama Pelanggan:</strong> {{ $booking->user->name }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>Email:</strong> {{ $booking->user->email }}/p>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <p><strong>Nomor Telepon:</strong> {{ $booking->user->phone }}</p>
            </div>
        </div>
        <hr>

        <!-- Status Pembayaran -->
        <h5 class="mb-3">Pembayaran</h5>
        <div class="row mb-3">
            <div class="col-md-6">
                <p><strong>Total Harga:</strong> Rp {{ number_format($booking->payment->total_amount) }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>Status:</strong>
                @if ($booking->payment->status_payment == 'paid')
                <span class="badge bg-success text-white">Sudah Terbayar</span>
                @else
                <span class="badge bg-danger">Belum Terbayar</span>
                @endif</p>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <p><strong>Metode Pembayaran:</strong> Transfer Bank</p>
            </div>
            <div class="col-md-6">
                <p><strong>Virtual Account:</strong> {{ $booking->payment->payment_code }} (Bank {{ strtoupper($booking->payment->payment_method) }})</p>
            </div>
        </div>
        <hr>

        <!-- Kontrol Admin -->
        <h5 class="mb-3">Kontrol Administrasi</h5>
        <div class="d-flex justify-content-between">
            <div>
                <button class="btn btn-success">Tandai Lunas</button>
                <button class="btn btn-warning">Ubah Status</button>
            </div>
            <button class="btn btn-danger">Batalkan Booking</button>
        </div>
    </div>
</div>
@endsection