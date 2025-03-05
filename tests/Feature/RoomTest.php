<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Room;

class RoomTest extends TestCase
{
   

    /** @test */
    public function user_can_create_room()
    {
        $response = $this->post(route('admin.room.store'), [
            'room_number' => '101A',
            'room_type' => 'deluxe',
            'price_per_night' => 200000,
            'status' => 'available',
            'facilities' => ['WiFi', 'AC']
        ]);

        $response->assertRedirect(route('admin.room.room_list'));
        $this->assertDatabaseHas('rooms', ['room_number' => '101A']);
    }

    /** @test */
    public function user_can_view_room_list()
    {
        Room::factory()->create(['room_number' => '202B']);

        $response = $this->get(route('admin.room.room_list'));

        $response->assertStatus(200);
        $response->assertSee('202B');
    }

    /** @test */
    public function user_can_view_room_detail()
    {
        $room = Room::factory()->create();

        $response = $this->get(route('admin.room.detail', $room->id));

        $response->assertStatus(200);
        $response->assertSee($room->room_number);
    }

    /** @test */
    public function user_can_update_room()
    {
        $room = Room::factory()->create([
            'room_number' => '303C',
            'room_type' => 'standard',
            'price_per_night' => 150000,
            'status' => 'available'
        ]);

        $response = $this->put(route('admin.room.update', $room->id), [
            'room_number' => '303C',
            'room_type' => 'suite',
            'price_per_night' => 300000,
            'status' => 'occupied'
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('rooms', [
            'id' => $room->id,
            'room_type' => 'suite',
            'price_per_night' => 300000,
            'status' => 'occupied'
        ]);
    }

    /** @test */
    public function user_can_delete_room()
    {
        $room = Room::factory()->create();

        $response = $this->delete(route('admin.room.destroy', $room->id));

        $response->assertRedirect(route('admin.room.room_list'));
        $this->assertDatabaseMissing('rooms', ['id' => $room->id]);
    }
}
