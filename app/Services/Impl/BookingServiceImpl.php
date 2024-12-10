<?php

namespace App\Services\Impl;

use App\Exceptions\BookingAlreadyExist;
use App\Exceptions\BookingStatusNotFoundException;
use App\Exceptions\PaymentException;
use App\Exceptions\PhoneNumberNotFillException;
use App\Exceptions\RoomNotFoundException;
use App\Http\Requests\Booking\BookingRequest;
use App\Http\Requests\Booking\CreateBookingRequest;
use App\Models\Booking;
use App\Models\BookingStatus;
use App\Models\Payment;
use App\Models\RoomType;
use App\Models\User;
use App\Services\BookingService;
use App\Utils\SendWhatsapp;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class BookingServiceImpl implements BookingService{
    private string $serverKey;
    private string $midtransApiUrl;

    public function __construct() {
        $this->serverKey = config('midtrans.serverKey');
        $this->midtransApiUrl = config('midtrans.apiUrl');

    }

    function booking(BookingRequest $req)
    {
        $room_id = $req->input('room_type_id');
        $check_in = $req->input('check_in');
        $check_out = $req->input('check_out');
        $total_amount = $req->input('total_amount');
        $email = $req->input('email');
        $total_room = $req->input('total_room');
        $phone = $req->input('phone');
        $name = $req->input('name');
        $payment_method = $req->input('payment_method');
        $total_guest = $req->input('total_guest');
        $total_child = $req->input('total_child');
        $is_breakfast = $req->input('is_breakfast');
        $platform = $req->input('platform');

        $this->checkAvailableDate($check_in, $check_out, $room_id, $total_room);

        try {
            DB::beginTransaction();

            // create user customer
            $userCostumer = User::where('email', $email)->first();
            if ($userCostumer == null) {
                $userCostumer = User::create([
                    'name' => $name,
                    'email' => $email,
                    'phone' => $phone,
                    'role' => 'customer',
                    'password' => null
                ]);
            }

            $idBooking = $this->generateIdBooking();
            $booking_status_id = 1; // menunggu pembayaran
            $this->checkStatusBooking($booking_status_id);
            # get duration
            $duration = $this->getDuration($check_in, $check_out);

            $data = [
                'check_in' => $check_in,
                'check_out' => $check_out,
                'booking_id' => $idBooking,
                'booking_status_id' => $booking_status_id,
                'duration' => $duration,
                'user_id' => $userCostumer->id,
                'room_type_id' => $room_id,
                'total_room' => $total_room,
                'total_amount' => $total_amount,
                'total_guest' => $total_guest,
                'total_child' => $total_child,
                'is_breakfast' => $is_breakfast,
                'platform' => $platform,
            ];

            $booking = Booking::create($data);

            // create payment
            $midtrans_order_id = Str::uuid();

            $midtransPayment = $this->createPayment($booking, $midtrans_order_id, $payment_method);

            Payment::create([
                'booking_id' => $booking->id,
                'midtrans_order_id' => $midtrans_order_id,
                'total_amount' => $total_amount,
                'created_at' => $midtransPayment->object()->transaction_time,
                'status_payment' => $midtransPayment->object()->transaction_status,
                'payment_code' => $midtransPayment->object()->va_numbers[0]->va_number,
                'payment_method' => $payment_method
            ]).
            // send notif
            $this->sendNotifCustomer($booking);
            $this->sendNotifOwner($booking);
            DB::commit();

            return $booking;
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }

    }

    function create(CreateBookingRequest $req)
    {
        $room_id = $req->input('room_type_id');
        $check_in = $req->input('check_in');
        $check_out = $req->input('check_out');
        $total_amount = $req->input('total_amount');
        $total_room = $req->input('total_room');
        $total_guest = $req->input('total_guest');
        $total_child = $req->input('total_child');
        $is_breakfast = $req->input('is_breakfast');
        $user_id = $req->input('user_id');


        $this->checkAvailableDate($check_in, $check_out, $room_id, $total_room);

        try {
            DB::beginTransaction();

            // create user customer
            $userCostumer = User::find($user_id);

            $idBooking = $this->generateIdBooking();
            $booking_status_id = 2; // sudah terbayar
            $this->checkStatusBooking($booking_status_id);
            # get duration
            $duration = $this->getDuration($check_in, $check_out);

            $data = [
                'check_in' => $check_in,
                'check_out' => $check_out,
                'booking_id' => $idBooking,
                'booking_status_id' => $booking_status_id,
                'duration' => $duration,
                'user_id' => $userCostumer->id,
                'room_type_id' => $room_id,
                'total_room' => $total_room,
                'total_amount' => $total_amount,
                'total_guest' => $total_guest,
                'total_child' => $total_child,
                'is_breakfast' => $is_breakfast
            ];

            $booking = Booking::create($data);
            DB::commit();

            return $booking;
        } catch (\Exception $e) {
            DB::rollBack();
        }

    }

    function update(CreateBookingRequest $req, $id)
    {
        $room_id = $req->input('room_type_id');
        $check_in = $req->input('check_in');
        $check_out = $req->input('check_out');
        $total_amount = $req->input('total_amount');
        $total_room = $req->input('total_room');
        $total_guest = $req->input('total_guest');
        $total_child = $req->input('total_child');
        $is_breakfast = $req->input('is_breakfast');
        $user_id = $req->input('user_id');


        $this->checkAvailableDate($check_in, $check_out, $room_id, $total_room);

        try {
            DB::beginTransaction();

            // create user customer
            $userCostumer = User::find($user_id);

            $idBooking = $this->generateIdBooking();
            # get duration
            $duration = $this->getDuration($check_in, $check_out);


            $booking = Booking::find($id);
            $booking->check_in = $check_in;
            $booking->check_out = $check_out;
            $booking->booking_id = $idBooking;
            $booking->duration = $duration;
            $booking->user_id = $userCostumer->id;
            $booking->room_type_id = $room_id;
            $booking->total_room = $total_room;
            $booking->total_amount = $total_amount;
            $booking->total_guest = $total_guest;
            $booking->total_child = $total_child;
            $booking->is_breakfast = $is_breakfast;
            $booking->save();
            DB::commit();

            return $booking;
        } catch (\Exception $e) {
            DB::rollBack();
        }

    }

    function generateIdBooking(): string
    {
        $month = Carbon::now()->format('m');
        $idBooking =  'SA'. $month . time();
        return $idBooking;
    }

    private function checkStatusBooking($status_booking_id) {
        $statusBooking = BookingStatus::find($status_booking_id);
        if ($statusBooking == null) {
            throw new BookingStatusNotFoundException("Booking Status Not Found");
        }

        return $statusBooking;
    }

    private function getDuration($startDate, $endData): int {
        $start = new Carbon($startDate);
        $end = new Carbon($endData);

        $duration = $start->diffInDays($end);
        return $duration;
    }

    function sendNotifCustomer(Booking $booking)
    {
        # check room
        $room = $this->checkRoom($booking->room_type_id);
        # check phone number
        $customer = $this->checkCustomerAndPhone($booking->user_id);

        $payment_method = strtoupper($booking->payment->payment_method);
        $total = number_format($booking->payment->total_amount);
        $va = $booking->payment->payment_code;

        $idBooking = $booking->booking_id;
        $number = $customer->phone;
        $check_in = Carbon::parse($booking->check_in)->translatedFormat('d M Y');

        $message = <<<EOT
        Hi $customer->name,

        Terima kasih atas pemesanan Anda di Salu Amana Residence!

        Kami telah menerima pemesanan Anda dengan ID Booking : *$idBooking* untuk Single Room pada tanggal *$check_in*.

        Silakan lakukan pembayaran di nomer VA $payment_method : $va, dengan jumlah Rp $total

        Terima kasih dan kami menantikan kedatangan Anda!
        EOT;

        SendWhatsapp::send($number, $message);
    }

    function sendNotifOwner(Booking $booking)
    {
        # check room
        $room = $this->checkRoom($booking->room_type_id);

        $name = $booking->user->name;
        $number = "081328344002";
        $message = <<<EOT
        Hallo Admin Salu Amana,

        Pesan ini dari Salu Amana Resdence, terdapat booking baru untuk kamar $room->name atas nama $name pada tanggal $booking->check_in sampai $booking->check_out.

        Terimakasih.
        EOT;

        // send
        SendWhatsapp::send($number, $message);
    }

    private function checkRoom($room_id) {
        $room = RoomType::find($room_id);
        if ($room == null) {
            throw new RoomNotFoundException("Room Not Found");
        }

        return $room;
    }

    private function checkCustomerAndPhone($user_id) {
        $user = User::where('id', $user_id)->where('phone',"!=", null)->first();
        if ($user == null) {
            throw new PhoneNumberNotFillException("Phone Number Not Fill");
        }

        return $user;
    }

    private function checkAvailableDate($check_in, $check_out, $room_type_id, $total_room) {
        // $conflictingBooking = Booking::where(function ($query) use ($check_in, $check_out) {
        //     $query->whereBetween('check_in', [$check_in, $check_out])
        //         ->orWhereBetween('check_out', [$check_in, $check_out])
        //         ->orWhere(function ($query) use ($check_in, $check_out) {
        //             $query->where('check_in', '<=', $check_in)
        //                     ->where('check_out', '>=', $check_out);
        //         });
        // })->exists();


        // if ($conflictingBooking) {
        //     throw new BookingAlreadyExist("Ada konflik dengan booking lain.");
        // }
        // Ambil tipe kamar berdasarkan room_type_id
        $roomType = RoomType::findOrFail($room_type_id);

        // Periksa apakah ada booking yang bertabrakan dengan rentang tanggal yang diberikan
        $period = new \DatePeriod(
            new \DateTime($check_in),
            new \DateInterval('P1D'),
            (new \DateTime($check_out))->modify('+1 day') // Tambahkan satu hari ke rentang
        );

        // Loop untuk setiap tanggal dalam periode check-in dan check-out
        foreach ($period as $date) {
            $formattedDate = $date->format('Y-m-d');

            // Hitung total kamar yang sudah terbooking untuk tipe kamar pada tanggal ini
            $totalBookedRooms = Booking::where('room_type_id', $room_type_id)
                ->where('check_in', '<=', $formattedDate)
                ->where('check_out', '>=', $formattedDate)
                ->where('booking_status_id', "!=", 5)
                ->sum('total_room');

            // Tambahkan jumlah kamar yang ingin dipesan ke total kamar yang sudah terbooking
            $totalBookedRooms += $total_room;

            // Jika jumlah total kamar terbooking lebih dari kapasitas, tanggal dianggap penuh
            if ($totalBookedRooms > $roomType->number_of_room) {
                throw new BookingAlreadyExist("Tanggal $formattedDate sudah penuh untuk tipe kamar ini.");
            }
        }
    }

    private function createPayment(Booking $booking, $midtrans_order_id, $payment_method) {
        $payment_method = $payment_method;
        $uri = $this->midtransApiUrl . '/v2/charge';
        $authkey = 'Basic ' . base64_encode($this->serverKey);
        // dd($payment_method);
        $response = Http::withHeaders([
        'Authorization' =>  $authkey,
        'Content-Type' => 'application/json',
        'Accept' => 'application/json'
        ])
        ->post($uri, [
            'payment_type' => 'bank_transfer',
            'transaction_details' => [
            'order_id' => $midtrans_order_id,
            'gross_amount' => $booking->total_amount,
            ],
            "bank_transfer" => [
                "bank" => $payment_method
            ],
            'customer_details' => [
            'first_name' => $booking->user->name,
            'last_name' => '',
            'email' => $booking->user->email,
            'phone' => $booking->user->phone_number,
            ],
        ]);

        if($response->object()->status_code != 201) {
            throw new PaymentException("Error : " . $response);
        }

        return $response;
    }
}
