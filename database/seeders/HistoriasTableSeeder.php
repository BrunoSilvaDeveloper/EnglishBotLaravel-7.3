<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Historia;

class HistoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('TRUNCATE TABLE historias'); // limpar a tabela sempre que rodar
        Historia::factory(100)->create();  // cria 100 registros fakes
    }
}
