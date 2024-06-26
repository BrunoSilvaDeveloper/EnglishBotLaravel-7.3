<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsuariosTableSeeder::class);
        $this->call(FrasesTableSeeder::class);
        $this->call(HistoriasTableSeeder::class);
        $this->call(AprenderSeeder::class);
    }
}
