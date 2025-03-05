<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Room;

class RoomFactory extends Factory
{
    protected $model = Room::class;

    public function definition()
    {
        return [
            'pencarian_id' => 1,
            'room_number' => $this->faker->unique()->numberBetween(100, 999),
            'room_type' => $this->faker->randomElement(['Deluxe', 'Standard', 'Suite']),
            'price_per_night' => $this->faker->numberBetween(100000, 500000),
        ];
    }
}
