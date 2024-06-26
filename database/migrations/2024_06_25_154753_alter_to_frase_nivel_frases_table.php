<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Frase;
use Illuminate\Support\Facades\DB;

class AlterToFraseNivelFrasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('frases', function (Blueprint $table) {
            $nivelFrase = array_keys(Frase::NIVEL_FRASE);
            $nivelFraseString = array_map(function($value){
                return "'$value'";
            },$nivelFrase);
            $nivelFraseEnum = implode(',',$nivelFraseString);
            DB::statement("ALTER TABLE frases CHANGE COLUMN nivel nivel ENUM($nivelFraseEnum) NULL");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('frases', function (Blueprint $table) {
            $nivelFrase = array_keys(Frase::NIVEL_FRASE);
            $nivelFraseString = array_map(function($value){
                return "'$value'";
            },$nivelFrase);
            $nivelFraseEnum = implode(',',$nivelFraseString);
            DB::statement("ALTER TABLE frases CHANGE COLUMN nivel nivel ENUM($nivelFraseEnum) NOT NULL");
        });
    }
}
