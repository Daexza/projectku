<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Booking;
use App\Models\Room;

class BookingTest extends TestCase
{
    

    protected function setUp(): void
    {
        parent::setUp();

        // Buat room dengan room_number agar tidak error
        Room::factory()->create([
            'id' => 2,
            'pencarian_id' => 1,
            'room_number' => '101', // Tambahkan room_number
            'room_type' => 'Deluxe',
            'price_per_night' => 500000,
        ]);
    }

    /** @test */
    public function user_can_create_booking()
    {
        $response = $this->post('/bookings', [
            'pencarian_id' => 1,
            'room_id' => 2, // Gunakan room yang sudah dibuat
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'check_in' => now()->addDays(1)->toDateString(),
            'check_out' => now()->addDays(3)->toDateString(),
            'total_price' => 1000000,
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('bookings', ['name' => 'John Doe']);
    }

    /** @test */
    public function can_view_booking_list()
    {
        Booking::factory()->create([
            'pencarian_id' => 1,
            'room_id' => 2,
            'name' => 'Alice Doe',
            'email' => 'alice@example.com',
        ]);

        $response = $this->get('/bookings');

        $response->assertStatus(200)
                 ->assertSee('Alice Doe');
    }

    /** @test */
    public function can_view_booking_detail()
    {
        $booking = Booking::factory()->create([
            'pencarian_id' => 1,
            'room_id' => 2,
            'name' => 'Bob Smith',
            'email' => 'bob@example.com',
        ]);

        $response = $this->get("/bookings/{$booking->id}");

        $response->assertStatus(200)
                 ->assertSee('Bob Smith');
    }

    /** @test */
    public function can_delete_booking()
    {
        $booking = Booking::factory()->create([
            'pencarian_id' => 1,
            'room_id' => 2,
            'name' => 'Charlie Doe',
            'email' => 'charlie@example.com',
        ]);

        $response = $this->delete("/bookings/{$booking->id}");

        $response->assertStatus(200);
        $this->assertDatabaseMissing('bookings', ['name' => 'Charlie Doe']);
    }
}
