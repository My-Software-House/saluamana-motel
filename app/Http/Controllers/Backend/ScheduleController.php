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

    public function index()
    {
        // Mengambil semua tipe kamar
        $roomTypes = RoomType::all();

        return view('backend.schedules.index', compact('roomTypes'));
    }

    // Fungsi untuk mengambil data event berdasarkan filter tipe kamar
    public function getEvents(Request $request)
    {
        // Ambil tipe kamar yang dipilih dari request
        $roomTypeId = $request->input('room_type');

        // Query data booking dan filter berdasarkan tipe kamar (jika ada)
        $query = Booking::with(['user', 'roomType', 'bookingStatus']);

        // Jika ada filter tipe kamar
        if ($roomTypeId) {
            $query->where('room_type_id', $roomTypeId); // Filter berdasarkan tipe kamar
        }

        // Ambil data booking sesuai dengan filter
        $bookings = $query->get();

        // Format data booking untuk FullCalendar
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
                    'total_room' => $booking->total_room,
                    'duration' => $booking->duration,
                    'status' => $booking->bookingStatus->name,
                    'status_id' => $booking->bookingStatus->id,
                    'detail_url' => route('backend.bookings.detail', ['id' => $booking->id]),
                    'customer_name' => $booking->user->name, // Menambahkan nama pelanggan
                ],
            ];
        });

        // Kembalikan response dalam format JSON
        return response()->json($events);
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
