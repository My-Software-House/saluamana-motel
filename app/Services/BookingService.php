<?php

namespace App\Services;

use App\Http\Requests\Booking\BookingRequest;
use App\Http\Requests\Booking\CreateBookingRequest;
use App\Models\Booking;

interface BookingService {
    function booking(BookingRequest $req);
    function create(CreateBookingRequest $req);
}
