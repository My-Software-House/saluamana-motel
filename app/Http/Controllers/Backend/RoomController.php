<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Rooms\CreateRoomRequest;
use App\Models\Booking;
use App\Models\Room;
use App\Models\RoomType;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index() {
        $rooms = Room::all();
        $roomTypes = RoomType::pluck('name', 'id');
        return view('backend.rooms.index',  compact('rooms', 'roomTypes'));
    }

    public function store(CreateRoomRequest $request) {
        try {
            $room = new Room();
            $room->name = $request->input('name');
            $room->room_type_id = $request->input('room_type_id');
            $room->save();

            toast('Berhasil menambah tipe kamar','success');

            return redirect()->back();
        } catch (Exception $e) {
            toast($e->getMessage(), 'danger');
            return redirect()->back();
        }
    }

    public function calendar(Request $request)
    {
        // Ambil bulan dan tahun dari parameter atau gunakan bulan dan tahun saat ini
        $month = $request->input('month', Carbon::now()->month);
        $year = $request->input('year', Carbon::now()->year);
        $roomTypeId = $request->input('room_type'); // Ambil tipe kamar dari request

        // Tanggal pertama dan terakhir bulan
        $startOfMonth = Carbon::create($year, $month, 1);
        $endOfMonth = $startOfMonth->copy()->endOfMonth();

        // Tentukan awal dan akhir tampilan kalender
        $startOfCalendar = $startOfMonth->copy()->startOfWeek(Carbon::MONDAY); // Mulai Senin
        $endOfCalendar = $endOfMonth->copy()->endOfWeek(Carbon::SUNDAY);       // Berakhir Minggu

        // Ambil semua tanggal dalam rentang kalender
        $dates = [];
        while ($startOfCalendar <= $endOfCalendar) {
            $dates[] = $startOfCalendar->copy();
            $startOfCalendar->addDay();
        }

        // Filter kamar berdasarkan tipe kamar (jika ada)
        $roomsQuery = Room::query();
        if ($roomTypeId) {
            $roomsQuery->where('room_type_id', $roomTypeId);
        }
        $rooms = $roomsQuery->get();

        // Ambil data booking untuk seluruh bulan
        $bookings = Booking::whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->with('rooms')
            ->get();

        // Format data untuk kalender
        $calendar = [];
        foreach ($dates as $date) {
            $dateString = $date->format('Y-m-d');

            // Cari booking untuk tanggal tertentu
            $bookedRooms = $bookings->filter(function ($booking) use ($dateString) {
                return $booking->booking_date === $dateString;
            })->flatMap(function ($booking) {
                return $booking->rooms;
            });

            // Periksa ketersediaan setiap kamar
            $roomAvailability = $rooms->map(function ($room) use ($bookedRooms) {
                return [
                    'room' => $room,
                    'isBooked' => $bookedRooms->contains($room),
                ];
            });

            // Simpan data tanggal
            $calendar[$dateString] = [
                'date' => $date,
                'rooms' => $roomAvailability, // Informasi kamar dan status ketersediaan
            ];
        }

        // Ambil semua tipe kamar untuk select dropdown
        $roomTypes = RoomType::all();

        return view('backend.rooms.available', compact('calendar', 'rooms', 'roomTypes', 'month', 'year', 'roomTypeId', 'dates'));
    }
}
