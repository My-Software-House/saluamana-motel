<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin Salu Amana',
            'email' => 'saluamana@gmail.com',
            'phone' => '-',
            'password' => bcrypt('rahasia'),
            'role' => 'admin'
        ]);
    }
}
