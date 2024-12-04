<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => [
                'required',
                'string',
                'max:255',
                'min:3',
                'regex:/^[A-Za-z\s]+$/'
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users,email'
            ],
            'password' => [
                'required',
                'string',
                'min:8', // Only minimum length requirement
                'confirmed' // Keep the confirmation requirement
            ],
            'terms' => ['accepted']
        ], [
            'name.regex' => 'Name should contain only letters and spaces',
            'terms.accepted' => 'You must agree to the terms and conditions'
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput($request->except(['password', 'password_confirmation']));
        }

        // Create the user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash the password
        ]);

        // Redirect or return a response after registration
        return redirect()->route('login')->with('success', 'Registration successful. You can now log in.');
    }
}
