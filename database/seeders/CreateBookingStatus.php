<?php

namespace Database\Seeders;

use App\Models\BookingStatus;
use Illuminate\Database\Seeder;

class CreateBookingStatus extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            [
                "id" => 1,
                "name" => "Cek Ketersediaan",
            ],
            [
                "id" => 2,
                "name" => "Menunggu Pembayaran",
            ],
            [
                "id" => 3,
                "name" => "Kamar Tidak Tersedia",
            ],
            [
                "id" => 4,
                "name" => "Cancel",
            ],
            [
                "id" => 5,
                "name" => "Check In",
            ],
            [
                "id" => 6,
                "name" => "Beri Ulasan",
            ],
            [
                "id" => 7,
                "name" => "Selesai",
            ],
        ];

        foreach($statuses as $status){
            BookingStatus::create([
                'id' => $status['id'],
                'name' => $status['name']
            ]);
        }
    }
}
