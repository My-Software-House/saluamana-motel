<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\BookingAlreadyExist;
use App\Exceptions\BookingStatusNotFoundException;
use App\Exceptions\PaymentException;
use App\Exceptions\PhoneNumberNotFillException;
use App\Exceptions\RoomNotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Booking\BookingRequest;
use App\Models\Booking;
use App\Models\RoomType;
use App\Services\BookingService;
use Exception;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BookingController extends Controller
{
    private BookingService $bookingService;

    public function __construct(BookingService $bookingService) {
        $this->bookingService = $bookingService;
    }

    public function getDetail() {
        return 'detail';
    }


    public function booking(BookingRequest $req) {
        try {
            # booking process
            $result = $this->bookingService->booking($req);

            # return json
            $dataResponse= [
                'id_booking' => $result->booking_id,
                'check_in' => $result->check_in,
                'check_out' => $result->check_out,
                'duration' => $result->duration,
                'booking_status' => $result->booking_status_id,
                'total_amount' => $result->total_amount,
                'room_type_id' => $result->room_type_id,
                'user_id' => $result->user_id,
            ];

            return response()->json([
                "message" => "success",
                "data" => $dataResponse
            ]);

        } catch (PhoneNumberNotFillException |
            RoomNotFoundException |
            BookingAlreadyExist |
            PaymentException |
            BookingStatusNotFoundException $e
        ) {
            throw new HttpResponseException(response([
                "errors" => [
                    "message" => [$e->getMessage()]
                ]
            ], 400));

        } catch (Exception $e) {
            dd($e);
            Log::error('Error Booking: '. $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Terjadi masalah pada server ',
            ], 500);
        }
    }

    // public function getUnavailableDates()
    // {
    //     $bookings = Booking::select('check_in', 'check_out')->get();

    //     $unavailableDates = [];

    //     foreach ($bookings as $booking) {
    //         $period = new \DatePeriod(
    //             new \DateTime($booking->check_in),
    //             new \DateInterval('P1D'),
    //             (new \DateTime($booking->check_out))->modify('+1 day')
    //         );

    //         foreach ($period as $date) {
    //             $unavailableDates[] = $date->format('Y-m-d');
    //         }
    //     }

    //     return response()->json($unavailableDates);
    // }

    public function getUnavailableDates(Request $request)
    {
        $roomTypeId = $request->query('room_type_id');
        $roomType = RoomType::findOrFail($roomTypeId);

        // Ambil semua booking untuk tipe kamar tertentu
        $bookings = Booking::where('room_type_id', $roomTypeId)->get(['check_in', 'check_out', 'total_room']);

        // Inisialisasi array untuk menyimpan jumlah kamar terbooking per tanggal
        $dateCounts = [];

        // Loop melalui semua booking
        foreach ($bookings as $booking) {
            $period = new \DatePeriod(
                new \DateTime($booking->check_in),
                new \DateInterval('P1D'),
                (new \DateTime($booking->check_out))->modify('+1 day')
            );

            foreach ($period as $date) {
                $formattedDate = $date->format('Y-m-d');

                // Tambahkan jumlah kamar terbooking untuk tanggal ini
                if (!isset($dateCounts[$formattedDate])) {
                    $dateCounts[$formattedDate] = 0;
                }
                $dateCounts[$formattedDate] += $booking->total_room;
            }
        }

        // Cari tanggal yang jumlah booking-nya >= total kamar yang tersedia untuk tipe kamar ini
        $unavailableDates = array_keys(
            array_filter($dateCounts, function ($count) use ($roomType) {
                return $count >= $roomType->number_of_room;
            })
        );

        return response()->json(['message' => 'success', 'data' => ['unavailable_dates' => $unavailableDates]]);
    }

    public function detail($bookingId) {
        $booking = Booking::with('payment')->with('roomType')->with('bookingStatus')->with('user')->where('booking_id', $bookingId)->first();
        if ($bookingId == null) {
            return response()->json([
                "message" => "not found",
            ], 404);
        }

        return response()->json([
            "message" => "success",
            "data" => $booking
        ]);
    }
}
