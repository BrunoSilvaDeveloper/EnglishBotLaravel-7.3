<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Historia;
use Illuminate\Support\Facades\DB;

class AlterToHistoriaNivelHistoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('historias', function (Blueprint $table) {
            $nivelHistoria = array_keys(Historia::NIVEL_HISTORIA);
            $nivelHistoriaString = array_map(function($value){
                return "'$value'";
            },$nivelHistoria);
            $nivelHistoriaEnum = implode(',',$nivelHistoriaString);
            DB::statement("ALTER TABLE historias CHANGE COLUMN nivel nivel ENUM($nivelHistoriaEnum) NULL");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('historias', function (Blueprint $table) {
            $nivelHistoria = array_keys(Historia::NIVEL_HISTORIA);
            $nivelHistoriaString = array_map(function($value){
                return "'$value'";
            },$nivelHistoria);
            $nivelHistoriaEnum = implode(',',$nivelHistoriaString);
            DB::statement("ALTER TABLE historias CHANGE COLUMN nivel nivel ENUM($nivelHistoriaEnum) NOT NULL");
        });
    }
}
