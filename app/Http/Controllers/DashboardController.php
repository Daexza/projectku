<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking; // Model Booking

class DashboardController extends Controller
{
    public function index()
    {
        // Data booking
        $bookings = Booking::latest()->limit(5)->get();
        $bookings = \DB::table('bookings')->get();
        $bookings = Booking::with('accommodation')->get();  // Mengambil relasi dengan model Accommodation

        // Pesan selamat datang
        $welcomeMessage = "Welcome to your dashboard!";

        return view('dashboard.index', compact('bookings', 'welcomeMessage'));
    }
}

