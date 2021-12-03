<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocenteImparteModulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docente_imparte_modulos', function (Blueprint $table) {
            $table->id(); //Inicialmente la PK era otra pero Eloquent no maneja claves principales múltiples. Se añade clave autonumérica.
            $table->smallInteger('curso')->unsigned();
            $table->foreignId('docente_id')->nullable()->references('Id')->on('docentes')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('ciclo_modulo_id')->nullable()->references('id')->on('ciclo_modulos')->cascadeOnUpdate()->nullOnDelete();
            $table->unique(array('docente_id', 'ciclo_modulo_id','curso'),'un_doc_imparte_modulos'); 

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('docente_imparte_modulos');
    }
}
