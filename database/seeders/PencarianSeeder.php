<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pencarian;

class PencarianSeeder extends Seeder
{
    public function run()
    {
        // Data Yogyakarta
        Pencarian::create([
            'name' => 'Hotel The Phoenix Yogyakarta',
            'description' => 'Hotel bersejarah dengan fasilitas modern.',
            'latitude' => -7.7829,
            'longitude' => 110.3671,
            'phone_number' => '0274567890',
            'facilities' => 'Kolam renang, Wi-Fi gratis, Restoran',
            'rating' => 4.7,
            'image_url' => 'https://i.pinimg.com/236x/94/84/dd/9484dd1a8d93f90b616e025f8da3430.jpg',
        ]);

        Pencarian::create([
            'name' => 'Hyatt Regency Yogyakarta',
            'description' => 'Resor luas dengan lapangan golf dan pemandangan hijau.',
            'latitude' => -7.7470,
            'longitude' => 110.3617,
            'phone_number' => '0274888888',
            'facilities' => 'Lapangan golf, Kolam renang, Spa',
            'rating' => 4.8,
            'image_url' => 'https://i.pinimg.com/236x/a7/32/c8/a732c86f8d67590f9a228d527b2ad136.jpg',
        ]);

        Pencarian::create([
            'name' => 'Royal Ambarrukmo Yogyakarta',
            'description' => 'Hotel mewah dengan sentuhan budaya Jawa.',
            'latitude' => -7.7823,
            'longitude' => 110.4086,
            'phone_number' => '0274581234',
            'facilities' => 'Pusat kebugaran, Kolam renang, Restoran',
            'rating' => 4.9,
            'image_url' => 'https://i.pinimg.com/236x/ba/6b/c9/ba6bc96d0e0f2c5a8e3ea99cc8c17f14.jpg',
        ]);

        Pencarian::create([
            'name' => 'Melia Purosani Yogyakarta',
            'description' => 'Hotel bintang lima dengan fasilitas lengkap.',
            'latitude' => -7.7995,
            'longitude' => 110.3644,
            'phone_number' => '0274593210',
            'facilities' => 'Spa, Kolam renang, Restoran',
            'rating' => 4.6,
            'image_url' => 'https://i.pinimg.com/236x/4e/56/ef/4e56efea865e327c7b55d6636bb14550.jpg',
        ]);

        Pencarian::create([
            'name' => 'Amaris Hotel Malioboro',
            'description' => 'Hotel budget dekat Malioboro.',
            'latitude' => -7.7924,
            'longitude' => 110.3653,
            'phone_number' => '02744567890',
            'facilities' => 'Wi-Fi gratis, Restoran, Parkir',
            'rating' => 4.3,
            'image_url' => 'https://i.pinimg.com/236x/2b/39/72/2b3972c97c67499c79e77f8f98e2ff23.jpg',
        ]);

        Pencarian::create([
            'name' => 'Hotel Tentrem Yogyakarta',
            'description' => 'Hotel mewah dengan fasilitas spa terbaik.',
            'latitude' => -7.7760,
            'longitude' => 110.3798,
            'phone_number' => '0274887766',
            'facilities' => 'Spa, Kolam renang, Gym',
            'rating' => 4.8,
            'image_url' => 'https://i.pinimg.com/236x/f3/12/67/f31267ff43b2db3b1fd52cd07dd6ef08.jpg',
        ]);

        Pencarian::create([
            'name' => 'Jogja Village Resort',
            'description' => 'A beautiful resort with a touch of Javanese culture.',
            'latitude' => -7.797068,
            'longitude' => 110.370529,
            'phone_number' => '08123456789',
            'facilities' => 'Swimming Pool, Free WiFi, Breakfast',
            'rating' => 4.7,
            'image_url' => 'https://i.pinimg.com/236x/94/84/4d/9484dd1a8d93f9d0b616e025f8da3430.jpg',
        ]);

        // Data Bali
        Pencarian::create([
            'name' => 'Bali Villa with Garden View',
            'description' => 'Villa indah dengan pemandangan taman tropis.',
            'latitude' => -8.409518,
            'longitude' => 115.188919,
            'phone_number' => '08123456789',
            'facilities' => 'Kolam Renang, WiFi Gratis, Taman',
            'rating' => 4.9,
            'image_url' => 'https://i.pinimg.com/236x/fd/11/a1/fd11a1f831ab9e974495c293d2fbf99.jpg',
        ]);

        Pencarian::create([
            'name' => 'Bali Beachfront Resort',
            'description' => 'Resort mewah dengan pemandangan pantai langsung.',
            'latitude' => -8.412345,
            'longitude' => 115.200123,
            'phone_number' => '08129876543',
            'facilities' => 'Pantai Pribadi, Kolam Renang Infinity, Spa',
            'rating' => 4.8,
            'image_url' => 'https://i.pinimg.com/236x/47/89/fd/4789fd021e0f1814d7f31d6260702b86.jpg',
        ]);

        Pencarian::create([
            'name' => 'Bali Tropical Resort',
            'description' => 'Resort tropis dengan kamar luas dan pemandangan laut.',
            'latitude' => -8.421234,
            'longitude' => 115.201567,
            'phone_number' => '08134567890',
            'facilities' => 'Kolam Renang, Restoran, Spa',
            'rating' => 4.7,
            'image_url' => 'https://i.pinimg.com/236x/20/63/a2/2063a2e8831471b055ac707f60fa22c.jpg',
        ]);

        Pencarian::create([
            'name' => 'Ubud Luxury Villa',
            'description' => 'Villa nyaman di Ubud dengan suasana tenang.',
            'latitude' => -8.500123,
            'longitude' => 115.273456,
            'phone_number' => '08127894567',
            'facilities' => 'Kolam Renang, WiFi Gratis, Sarapan',
            'rating' => 4.9,
            'image_url' => 'https://i.pinimg.com/236x/60/59/aa/6059aa39b6978d0b04903dcaf7c63111.jpg',
        ]);

        Pencarian::create([
            'name' => 'Bali Private Pool Villa',
            'description' => 'Villa eksklusif dengan kolam renang pribadi.',
            'latitude' => -8.409900,
            'longitude' => 115.222345,
            'phone_number' => '08124567890',
            'facilities' => 'Kolam Renang Pribadi, AC, Dapur Lengkap',
            'rating' => 4.8,
            'image_url' => 'https://i.pinimg.com/236x/8b/07/ee/8b07ee3caeba65a7075bbf1840c18e7.jpg',
        ]);

        Pencarian::create([
            'name' => 'Nusa Dua Water Villa',
            'description' => 'Villa indah dengan akses langsung ke air.',
            'latitude' => -8.800234,
            'longitude' => 115.225678,
            'phone_number' => '08125678901',
            'facilities' => 'Kolam Renang, Akses Air, Sarapan',
            'rating' => 4.8,
            'image_url' => 'https://i.pinimg.com/736x/7a/86/2e/7a8622e9ba33beb69ecd4049abb7173.jpg',
        ]);

        Pencarian::create([
            'name' => 'Bali Garden Resort',
            'description' => 'Resort keluarga dengan taman hijau luas.',
            'latitude' => -8.350678,
            'longitude' => 115.267890,
            'phone_number' => '08123456789',
            'facilities' => 'Kolam Renang, Restoran, WiFi Gratis',
            'rating' => 4.6,
            'image_url' => 'https://i.pinimg.com/735x/cf/ae/d2/cfaed213f4c3a89f93a6c2e52402010.jpg',
        ]);

        // Data Labuan Bajo
        Pencarian::create([
            'name' => 'Labuan Bajo Resort 1',
            'description' => 'Resort indah dengan kolam renang dan pemandangan laut.',
            'latitude' => -8.489300,
            'longitude' => 119.872400,
            'phone_number' => '081234567891',
            'facilities' => 'Kolam Renang, Restoran, Pemandangan Laut',
            'rating' => 4.7,
            'image_url' => 'https://i.pinimg.com/736x/02/e5/e4/02e5e419ddc74fc711ba9949d0aa0d5.jpg',
        ]);

        Pencarian::create([
            'name' => 'Labuan Bajo Villa 2',
            'description' => 'Villa mewah dengan pemandangan tropis.',
            'latitude' => -8.499000,
            'longitude' => 119.870123,
            'phone_number' => '081298765432',
            'facilities' => 'Kolam Renang, Akses WiFi, Sarapan Gratis',
            'rating' => 4.8,
            'image_url' => 'https://i.pinimg.com/736x/89/10/81/891081e888e2636e02c9c72ca2927bd1.jpg',
        ]);

        Pencarian::create([
            'name' => 'Labuan Bajo Ocean Villa 3',
            'description' => 'Villa eksklusif dengan fasilitas bintang 5.',
            'latitude' => -8.485600,
            'longitude' => 119.875800,
            'phone_number' => '081234567899',
            'facilities' => 'Spa, Kolam Renang, WiFi Cepat',
            'rating' => 4.9,
            'image_url' => 'https://i.pinimg.com/736x/94/75/24/947524d0cb9f578bbdcb63f64c97589.jpg',
        ]);

        Pencarian::create([
            'name' => 'Labuan Bajo Luxury Resort 4',
            'description' => 'Resort tropis dengan kamar suite modern.',
            'latitude' => -8.487600,
            'longitude' => 119.877100,
            'phone_number' => '081345678900',
            'facilities' => 'Suite Mewah, Restoran, Pemandangan Pantai',
            'rating' => 4.8,
            'image_url' => 'https://i.pinimg.com/736x/31/1a/09/311a09987462cd5729a1404040a2a971.jpg',
        ]);

        Pencarian::create([
            'name' => 'Labuan Bajo Pool Villa 5',
            'description' => 'Villa dengan kolam renang pribadi dan taman.',
            'latitude' => -8.492800,
            'longitude' => 119.873400,
            'phone_number' => '081212345678',
            'facilities' => 'Kolam Pribadi, Taman Asri, WiFi',
            'rating' => 4.7,
            'image_url' => 'https://i.pinimg.com/736x/a8/a8/eb/a8a8eb0b73e4511c56df3eb308657d82.jpg',
        ]);

        Pencarian::create([
            'name' => 'Labuan Bajo Sunset Villa 6',
            'description' => 'Villa dengan pemandangan matahari terbenam terbaik.',
            'latitude' => -8.495000,
            'longitude' => 119.880000,
            'phone_number' => '081333456789',
            'facilities' => 'Kolam Renang, Restoran, Spa',
            'rating' => 4.9,
            'image_url' => 'https://i.pinimg.com/736x/2d/f9/99/2df9997140483b2a22e513794b1aacd.jpg',
        ]);

        Pencarian::create([
            'name' => 'Labuan Bajo Paradise Resort 7',
            'description' => 'Resort bintang 5 dengan fasilitas lengkap.',
            'latitude' => -8.500100,
            'longitude' => 119.878900,
            'phone_number' => '081298765678',
            'facilities' => 'Kolam Renang, Bar, WiFi Gratis',
            'rating' => 4.8,
            'image_url' => 'https://i.pinimg.com/736x/3a/5a/2c/3a5a2c95871c8a1e8916d597c67f0.jpg',
        ]);
        // Data Jakarta
        Pencarian::create([
            'name' => 'Grand Hyatt Jakarta',
            'description' => 'Hotel mewah dengan pemandangan kota dan fasilitas lengkap.',
            'latitude' => -6.2088,
            'longitude' => 106.8456,
            'phone_number' => '0211234567',
            'facilities' => 'Kolam renang, Gym, Wi-Fi gratis, Restoran',
            'rating' => 4.5,
            'image_url' => 'https://i.pinimg.com/736x/ba/07/4b/ba074fb20e916723432ec1bb3df949ec.jpg',
        ]);

        Pencarian::create([
            'name' => 'The Ritz-Carlton Jakarta',
            'description' => 'Hotel elegan dengan berbagai fasilitas mewah dan lokasi strategis.',
            'latitude' => -6.2000,
            'longitude' => 106.8300,
            'phone_number' => '0212345678',
            'facilities' => 'Spa, Restoran, Wi-Fi gratis, Kolam renang',
            'rating' => 4.6,
            'image_url' => 'https://i.pinimg.com/736x/42/6d/0e/426d0e50bf0c67319cb37ef3fdd82b9f.jpg',
        ]);

        Pencarian::create([
            'name' => 'Mandarin Oriental Jakarta',
            'description' => 'Hotel bintang lima dengan desain mewah dan pelayanan terbaik.',
            'latitude' => -6.1745,
            'longitude' => 106.8190,
            'phone_number' => '0213456789',
            'facilities' => 'Kolam renang, Fitness Center, Restoran',
            'rating' => 4.7,
            'image_url' => 'https://i.pinimg.com/736x/4b/72/21/4b72215d4dc3f319b1f89e9ac7c0a484f.jpg',
        ]);

        Pencarian::create([
            'name' => 'Shangri-La Hotel Jakarta',
            'description' => 'Hotel mewah dengan taman luas dan berbagai pilihan kuliner.',
            'latitude' => -6.2089,
            'longitude' => 106.8457,
            'phone_number' => '0214567890',
            'facilities' => 'Taman, Restoran, Kolam renang, Spa',
            'rating' => 4.5,
            'image_url' => 'https://i.pinimg.com/736x/09/66/c5/0966c5293b81e8294ef33a8f63c97e.jpg',
        ]);

        Pencarian::create([
            'name' => 'Four Seasons Hotel Jakarta',
            'description' => 'Hotel mewah dengan layanan prima dan kolam renang luar ruangan.',
            'latitude' => -6.2500,
            'longitude' => 106.8500,
            'phone_number' => '0215678901',
            'facilities' => 'Kolam renang luar ruangan, Restoran, Fitness Center',
            'rating' => 4.6,
            'image_url' => 'https://i.pinimg.com/736x/cf/ae/d2/cfaed213f4c3a89f93a6c2e52402010.jpg',
        ]);

        Pencarian::create([
            'name' => 'InterContinental Jakarta Pondok Indah',
            'description' => 'Hotel premium di kawasan Pondok Indah dengan fasilitas lengkap.',
            'latitude' => -6.2900,
            'longitude' => 106.8600,
            'phone_number' => '0216789012',
            'facilities' => 'Kolam renang, Spa, Restoran, Fitness Center',
            'rating' => 4.7,
            'image_url' => 'https://i.pinimg.com/736x/8b/07/ee/8b07ee3caeba65a7075bbf1840c18e7.jpg',
        ]);

    }
}
