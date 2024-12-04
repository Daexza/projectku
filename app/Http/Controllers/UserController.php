<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'full_name' => 'required|string|max:255', // Pastikan full_name diisi
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Simpan data ke dalam tabel users
        User::create([
            'name' => $request->name,
            'full_name' => $request->full_name, // Mengisi kolom full_name
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash password
        ]);

        // Redirect atau memberikan respons setelah penyimpanan
        return response()->json(['message' => 'User  created successfully'], 201);
    }
}