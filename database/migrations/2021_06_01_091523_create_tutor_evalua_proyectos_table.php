<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTutorEvaluaProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutor_evalua_proyectos', function (Blueprint $table) {
            $table->id(); //Inicialmente la PK era otra pero Eloquent no maneja claves principales múltiples. Se añade clave autonumérica.
            $table->tinyInteger('nota')->unsigned()->nullable();
            $table->string('comentario',50)->nullable(); //Nota: Si vemos que este campo dispara ewl tamaño de la tabla --> tabla relacionando docente con proyecto y FK a tabla relacionando tb con linea rubrica
            $table->foreignId('docente_id')->nullable()->references('id')->on('docentes')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('proyecto_id')->nullable()->references('id')->on('proyectos')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('rubrica_id')->nullable()->references('id')->on('rubricas')->cascadeOnUpdate()->nullOnDelete();
            $table->boolean('esColectivo');
            $table->unique(array('proyecto_id', 'docente_id','rubrica_id','esColectivo'),'un_tut_eval_proyectos');       
            //Nota: anulado el Unique debido a que puede darse el caso de que el tutor individual y el colectivo sean los mismos para un proyecto.
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tutor_evalua_proyectos');
    }
}
