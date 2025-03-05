<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Booking;
use Illuminate\Support\Facades\Config;

class PembayaranTest extends TestCase
{
 

    /** @test */
    public function it_updates_booking_status_to_success_when_transaction_is_settlement()
    {
        // Simulasi booking
        $booking = Booking::factory()->create([
            'id' => 1,
            'payment_status' => 'pending',
        ]);

        // Simulasi data notifikasi dari Midtrans
        $notificationData = [
            'transaction_status' => 'settlement',
            'order_id' => 'ORDER-1',
        ];

        // Panggil endpoint Midtrans notification
        $response = $this->postJson('/midtrans/notification', $notificationData);

        // Pastikan respons berhasil
        $response->assertStatus(200)
            ->assertJson(['message' => 'Payment status updated']);

        // Pastikan status pembayaran diperbarui di database
        $this->assertDatabaseHas('bookings', [
            'id' => 1,
            'payment_status' => 'success',
        ]);
    }

    /** @test */
    public function it_updates_booking_status_to_failed_when_transaction_is_expired()
    {
        $booking = Booking::factory()->create([
            'id' => 2,
            'payment_status' => 'pending',
        ]);

        $notificationData = [
            'transaction_status' => 'expire',
            'order_id' => 'ORDER-2',
        ];

        $response = $this->postJson('/midtrans/notification', $notificationData);

        $response->assertStatus(200)
            ->assertJson(['message' => 'Payment status updated']);

        $this->assertDatabaseHas('bookings', [
            'id' => 2,
            'payment_status' => 'failed',
        ]);
    }

    /** @test */
    public function it_returns_404_if_booking_not_found()
    {
        $notificationData = [
            'transaction_status' => 'settlement',
            'order_id' => 'ORDER-99', // ID yang tidak ada di database
        ];

        $response = $this->postJson('/midtrans/notification', $notificationData);

        $response->assertStatus(404)
            ->assertJson(['message' => 'Booking not found']);
    }
}
