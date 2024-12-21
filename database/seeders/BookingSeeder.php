<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Booking;
use App\Models\Room;

class BookingSeeder extends Seeder
{
    public function run()
    {
        // Cari room berdasarkan room_id
        $room = Room::find(2);

        if ($room) {
            $days = now()->addDays(3)->diffInDays(now()->addDays(1)); // Durasi booking
            $totalPrice = $days * $room->price_per_night; // Hitung total harga

            // Insert data ke tabel bookings
            Booking::create([
                'pencarian_id' => 1, // Pencarian ID
                'room_id' => 2, // Room ID yang ada
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'check_in' => now()->addDays(1)->toDateString(), // Check-in
                'check_out' => now()->addDays(3)->toDateString(), // Check-out
                'total_price' => $totalPrice, // Total price
            ]);
        }
    }
}
