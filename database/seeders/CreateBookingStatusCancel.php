<?php

namespace Database\Seeders;

use App\Models\BookingStatus;
use Illuminate\Database\Seeder;

class CreateBookingStatusCancel extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BookingStatus::create([
            'id' => 5,
            'name' => 'Batal'
        ]);
    }
}
