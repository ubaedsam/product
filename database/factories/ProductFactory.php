<?php

namespace Database\Factories;

use App\Models\Kategoris;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tahun_keluaran' => $this->faker->year('now'),
            'warna' => $this->faker->colorName(),
            'harga' => $this->faker->randomNumber(5),
            'kategori_id' => Kategoris::inRandomOrder()->first()->id,
        ];
    }
}
