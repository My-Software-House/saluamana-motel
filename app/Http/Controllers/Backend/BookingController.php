<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\BookingStatus;
use Barryvdh\DomPDF\Facade\Pdf;
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

    public function generateInvoice($id)
    {
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
}
