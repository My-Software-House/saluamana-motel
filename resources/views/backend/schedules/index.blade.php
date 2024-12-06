@extends('backend.layouts.template')
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Jadwal Kamar Terbooking</h4>
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
</style>

@endsection

@section('js')
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var events = @json($events); // Data dari controller

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            navLinks: true,
            selectable: true,
            events: events, // Masukkan data booking
            eventClick: function(info) {
                // Redirect ke URL detail booking
                window.location.href = info.event.extendedProps.detail_url;
            }
        });

        calendar.render();
    });
</script> --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var events = @json($events); // Data dari controller

        var tooltip;
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            navLinks: true,
            selectable: true,
            events: events, // Masukkan data booking

            // Event ketika mouse hover
            eventMouseEnter: function(info) {
                // Buat elemen tooltip
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

                // Posisi tooltip mengikuti mouse
                tooltip.style.left = info.jsEvent.pageX + 10 + 'px';
                tooltip.style.top = info.jsEvent.pageY + 10 + 'px';
            },

            // Event ketika mouse keluar
            eventMouseLeave: function() {
                if (tooltip) {
                    tooltip.remove();
                    tooltip = null;
                }
            },
            eventClick: function(info) {
                // Redirect ke URL detail booking
                window.location.href = info.event.extendedProps.detail_url;
            }
        });

        calendar.render();
    });
</script>

@endsection
