<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductdevSeason;

class ProductdevSeasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductdevSeason::factory()->count(25)->create();
    }
}
