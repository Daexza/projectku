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
            'check_in' => now()->addDays(1)->toDateString(), // contoh check-in 1 hari dari sekarang
            'check_out' => now()->addDays(3)->toDateString(), // contoh check-out 3 hari dari sekarang
        ]);
    }
}
