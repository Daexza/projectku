<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|string|min:2|max:100',
            'phone_number' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'email' => 'required|email|unique:users|max:100',
            'password' => 'required|string|min:8|confirmed',
            'terms' => 'accepted'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            $user = User::create([
                'full_name' => $request->full_name,
                'phone_number' => $request->phone_number ?? '',
                'address' => $request->address ?? '',
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            return redirect()->route('login')
                ->with('success', 'Registrasi berhasil! Silakan login.');
        } catch (\Exception $e) {
            Log::error('Registration Error: ' . $e->getMessage());
            
            return back()
                ->withErrors(['msg' => 'Registrasi gagal: ' . $e->getMessage()])
                ->withInput();
        }
    }
}