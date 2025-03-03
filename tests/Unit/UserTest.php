<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions; // Alternatif

class UserTest extends TestCase
{
    use DatabaseTransactions; // Menggunakan transaksi database agar data rollback setelah test selesai

    public function test_create_user()
    {
        // Arrange: Data uji
        $data = [
            'full_name' => 'Jane Doe',
            'email' => 'janedoe@example.com',
            'password' => bcrypt('password123')
        ];

        // Act: Membuat user
        $user = User::create($data);

        // Assert: Memeriksa apakah user berhasil dibuat
        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals('Jane Doe', $user->full_name);
        $this->assertDatabaseHas('users', ['email' => 'janedoe@example.com']);
    }
}