<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTutoresEvaluanProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutores_evaluan_proyectos', function (Blueprint $table) {
            $table->unsignedBigInteger('proyecto_id');
            $table->unsignedBigInteger('tutor_id');
            $table->unsignedBigInteger('linea_rubrica_id');
            $table->tinyInteger('nota');
            $table->string('comentario',50); //Nota: Si vemos que este campo dispara ewl tamaño de la tabla --> tabla relacionando docente con proyecto y FK a tabla relacionando tb con linea rubrica
            $table->primary(array('proyecto_id','tutor_id','linea_rubrica_id'),'pk_tut_ev_proy');
            $table->foreign('tutor_id')->references('id')->on('docentes');
            $table->foreign('proyecto_id')->references('id')->on('proyectos');
            $table->foreign('linea_rubrica_id')->references('id')->on('rubricas');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('docente_evalua_proyecto');
    }
}
