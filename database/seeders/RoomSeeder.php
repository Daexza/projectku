<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomSeeder extends Seeder
{
    public function run()
    {
        // Pastikan id=1 dan id=2 ada di tabel pencarian
        Room::create([
            'pencarian_id' => 1, // Pastikan ini ada
            'room_number' => '101',
            'room_type' => 'suite',
            'price_per_night' => 200.00,
            'facilities' => 'King Bed, Ocean View',
        ]);

        Room::create([
            'pencarian_id' => 2, // Pastikan ini juga ada
            'room_number' => '202',
            'room_type' => 'double',
            'price_per_night' => 150.00,
            'facilities' => 'Queen Bed, Pool View',
        ]);
    }
}
