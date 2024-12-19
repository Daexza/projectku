<?php

namespace App\Http\Controllers;

use App\Models\User; // Import the User model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    // Menampilkan dashboard admin
    public function adminDashboard()
    {
        if (Session::get('role') !== 'admin') {
            return redirect()->route('login')->withErrors(['access' => 'Anda tidak memiliki akses ke halaman ini.']);
        }

        return view('dashboard.admin'); // Ganti dengan view yang sesuai
    }

    

    // Menampilkan dashboard user
    public function userDashboard()
    {
        if (Session::get('role') !== 'user') {
            return redirect()->route('login')->withErrors(['access' => 'Anda tidak memiliki akses ke halaman ini.']);
        }

        return view('dashboard.index');
    }

    // Menampilkan daftar pengguna
    public function index()
    {
        // Ambil semua pengguna dari database
        $users = User::all(); // Pastikan Anda mengimpor model User
        return view('admin.user.index', compact('users'));
    }
}