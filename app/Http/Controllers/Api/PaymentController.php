<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Payment;
use App\Utils\SendWhatsapp;
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
        }
    }
}
