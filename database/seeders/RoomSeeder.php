<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomSeeder extends Seeder
{
    public function run()
    {
        Room::insert([
            [
                'pencarian_id' => 1, // ID untuk Hotel The Phoenix Yogyakarta
                'room_number' => '101',
                'room_type' => 'Suite',
                'price_per_night' => 200.00,
                'facilities' => 'King Bed, Ocean View',
                'image_url' => 'https://placehold.co/400x300?text=Suite+Room+101',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pencarian_id' => 1, // ID untuk Hotel The Phoenix Yogyakarta
                'room_number' => '104',
                'room_type' => 'Suite',
                'price_per_night' => 250.00,
                'facilities' => 'King Bed, Ocean View, Balcony',
                'image_url' => 'https://placehold.co/400x300?text=Suite+Room+104',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pencarian_id' => 1, // ID untuk Hotel The Phoenix Yogyakarta
                'room_number' => '102',
                'room_type' => 'Deluxe',
                'price_per_night' => 150.00,
                'facilities' => 'Queen Bed, City View',
                'image_url' => 'https://placehold.co/400x300?text=Deluxe+Room+102',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pencarian_id' => 1, // ID untuk Hotel The Phoenix Yogyakarta
                'room_number' => '103',
                'room_type' => 'Standard',
                'price_per_night' => 100.00,
                'facilities' => 'Double Bed, Garden View',
                'image_url' => 'https://placehold.co/400x300?text=Standard+Room+103',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
