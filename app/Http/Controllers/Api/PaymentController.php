<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Payment;
use App\Utils\SendWhatsapp;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function callback(Request $request) {
        $serverKey = config('midtrans.serverKey');
        $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);
        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'settlement') {
                $payment = Payment::where('midtrans_order_id', $request->order_id)->first();
                $payment->status_payment = 'paid';
                $payment->save();

                $booking = Booking::where('id', $payment->booking_id)->first();
                $booking->booking_status_id = 2;
                $booking->save();

                $number = $booking->user->phone;
                $message = <<<EOT
                Pembayaran di Salu Amana Residence Berhasil, Terimakasih
                EOT;

                SendWhatsapp::send($number, $message);
            }

            if ($request->transaction_status == 'expire' || $request->transaction_status == 'deny' || $request->transaction_status == 'cancel') {
                $booking = Booking::where('id', $payment->booking_id)->first();
                $booking->booking_status_id = 5;
                $booking->save();

                $number = $booking->user->phone;
                $room = $booking->roomType->name;
                $message = <<<EOT
                Pembayaran anda di salu amanana residence dengen ID booking $booking->booking_id pada kamar $room sudah expired / ditolak.
                EOT;

                SendWhatsapp::send($number, $message);
            }
        }
    }
}
