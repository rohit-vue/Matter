<?php

namespace Database\Factories;

use App\Models\ProductDevSeason;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductDevSeasonFactory extends Factory
{
    protected $model = ProductDevSeason::class;

    public function definition()
    {
        return [
            'status' => $this->faker->randomElement(['Confirmed', 'Planned', 'Requested', 'Shipped', 'Received', 'Commented', 'Cancelled', 'Internal Hold']),
            'sku' => $this->faker->unique()->lexify('SAT????'),
            'style_name' => $this->faker->words(2, true),
            'color' => $this->faker->colorName,
            'dev_stage' => $this->faker->randomElement(['Bulk', 'TOP', '1st Proto', 'SMS', 'PP']),
            'category' => $this->faker->randomElement(['Bottoms', 'Jackets', 'Shirting', 'Dresses', 'Jersey', 'Outerwear']),
            'mfg' => $this->faker->company,
            'mfg_stage' => $this->faker->randomElement(['Patternmaking', 'Sewing', 'Cutting', 'Washing', 'Dyeing', 'Quality Control', 'Packing', 'Delivered']),
            'ship_date' => $this->faker->date,
            'updates_brand' => 'Waiting for edited Images',
            'updates_mfg' => 'Waiting for edited Images',
        ];
    }
}
