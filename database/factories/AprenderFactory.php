<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AprenderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titulo' => $this->faker->sentence,
            'descricao' => $this->faker->paragraph,
            'imagem' => null, // Aqui você pode definir a lógica para gerar imagens falsas se necessário
            'rota' => 'aprender.index', // Substitua 'nome_da_rota' pelo nome da rota desejada
        ];
    }
}
