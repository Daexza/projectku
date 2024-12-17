<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    // Menampilkan dashboard admin
    public function adminDashboard()
    {
        // Cek apakah pengguna adalah admin
        if (Session::get('role') !== 'admin') {
            return redirect()->route('login')->withErrors(['access' => 'Anda tidak memiliki akses ke halaman ini.']);
        }

        return view('dashboard.admin'); // Ganti dengan view yang sesuai
    }

    // Menampilkan dashboard manager
    public function managerDashboard()
    {
        // Cek apakah pengguna adalah manager
        if (Session::get('role') !== 'manager') {
            return redirect()->route('login')->withErrors(['access' => 'Anda tidak memiliki akses ke halaman ini.']);
        }

        return view('manager.dashboard'); 
    }

    // Menampilkan dashboard user
    public function userDashboard()
    {
        // Cek apakah pengguna adalah user
        if (Session::get('role') !== 'user') {
            return redirect()->route('login')->withErrors(['access' => 'Anda tidak memiliki akses ke halaman ini.']);
        }

        return view('dashboard.index');
    }
}