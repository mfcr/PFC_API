<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocentesTutIndivProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docentes_tut_indiv_proyectos', function (Blueprint $table) {
            $table->unsignedBigInteger('proyecto_id');
            $table->unsignedBigInteger('tut_indiv_id');
            $table->tinyInteger('notaPrevia')->nullable();
            $table->string('comentarioPrevio',100)->nullable();
            $table->tinyInteger('notaFinal')->nullable(); 
            $table->string('comentarioFinal',100)->nullable();
            $table->boolean('estado')->nullable(); //usamos 3 estados. Null (no preevaluado), false (no aprobado), true (aprobado)
            $table->string('comentario',100); 
            $table->primary(array('proyecto_id','tut_indiv_id'),'pk_tut_indiv_proy');
            $table->foreign('tut_indiv_id')->references('id')->on('docentes');
            $table->foreign('proyecto_id')->references('id')->on('proyectos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('docentes_tut_indiv_proyectos');
    }
}
