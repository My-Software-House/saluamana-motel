<?php

namespace App\Services;

use App\Http\Requests\Booking\BookingRequest;
use App\Models\Booking;

interface BookingService {
    function booking(BookingRequest $req): Booking;
}
