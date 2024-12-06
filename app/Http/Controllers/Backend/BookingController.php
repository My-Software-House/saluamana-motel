<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\BookingStatus;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(Request $request) {
        $bookings = Booking::paginate(10);

        if ($request->query('booking_status_id') != null) {
            $bookings = Booking::where('booking_status_id', $request->query('booking_status_id'))->paginate(10);
        }

        $bookinStatus = BookingStatus::find($request->query('booking_status_id'));
        return view('backend.bookings.index', compact('bookings', 'bookinStatus'));
    }

    public function detail($id) {
        $booking = Booking::find($id);
        return view('backend.bookings.detail', compact('booking'));
    }
}
