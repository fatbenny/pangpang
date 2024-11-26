<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bnb;
use App\Models\Room;
use App\Models\Order;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Bnb::factory(30)->create();
        Room::factory(300)->create();
        Order::factory(2500)->create();
    }
}
