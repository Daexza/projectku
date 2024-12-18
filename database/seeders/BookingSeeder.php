<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Booking;

class BookingSeeder extends Seeder
{
    public function run()
    {
        // Hanya insert data yang ada di tabel rooms
        Booking::create([
            'accommodation_id' => 1, // Pencarian ID
            'room_id' => 2, // Room ID yang ada
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'date' => now()->toDateString(),
        ]);
    }
}
