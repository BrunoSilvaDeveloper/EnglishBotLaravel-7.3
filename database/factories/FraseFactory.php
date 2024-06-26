<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class FraseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $frase = $this->faker->name();
        return [
            'frase' => $frase,
            'traducao' => Str::slug($frase),
            'nivel' => rand(1, 5)
        ];
    }
}
