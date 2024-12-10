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
use App\Models\BookingStatus;
use App\Models\RoomType;
use App\Models\User;
use App\Services\BookingService;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    private BookingService $bookingService;

    public function __construct(BookingService $bookingService) {
        $this->bookingService = $bookingService;
    }

    public function index(Request $request) {
        $bookings = Booking::orderBy('created_at', 'DESC')->paginate(10);

        if ($request->query('booking_status_id') != null) {
            $bookings = Booking::orderBy('created_at', 'DESC')->where('booking_status_id', $request->query('booking_status_id'))->paginate(10);
        }

        $bookinStatus = BookingStatus::find($request->query('booking_status_id'));
        return view('backend.bookings.index', compact('bookings', 'bookinStatus'));
    }

    public function detail($id) {
        $booking = Booking::find($id);
        return view('backend.bookings.detail', compact('booking'));
    }

    public function generateInvoice($id)
    {
        setlocale(LC_ALL, 'IND');
        $booking = Booking::find($id);

        $pdf = Pdf::loadView('backend.bookings.pdf', compact('booking'));
        return $pdf->stream($booking->user->name . '-INVOICE-SA.pdf');
    }

    public function checkin($id)
    {
        $booking = Booking::find($id);
        $booking->booking_status_id = 3;
        $booking->save();
        toast('Status Booking Checkin','success');
        return redirect()->back();
    }
    public function cancel($id)
    {
        $booking = Booking::find($id);
        $booking->booking_status_id = 5;
        $booking->save();
        toast('Status Booking Cancel','success');
        return redirect()->back();
    }

    public function done($id)
    {
        $booking = Booking::find($id);
        $booking->booking_status_id = 4;
        $booking->save();
        toast('Status Booking Cancel','success');
        return redirect()->back();
    }


    public function edit($id) {
        $booking = Booking::find($id);
        $users = User::all();
        $roomTypes = RoomType::all();
        return view('backend.bookings.edit', compact('booking', 'users', 'roomTypes'));
    }

    public function update(CreateBookingRequest $request, $id) {
        try {
            # booking process
            $result = $this->bookingService->update($request, $id);

            toast('Berhasil mengubah data booking dengan booking id ' . $result->booking_id ,'success');

            return redirect()->route('backend.bookings.detail', ['id' => $result->id]);

        } catch (PhoneNumberNotFillException |
            RoomNotFoundException |
            BookingAlreadyExist |
            PaymentException |
            BookingStatusNotFoundException $e
        ) {
            alert()->error('ErrorAlert', $e->getMessage());
            return redirect()->back()->withInput($request->input());;
        } catch (Exception $e) {
            alert()->error('ErrorAlert','Server Error');
            return redirect()->back()->withInput($request->input());;
        }
    }
}
