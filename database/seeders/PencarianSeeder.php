<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pencarian;

class PencarianSeeder extends Seeder
{
    public function run()
    {
        Pencarian::create([
            'name' => 'Luxury Villa Bali',
            'description' => 'Beautiful villa with private pool.',
            'latitude' => -8.409518,
            'longitude' => 115.188919,
            'phone_number' => '08123456789',
            'facilities' => 'Private Pool, WiFi, Breakfast',
            'rating' => 4.8,
            'image_url' => 'https://example.com/image1.jpg',
        ]);

        Pencarian::create([
            'name' => 'Beachside Resort',
            'description' => 'Resort by the beach with amazing views.',
            'latitude' => -8.700000,
            'longitude' => 115.400000,
            'phone_number' => '08129876543',
            'facilities' => 'Beach Access, Spa, Free Parking',
            'rating' => 4.5,
            'image_url' => 'https://example.com/image2.jpg',
        ]);
    }
}
