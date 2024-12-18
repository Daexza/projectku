<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomSeeder extends Seeder
{
    public function run()
    {
        Room::create([
            'pencarian_id' => 1,
            'room_number' => '101',
            'room_type' => 'suite',
            'price_per_night' => 200.00,
            'facilities' => 'King Bed, Ocean View',
        ]);

        Room::create([
            'pencarian_id' => 1,
            'room_number' => '104',
            'room_type' => 'suite',
            'price_per_night' => 250.00,
            'facilities' => 'King Bed, Ocean View, Balcony',
        ]);
    }
}
