<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KategorisFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->name(50),
            'deskripsi' => $this->faker->text(200)
        ];
    }
}
