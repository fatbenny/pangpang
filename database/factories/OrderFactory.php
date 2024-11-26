<?php

namespace Database\Factories;

use App\Models\Bnb;
use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'bnb_id' => Bnb::inRandomOrder()->first()->id, // 隨機關聯一個 Bnb
            'room_id' => Room::inRandomOrder()->first()->id, // 隨機關聯一個 Room
            'currency' => $this->faker->randomElement(['TWD', 'USD', 'JPY']), // 隨機選擇幣別
            'amount' => $this->faker->numberBetween(1000, 10000), // 隨機金額
            'check_in_date' => $this->faker->dateTimeBetween('2023-01-01', '2023-12-31'), // 2023 年的隨機日期
            'check_out_date' => $this->faker->dateTimeBetween('2023-01-01', '2023-12-31'), // 2023 年的隨機日期
            'created_at' => $this->faker->dateTimeBetween('2023-01-01', '2023-12-31'), // 隨機訂單時間，限定 2023 年
        ];
    }
}
