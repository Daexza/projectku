<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    // Show the registration form
    public function showRegistrationForm()
    {
        return view('auth.register'); // Ensure this view has a role selection
    }

    // Handle the registration
    public function register(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|string|min:2|max:100',
            'phone_number' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255', // Added max length for address
            'email' => 'required|email|unique:users|max:100',
            'password' => 'required|string|min:8|confirmed',
            'terms' => 'accepted',
            'role' => 'required|in:admin,manager,user', // Validate role
        ]);

        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            // Create a new user
            $user = User::create([
                'full_name' => $request->full_name,
                'phone_number' => $request->phone_number,
                'address' => $request->address,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role, // Assign the role
            ]);

            // Redirect to login with success message
            return redirect()->route('login')
                ->with('success', 'Registrasi berhasil! Silakan login.');
        } catch (\Exception $e) {
            // Log the error and redirect back with an error message
            Log::error('Registration Error: ' . $e->getMessage());
            
            return back()
                ->withErrors(['msg' => 'Registrasi gagal: ' . $e->getMessage()])
                ->withInput();
        }
    }
}