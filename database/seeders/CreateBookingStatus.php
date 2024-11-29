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
                "name" => "Menunggu Pembayaran",
            ],
            [
                "id" => 2,
                "name" => "Sudah Terbayar",
            ],
            [
                "id" => 3,
                "name" => "Check In",
            ],
            [
                "id" => 4,
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
