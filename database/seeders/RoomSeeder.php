<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Room;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{
    public function run()
    {
        $rooms = [

            // Hotel The Phoenix Yogyakarta (ID 1)
            [
                'pencarian_id' => 1,
                'room_number' => '101',
                'room_type' => 'Suite',
                'price_per_night' => 250.00,
                'facilities' => 'King Bed, Ocean View, Balcony',
                'image_url' => 'https://cf.bstatic.com/xdata/images/hotel/max1024x768/123456.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pencarian_id' => 1,
                'room_number' => '102',
                'room_type' => 'Deluxe',
                'price_per_night' => 200.00,
                'facilities' => 'Queen Bed, Garden View',
                'image_url' => 'https://cf.bstatic.com/xdata/images/hotel/max1024x768/654321.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pencarian_id' => 1,
                'room_number' => '103',
                'room_type' => 'Standard',
                'price_per_night' => 150.00,
                'facilities' => 'Double Bed, City View',
                'image_url' => 'https://cf.bstatic.com/xdata/images/hotel/max1024x768/987654.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Hyatt Regency Yogyakarta (ID 2)
            [
                'pencarian_id' => 2,
                'room_number' => '201',
                'room_type' => 'Suite',
                'price_per_night' => 300.00,
                'facilities' => 'King Bed, Golf View, Balcony',
                'image_url' => 'https://cf.bstatic.com/xdata/images/hotel/max1024x768/111111.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pencarian_id' => 2,
                'room_number' => '202',
                'room_type' => 'Deluxe',
                'price_per_night' => 220.00,
                'facilities' => 'Queen Bed, Pool View',
                'image_url' => 'https://cf.bstatic.com/xdata/images/hotel/max1024x768/222222.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pencarian_id' => 2,
                'room_number' => '203',
                'room_type' => 'Standard',
                'price_per_night' => 180.00,
                'facilities' => 'Double Bed, Garden View',
                'image_url' => 'https://cf.bstatic.com/xdata/images/hotel/max1024x768/333333.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Royal Ambarrukmo Yogyakarta (ID 3)
            [
                'pencarian_id' => 3,
                'room_number' => '301',
                'room_type' => 'Suite',
                'price_per_night' => 270.00,
                'facilities' => 'King Bed, Heritage View',
                'image_url' => 'https://cf.bstatic.com/xdata/images/hotel/max1024x768/444444.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pencarian_id' => 3,
                'room_number' => '302',
                'room_type' => 'Deluxe',
                'price_per_night' => 230.00,
                'facilities' => 'Queen Bed, City View',
                'image_url' => 'https://cf.bstatic.com/xdata/images/hotel/max1024x768/555555.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pencarian_id' => 3,
                'room_number' => '303',
                'room_type' => 'Standard',
                'price_per_night' => 200.00,
                'facilities' => 'Double Bed, Garden View',
                'image_url' => 'https://cf.bstatic.com/xdata/images/hotel/max1024x768/666666.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Melia Purosani Yogyakarta (ID 4)
            [
                'pencarian_id' => 4,
                'room_number' => '401',
                'room_type' => 'Suite',
                'price_per_night' => 280.00,
                'facilities' => 'King Bed, Pool View, Spa Access',
                'image_url' => 'https://cf.bstatic.com/xdata/images/hotel/max1024x768/777777.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pencarian_id' => 4,
                'room_number' => '402',
                'room_type' => 'Deluxe',
                'price_per_night' => 240.00,
                'facilities' => 'Queen Bed, Balcony View',
                'image_url' => 'https://cf.bstatic.com/xdata/images/hotel/max1024x768/888888.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pencarian_id' => 4,
                'room_number' => '403',
                'room_type' => 'Standard',
                'price_per_night' => 210.00,
                'facilities' => 'Double Bed, Garden View',
                'image_url' => 'https://cf.bstatic.com/xdata/images/hotel/max1024x768/999999.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Hotel Lainnya Ditambahkan Secara Serupa...
        ];
            
        

        // Insert data kamar ke database
        Room::insert($rooms);
    }
}
