<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AutentifikasiTest extends TestCase
{
    /** @test */
    public function user_can_register_successfully()
    {
        $response = $this->post('/register', [
            'full_name' => 'Test User',
            'phone_number' => '08123456789',
            'address' => 'Jl. Testing No. 123',
            'email' => 'testuser@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
            'terms' => 'on', // Harus diterima
            'role' => 'user', // Role yang tersedia
        ]);

        $response->assertRedirect('/login'); // Pastikan redirect ke login
        $this->assertDatabaseHas('users', ['email' => 'testuser@example.com']);
    }

    /** @test */
    public function user_cannot_register_with_invalid_data()
    {
        $response = $this->post('/register', [
            'full_name' => '',
            'email' => 'invalid-email',
            'password' => 'short',
            'password_confirmation' => 'different',
        ]);

        $response->assertSessionHasErrors(['full_name', 'email', 'password']);
    }

    /** @test */
    public function user_can_login_with_correct_credentials()
    {
        // Buat pengguna di database
        $user = User::create([
            'full_name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => Hash::make('password123'),
            'role' => 'user',
        ]);

        // Coba login
        $response = $this->post('/login', [
            'email' => 'testuser@example.com',
            'password' => 'password123',
        ]);

        $response->assertRedirect(route('pencarian.index')); // Redirect sesuai role user
        $this->assertAuthenticatedAs($user);
    }

    /** @test */
    public function user_cannot_login_with_wrong_password()
    {
        $user = User::create([
            'full_name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => Hash::make('password123'),
            'role' => 'user',
        ]);

        $response = $this->post('/login', [
            'email' => 'testuser@example.com',
            'password' => 'wrongpassword',
        ]);

        $response->assertSessionHasErrors(['email']); // Pastikan error ditampilkan
        $this->assertGuest(); // Pastikan user tidak login
    }

    /** @test */
    public function user_can_logout_successfully()
    {
        // Buat pengguna dan login
        $user = User::create([
            'full_name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => Hash::make('password123'),
            'role' => 'user',
        ]);

        $this->actingAs($user);
        $response = $this->post('/logout');

        $response->assertRedirect(route('login')); // Pastikan redirect ke login
        $this->assertGuest(); // Pastikan user sudah logout
    }
}
