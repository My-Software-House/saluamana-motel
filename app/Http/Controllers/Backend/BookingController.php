<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index() {
        $bookings = Booking::all();

        return view('backend.bookings.index', compact('bookings'));
    }
}
