<?php

namespace Database\Factories;
use App\Models\Bnb;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word . ' Room', // 隨機房間名稱
            'bnb_id' => Bnb::inRandomOrder()->first()->id, // 建立時關聯到一個隨機的 Bnb
        ];
    }
}
