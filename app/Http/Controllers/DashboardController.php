<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking; // Model Booking
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Data booking terbaru dengan relasi pencarian dan room
        $bookings = Booking::with(['pencarian', 'room'])->get();

        // Pesan selamat datang
        $welcomeMessage = "Welcome to your dashboard!";

        return view('dashboard.index', compact('bookings', 'welcomeMessage'));
    }
}
