@extends('backend.layouts.template')

@section('content')
<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Admin - Detail Booking</h4>
        <div>
            <a href="{{ route('backend.bookings.edit', ["id"=> $booking->id]) }}" class="btn btn-primary btn-sm">Edit</a>
            <a href="{{ route('backend.bookings.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
        </div>
    </div>
    <div class="card-body">
        <!-- Informasi Booking -->
        <h5 class="mb-3">Informasi Booking</h5>
        <div class="row">
            <div class="col-md-8">
                <div class="row mb-3">
                <div class="col-md-6">
                    <p><strong>Kode/ID Booking:</strong> <span class="text-primary">{{ $booking->booking_id }}</span></p>
                </div>
                <div class="col-md-6">
                    <p><strong>Tanggal Booking:</strong> {{ Carbon\Carbon::parse($booking->created_at)->translatedFormat('d M Y') }}</p>
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
                    <p><strong>Check-In:</strong> {{ Carbon\Carbon::parse($booking->check_in)->translatedFormat('d M Y') }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Check-Out:</strong> {{ Carbon\Carbon::parse($booking->check_out)->translatedFormat('d M Y') }}</p>
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
            </div>
            <div class="col-md-4">
                <img class="img-fluid d-abs" src="{{ asset('main-logo.png') }}" alt="">
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
                <p><strong>Email:</strong> {{ $booking->user->email }}</p>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <p><strong>Nomor Telepon:</strong> {{ $booking->user->phone }}</p>
            </div>
        </div>
        <hr>

        {{-- @if ($booking->payment != null) --}}
        <!-- Status Pembayaran -->
        <h5 class="mb-3">Pembayaran</h5>
        <div class="row mb-3">
            <div class="col-md-6">
                <p><strong>Total Tagihan:</strong> Rp {{ number_format($booking->payment->total_amount ?? $booking->total_amount) }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>Status:</strong>
                @if ($booking->payment->status_payment ?? "" != "unpaid")
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
                <p><strong>Virtual Account:</strong> {{ $booking->payment->payment_code ?? "" }} (Bank {{ strtoupper($booking->payment->payment_method ?? "") }})</p>
            </div>
        </div>
        <hr>
        {{-- @endif --}}


        <!-- Kontrol Admin -->
        <h5 class="mb-3">Kontrol Administrasi</h5>
        <div class="d-flex justify-content-between">
            <div>
                <a href="{{ route('backend.bookings.checkin', ['id' => $booking->id]) }}" class="btn btn-info">Tandai Checkin</a>
                <a href="{{ route('backend.bookings.done', ['id' => $booking->id]) }}" class="btn btn-success">Tandai Telah Selesai</a>
                <a href="{{ route('backend.bookings.generate-invoice', ['id' => $booking->id]) }}" target="_blank" class="btn btn-primary">Cetak Invoice</a>
            </div>
            <a href="{{ route('backend.bookings.cancel', ['id' => $booking->id]) }}" class="btn btn-danger">Batalkan Booking</a>
        </div>
    </div>
</div>
@endsection
