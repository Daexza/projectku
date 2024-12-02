<?php

namespace App\Http\Controllers;

use App\Models\User; // Import model User
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Untuk verifikasi password
use Illuminate\Support\Facades\Session; // Untuk menyimpan session pengguna

class LoginController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Ambil data pengguna dari database berdasarkan email
        $user = User::where('email', $request->email)->first(); // Menggunakan model User

        if ($user && Hash::check($request->password, $user->password)) {
            // Simpan informasi pengguna di session
            Session::put('user_id', $user->user_id);
            Session::put('full_name', $user->full_name);
            Session::put('role', $user->role);

            return redirect()->route('dashboard')->with('success', 'Login berhasil!');
        }

        // Jika gagal login
        return back()->withErrors(['email' => 'Email atau password salah.'])->withInput();
    }

    // Logout
    public function logout()
    {
        Session::flush(); // Hapus semua data session
        return redirect()->route('login')->with('success', 'Berhasil logout.');
    }
}
