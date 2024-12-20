@extends('backend.layouts.template')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Daftar Booking @if ($bookinStatus != null)
            Status {{ $bookinStatus->name }}
          @endif
        </h4>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>ID Booking</th>
                  <th>Nama Customer</th>
                  <th>Nomer Hp</th>
                  {{-- <th>Cek In</th>
                  <th>Cek Out</th> --}}
                  <th>Kamar</th>
                  <th>Durasi</th>
                  <th>Total Amount</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @if ($bookings->count() === 0)
                    <tr>
                        <td colspan="8">Belum ada bookings</td>
                    </tr>
                @endif
                @foreach($bookings as $booking)
                  <tr>
                    <td>#</td>
                    <td>{{ $booking->booking_id }}</td>
                    <td>{{ $booking->user->name }}</td>
                    <td>{{ $booking->user->phone }}</td>
                    {{-- <td>{{ $booking->check_in }}</td>
                    <td>{{ $booking->check_out }}</td> --}}
                    <td>{{ $booking->total_room }} Kamar - {{ $booking->roomType->name }}</td>
                    <td>{{ $booking->duration }} Hari</td>
                    <td>Rp. {{ $booking->total_amount }}</td>

                    <td>
                        <span class="badge badge-warning">{{ $booking->bookingStatus->name }}</span>
                    </td>

                    <td class="d-flex">
                        <a href="{{ route('backend.bookings.detail', ['id' => $booking->id]) }}" class="btn btn-sm btn-info mr-2">Detail</a>
                        <a href="{{ route('backend.bookings.edit', ['id' => $booking->id]) }}" class="btn btn-sm btn-primary mr-2">Edit</a>
                        <form method="POST" action="{{ route('backend.bookings.delete', ['id' => $booking->id ]) }}" onsubmit="return confirm('Yakin ingin menghapus data?');">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                        </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            {{ $bookings->appends(['booking_status_id' => $_GET['booking_status_id'] ?? ''])->links() }}
        </div>
      </div>
    </div>
  </div>
@endsection
