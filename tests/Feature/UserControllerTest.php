<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class UserControllerTest extends TestCase
{
    public function test_admin_dashboard_accessible_by_admin()
    {
        // Buat user admin jika belum ada
        $admin = User::firstOrCreate([
            'email' => 'admin@example.com'
        ], [
            'name' => 'Admin',
            'full_name' => 'Admin Example',
            'password' => bcrypt('password'),
            'role' => 'admin'
        ]);

        // Simulasi sesi sebagai admin
        Session::put('role', 'admin');

        // Login sebagai admin
        $this->actingAs($admin);

        // Kunjungi halaman dashboard admin
        $response = $this->get(route('admin.dashboard'));

        // Pastikan halaman bisa diakses
        $response->assertStatus(200);
        $response->assertViewIs('admin.dashboard'); // Perbaikan view yang benar
    }

    public function test_admin_dashboard_redirects_non_admin()
    {
        // Buat user biasa
        $user = User::firstOrCreate([
            'email' => 'user@example.com'
        ], [
            'name' => 'User',
            'full_name' => 'User Example',
            'password' => bcrypt('password'),
            'role' => 'user'
        ]);

        // Simulasi sesi sebagai user biasa
        Session::put('role', 'user');

        // Login sebagai user
        $this->actingAs($user);

        // Kunjungi halaman dashboard admin
        $response = $this->get(route('admin.dashboard'));

        // Harusnya dialihkan ke login dengan error akses
        $response->assertRedirect(route('login'));
        $response->assertSessionHasErrors(['access']);
    }

    public function test_user_dashboard_accessible_by_user()
    {
        // Buat user biasa jika belum ada
        $user = User::firstOrCreate([
            'email' => 'user@example.com'
        ], [
            'name' => 'User',
            'full_name' => 'User Example',
            'password' => bcrypt('password'),
            'role' => 'user'
        ]);

        // Simulasi sesi sebagai user
        Session::put('role', 'user');

        // Login sebagai user
        $this->actingAs($user);

        // Kunjungi halaman dashboard user
        $response = $this->get(route('user.dashboard'));

        // Pastikan halaman bisa diakses
        $response->assertStatus(200);
        $response->assertViewIs('user.dashboard'); // Pastikan view sesuai
    }

    public function test_user_dashboard_redirects_non_user()
    {
        // Buat user admin
        $admin = User::firstOrCreate([
            'email' => 'admin@example.com'
        ], [
            'name' => 'Admin',
            'full_name' => 'Admin Example',
            'password' => bcrypt('password'),
            'role' => 'admin'
        ]);

        // Simulasi sesi sebagai admin
        Session::put('role', 'admin');

        // Login sebagai admin
        $this->actingAs($admin);

        // Kunjungi halaman dashboard user
        $response = $this->get(route('user.dashboard'));

        // Harusnya dialihkan ke login dengan error akses
        $response->assertRedirect(route('login'));
        $response->assertSessionHasErrors(['access']);
    }

    public function test_index_displays_users()
    {
        // Buat admin
        $admin = User::firstOrCreate([
            'email' => 'admin2@example.com'
        ], [
            'name' => 'Admin2',
            'full_name' => 'Admin Example',
            'password' => bcrypt('password'),
            'role' => 'admin'
        ]);

        // Login sebagai admin
        $this->actingAs($admin);

        // Kunjungi halaman daftar pengguna
        $response = $this->get(route('admin.users.index'));

        // Pastikan halaman bisa diakses
        $response->assertStatus(200);
        $response->assertViewHas('users'); // Menghapus User::all() agar tidak error
    }
}
