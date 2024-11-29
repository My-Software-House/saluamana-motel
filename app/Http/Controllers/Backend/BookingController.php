<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\BookingStatus;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(Request $request) {
        $bookings = Booking::all();

        if ($request->query('booking_status_id') != null) {
            $bookings = Booking::where('booking_status_id', $request->query('booking_status_id'))->get();
        }

        $bookinStatus = BookingStatus::find($request->query('booking_status_id'));
        return view('backend.bookings.index', compact('bookings', 'bookinStatus'));
    }
}
