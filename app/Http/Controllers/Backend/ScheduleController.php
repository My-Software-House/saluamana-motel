<?php

namespace App\Http\Controllers\Backend;

use App\Exceptions\BookingAlreadyExist;
use App\Exceptions\BookingStatusNotFoundException;
use App\Exceptions\PaymentException;
use App\Exceptions\PhoneNumberNotFillException;
use App\Exceptions\RoomNotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Booking\CreateBookingRequest;
use App\Models\Booking;
use App\Models\RoomType;
use App\Services\BookingService;
use Exception;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    private BookingService $bookingService;

    public function __construct(BookingService $bookingService) {
        $this->bookingService = $bookingService;
    }

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

    public function create() {
        $roomTypes = RoomType::all();
        return view('backend.schedules.create', compact('roomTypes'));
    }

    public function store(CreateBookingRequest $request) {
        try {
            # booking process
            $result = $this->bookingService->create($request);

            toast('Berhasil menambah tipe kamar','success');

            return redirect()->back();

        } catch (PhoneNumberNotFillException |
            RoomNotFoundException |
            BookingAlreadyExist |
            PaymentException |
            BookingStatusNotFoundException $e
        ) {
            alert()->error('ErrorAlert', $e->getMessage());
            return redirect()->back();
        } catch (Exception $e) {
            alert()->error('ErrorAlert','Server Error');
            return redirect()->back();
        }
    }
}
