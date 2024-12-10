@extends('backend.layouts.template')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Jadwal Kamar Terbooking</h4>
                <a href="{{ route('backend.schedules.create') }}" class="btn btn-primary btn-md my-2">Tambah Jadwal Booking</a>
                <!-- Dropdown Filter Tipe Kamar -->
                <select id="roomTypeFilter" class="form-control">
                    <option value="">Pilih Tipe Kamar</option>
                    @foreach($roomTypes as $roomType)
                        <option value="{{ $roomType->id }}">{{ $roomType->name }}</option>
                    @endforeach
                </select>

                <div id='calendar'></div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.css' rel='stylesheet'>
<style>
    .fc-tooltip {
        position: absolute;
        z-index: 10001;
        background: #333;
        color: #fff;
        padding: 10px;
        border-radius: 5px;
        font-size: 12px;
        max-width: 200px;
        pointer-events: none;
    }
    /* Warna untuk status Confirmed */
    .fc-event.confirmed {
        background-color: #28a745; /* Hijau untuk status Confirmed */
        border-color: #28a745;
    }

    /* Warna untuk status Pending */
    .fc-event.pending {
        background-color: #ffc107; /* Kuning untuk status Pending */
        border-color: #ffc107;
    }



    /* Warna untuk status Cancelled */
    .fc-event.cancelled {
        background-color: #dc3545; /* Merah untuk status Cancelled */
        border-color: #dc3545;
    }

</style>
@endsection

@section('js')
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var roomTypeFilter = document.getElementById('roomTypeFilter');
        var events = []; // Events akan di-load lewat AJAX
        var tooltip = null; // Deklarasi tooltip di luar eventMouseEnter

        // Fungsi untuk memuat kalender
        function loadCalendar(roomTypeId = null) {
            var url = '{{ route('backend.schedules.getEvents') }}'; // Rute controller yang mengembalikan events

            // Kirim AJAX request untuk mendapatkan data
            fetch(url + '?room_type=' + roomTypeId)
                .then(response => response.json())
                .then(data => {
                    events = data; // Menyimpan event yang diterima dari server
                    renderCalendar();
                });
        }

        // Fungsi untuk merender kalender
        function renderCalendar() {
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                navLinks: true,
                selectable: true,
                events: events,
                eventClassNames: function(info) {
                    // Menambahkan kelas CSS berdasarkan status booking
                    var status = info.event.extendedProps.status_id;
                    if (status === 1) {
                        return ['confirmed']; // Kelas untuk status Confirmed
                    } else if (status === 2) {
                        return ['pending']; // Kelas untuk status Pending
                    } else if (status === 3) {
                        return ['cancelled']; // Kelas untuk status Cancelled
                    }
                    return [];
                },
                eventMouseEnter: function(info) {
                    // Buat elemen tooltip hanya jika belum ada
                    if (!tooltip) {
                        tooltip = document.createElement('div');
                        tooltip.className = 'fc-tooltip';
                        tooltip.innerHTML = `
                            <strong>Nama:</strong> ${info.event.extendedProps.customer_name}<br>
                            <strong>Kamar:</strong> ${info.event.title}<br>
                            <strong>Total Kamar:</strong> ${info.event.extendedProps.total_room}<br>
                            <strong>Total Biaya:</strong> Rp ${info.event.extendedProps.total_amount}<br>
                            <strong>Status:</strong> ${info.event.extendedProps.status}
                        `;
                        document.body.appendChild(tooltip);
                    }

                    // Posisi tooltip mengikuti mouse
                    tooltip.style.left = info.jsEvent.pageX + 10 + 'px';
                    tooltip.style.top = info.jsEvent.pageY + 10 + 'px';
                },
                eventMouseLeave: function() {
                    if (tooltip) {
                        tooltip.remove(); // Hapus tooltip saat mouse meninggalkan event
                        tooltip = null; // Reset tooltip ke null
                    }
                },
                eventClick: function(info) {
                    window.location.href = info.event.extendedProps.detail_url;
                }
            });

            calendar.render();
        }

        // Load kalender pertama kali tanpa filter
        loadCalendar();

        // Event listener untuk dropdown filter
        roomTypeFilter.addEventListener('change', function() {
            var roomTypeId = this.value;
            loadCalendar(roomTypeId); // Reload kalender dengan filter
        });
    });

</script>
@endsection
