<?php

namespace App\Http\Controllers;

use App\Models\User; // Use singular form for the User model
use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function dashboard()
    {
        // Statistik untuk dashboard
        $totalUsers = User::count(); // Use singular form for the User model
        $totalBookings = Booking::count();
        $pendingBookings = Booking::where('payment_status', 'pending')->count();
        $totalRevenue = Booking::where('payment_status', 'success')->sum('total_price');

        // Booking terbaru
        $recentBookings = Booking::with(['user', 'room'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        // Statistik booking per bulan
        $bookingStats = Booking::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->pluck('total', 'month')
            ->toArray();

        // Mapping nama bulan
        $monthNames = [
            1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 
            4 => 'Apr', 5 => 'Mei', 6 => 'Jun',
            7 => 'Jul', 8 => 'Agu', 9 => 'Sep', 
            10 => 'Okt', 11 => 'Nov', 12 => 'Des'
        ];

        // Pastikan semua bulan memiliki data
        $completeBookingStats = [];
        foreach ($monthNames as $number => $name) {
            $completeBookingStats[$name] = $bookingStats[$number] ?? 0;
        }

        return view('admin.dashboard', [
            'totalUsers' => $totalUsers,
            'totalBookings' => $totalBookings,
            'pendingBookings' => $pendingBookings,
            'totalRevenue' => $totalRevenue,
            'recentBookings' => $recentBookings,
            'bookingStats' => $completeBookingStats
        ]);
    }
}