<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Pencarian;
use App\Models\Room;
use Illuminate\Support\Facades\DB;

class PencarianTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        
        // Menonaktifkan foreign key checks sebelum truncate
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Pencarian::truncate();
        Room::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    /** @test */
    public function user_can_view_pencarian_list()
    {
        Pencarian::factory()->count(3)->create();

        $response = $this->get('/pencarian');

        $response->assertStatus(200)
                 ->assertSee(Pencarian::first()->name);
    }

    /** @test */
    public function user_can_search_pencarian_by_name()
    {
        $pencarian = Pencarian::factory()->create(['name' => 'Hotel Bintang Lima']);

        $response = $this->get('/pencarian?search=Hotel Bintang Lima');

        $response->assertStatus(200)
                 ->assertSee('Hotel Bintang Lima');
    }

    /** @test */
    public function user_can_view_detail_pencarian()
    {
        $pencarian = Pencarian::factory()->create();

        $response = $this->get('/pencarian/' . $pencarian->id);

        $response->assertStatus(200)
                 ->assertSee($pencarian->name);
    }

    /** @test */
    public function user_can_view_available_rooms()
    {
        $pencarian = Pencarian::factory()->create();
        Room::factory()->count(2)->create(['pencarian_id' => $pencarian->id]);

        $response = $this->get('/pencarian/' . $pencarian->id . '/rooms');

        $response->assertStatus(200)
                 ->assertSee(Room::first()->name);
    }

    /** @test */
    public function it_can_update_room_prices()
    {
        $room = Room::factory()->create(['price' => 500000]);

        $response = $this->put('/rooms/' . $room->id, ['price' => 600000]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('rooms', ['id' => $room->id, 'price' => 600000]);
    }
}
