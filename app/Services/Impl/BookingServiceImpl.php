<?php

namespace App\Services\Impl;

use App\Exceptions\BookingAlreadyExist;
use App\Exceptions\BookingStatusNotFoundException;
use App\Exceptions\PhoneNumberNotFillException;
use App\Exceptions\RoomNotFoundException;
use App\Http\Requests\Booking\BookingRequest;
use App\Models\Booking;
use App\Models\BookingStatus;
use App\Models\RoomType;
use App\Models\User;
use App\Services\BookingService;
use App\Utils\SendWhatsapp;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class BookingServiceImpl implements BookingService{
    function booking(BookingRequest $req): Booking
    {
        $room_id = $req->input('room_type_id');
        $check_in = $req->input('check_in');
        $check_out = $req->input('check_out');
        $total_amount = $req->input('total_amount');
        $email = $req->input('email');
        $total_room = $req->input('total_room');
        $phone = $req->input('phone');
        $name = $req->input('name');
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
            $booking_status_id = 1; // cek ketersediaan
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
                'total_amount' => $total_amount
            ];

            $booking = Booking::create($data);

            // send notif
            $this->sendNotifCustomer($booking);
            $this->sendNotifOwner($booking);
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

        $number = $customer->phone;
        $message = <<<EOT
        Hi $customer->name,

        Terima kasih atas kepercayaanmu menggunakan Salu Amana Residence.
        Saat ini, Reservesi dengan tipe kamar $room->name dalam proses cek ketersediaan.

        Informasi akan kami infokan maksimal 1x24 jam.
        EOT;

        SendWhatsapp::send($number, $message);
    }

    function sendNotifOwner(Booking $booking)
    {
        # check room
        $room = $this->checkRoom($booking->room_type_id);

        $number = "085155380996";
        $message = <<<EOT
        Hallo Admin Salu Amana,

        Pesan ini dari Salu Amana Resdence, terdapat booking baru untuk kamar $room->name pada tanggal $booking->check_in sampai $booking->check_out.

        Untuk itu apakah masih ada booking untuk kamar dan tanggal tersebut .

        Mohon konfirmasi secepatnya.

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
                ->sum('total_room');

            // Tambahkan jumlah kamar yang ingin dipesan ke total kamar yang sudah terbooking
            $totalBookedRooms += $total_room;

            // Jika jumlah total kamar terbooking lebih dari kapasitas, tanggal dianggap penuh
            if ($totalBookedRooms > $roomType->number_of_room) {
                throw new BookingAlreadyExist("Tanggal $formattedDate sudah penuh untuk tipe kamar ini.");
            }
        }
    }
}
