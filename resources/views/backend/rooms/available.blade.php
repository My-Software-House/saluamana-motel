@extends('backend.layouts.template')

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Kalender Reservasi Kamar ({{ \Carbon\Carbon::create($year, $month)->format('F Y') }})</h4>

          <!-- Form Filter -->
            <form method="GET" action="{{ route('backend.rooms.calendar') }}" class="mb-3">
                <div class="form-row align-items-center">
                    <div class="col-auto">
                        <select name="room_type" class="form-control" onchange="this.form.submit()">
                            <option value="">-- Semua Tipe Kamar --</option>
                            @foreach ($roomTypes as $type)
                                <option value="{{ $type->id }}" {{ $roomTypeId == $type->id ? 'selected' : '' }}>
                                    {{ $type->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary">Tampilkan</button>
                    </div>
                </div>
            </form>

            <!-- Navigasi Bulan -->
            <div class="d-flex justify-content-between mb-3">
                <a href="{{ route('backend.rooms.calendar', ['month' => $month - 1, 'year' => $month == 1 ? $year - 1 : $year, 'room_type' => $roomTypeId]) }}" class="btn btn-primary">
                    &laquo; Bulan Sebelumnya
                </a>
                <a href="{{ route('backend.rooms.calendar', ['month' => $month + 1, 'year' => $month == 12 ? $year + 1 : $year, 'room_type' => $roomTypeId]) }}" class="btn btn-primary">
                    Bulan Berikutnya &raquo;
                </a>
            </div>

            <!-- Header Hari -->
            <div class="row text-center font-weight-bold">
                <div class="col">Senin</div>
                <div class="col">Selasa</div>
                <div class="col">Rabu</div>
                <div class="col">Kamis</div>
                <div class="col">Jumat</div>
                <div class="col">Sabtu</div>
                <div class="col">Minggu</div>
            </div>

            <!-- Grid Kalender -->
            @php
                $weekDays = 7;
                $currentDay = 0;
            @endphp
            <div class="row text-center">
                @foreach ($dates as $date)
                    @php
                        $formattedDate = $date->format('Y-m-d');
                        $dayData = $calendar[$formattedDate] ?? [];
                    @endphp

                    <div class="col border py-3">
                        <div><strong>{{ $date->day }}</strong></div>

                        @if (isset($dayData['rooms']))
                            <ul class="list-unstyled mt-2">
                                @foreach ($dayData['rooms'] as $roomData)
                                    <li>
                                        {{ $roomData['room']->name }}:
                                        <span class="{{ $roomData['isBooked'] ? 'text-danger' : 'text-success' }}">
                                            {{ $roomData['isBooked'] ? 'Terbooking' : 'Tersedia' }}
                                        </span>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <div class="text-muted">No data available</div>
                        @endif
                    </div>

                    @php $currentDay++; @endphp

                    @if ($currentDay % $weekDays == 0)
                        </div><div class="row text-center">
                    @endif
                @endforeach

                <!-- Tambahkan kolom kosong jika minggu terakhir tidak penuh -->
                @while ($currentDay % $weekDays != 0)
                    <div class="col border py-3"></div>
                    @php $currentDay++; @endphp
                @endwhile
            </div>
        </div>
      </div>
    </div>
</div>
<div class="container">
@endsection
