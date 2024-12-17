<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

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
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Ambil data pengguna dari database berdasarkan email
        $user = User::where('email', $request->email)->first();

        // Cek apakah pengguna ditemukan dan password cocok
        if ($user && Hash::check($request->password, $user->password)) {
            // Simpan informasi pengguna di session
            Session::put('user_id', $user->user_id);
            Session::put('full_name', $user->full_name);
            Session::put('role', $user->role);

            // Redirect berdasarkan role
            switch ($user->role) {
                case 'admin':
                    return redirect()->route('dashboard.admin')->with('success', 'Login berhasil sebagai Admin!');
                case 'manager':
                    return redirect()->route('manager.dashboard')->with('success', 'Login berhasil sebagai Manager!');
                case 'user':
                default:
                    return redirect()->route('dashboard.index')->with('success', 'Login berhasil sebagai User!');
            }
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