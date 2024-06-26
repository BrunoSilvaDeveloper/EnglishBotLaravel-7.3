<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class HistoriaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $historia = $this->faker->paragraph();
        return [
            'historia' => $historia,
            'traducao' => Str::slug($historia),
            'nivel' => rand(1, 5)
        ];
    }
}
