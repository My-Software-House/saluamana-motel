<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index() {
        // Ambil data booking dari database
        $bookings = Booking::with(['user', 'roomType', 'bookingStatus'])->get();

        // Format data untuk FullCalendar
        $events = $bookings->map(function ($booking) {
            return [
                'id' => $booking->id,
                'title' => 'Kamar: ' . $booking->roomType->name . ' - ' . $booking->total_room . ' kamar',
                'start' => $booking->check_in,
                'end' => $booking->check_out,
                'description' => 'Pelanggan: ' . $booking->user->name,
                'extendedProps' => [
                    'booking_id' => $booking->booking_id,
                    'total_amount' => $booking->total_amount,
                    'duration' => $booking->duration,
                    'status' => $booking->bookingStatus->name,
                    'detail_url' => route('backend.bookings.detail', ['id' => $booking->id]), // URL detail booking
                ],
            ];
        });

        return view('backend.schedules.index', ['events' => $events]);
    }
}
