<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class StockFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'stock' => $this->faker->randomNumber(2),
            'product_id' => Product::inRandomOrder()->first()->id,
        ];
    }
}
