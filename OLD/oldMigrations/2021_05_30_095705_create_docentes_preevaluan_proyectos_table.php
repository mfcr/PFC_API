<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocentesPreevaluanProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docentes_preevaluas_proyectos', function (Blueprint $table) {
            $table->unsignedBigInteger('proyecto_id');
            $table->unsignedBigInteger('docente_id');
            $table->boolean('estado')->nullable(); //usamos 3 estados. Null (no preevaluado), false (no aprobado), true (aprobado)
            $table->string('comentario',100); 
            $table->primary(array('proyecto_id','docente_id'),'pk_doc_preev_proy');
            $table->foreign('docente_id')->references('id')->on('docentes');
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
        Schema::dropIfExists('docente_preevalua_proyecto');
    }
}
