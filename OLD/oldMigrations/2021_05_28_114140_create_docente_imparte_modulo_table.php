<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocenteImparteModuloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docente_imparte_modulo', function (Blueprint $table) {
            $table->unsignedBigInteger('docente_id');
            $table->string('ciclo_id',20);
            $table->string('modulo_id',10);
            $table->smallInteger('curso');
            $table->primary(array('docente_id', 'modulo_id','ciclo_id','curso'),'pk_cod_imp_mod');
            $table->foreign('docente_id')->references('Id')->on('docentes');
            $table->foreign('ciclo_id')->references('ciclo_id')->on('ciclos_formativos');
            $table->foreign('modulo_id')->references('modulo_id')->on('modulos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('docente_imparte_modulo');
    }
}
