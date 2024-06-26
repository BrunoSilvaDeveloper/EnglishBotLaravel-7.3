<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class UsuarioFactory extends Factory
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
            'nivel' => 'Básico',
            'number' => '2',
            'ultimo_comando' => '/Aprender',
            'frases_aprender' => 'Aprender',
            'letra' => 'D',
        ];
    }
}
