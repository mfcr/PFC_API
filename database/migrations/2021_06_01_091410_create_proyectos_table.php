<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->id();

            $table->smallInteger('curso')->unsigned();
            $table->foreignId('ciclo_id')->nullable()->references('id')->on('ciclos')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignID('alumno_id')->nullable()->references('id')->on('alumnos')->cascadeOnUpdate()->nullOnDelete();
            $table->unique(array('alumno_id', 'ciclo_id','curso'),'un_alum_matric');         


            $table->tinyInteger('notaPrevia')->nullable()->unsigned(); //note previa del tutor individual
            $table->string('comentarioPrevio',100)->nullable(); //comentario de la nota previa del tutor individual
            $table->tinyInteger('NotaFinal')->unsigned()->nullable(); //Calculada como la media entre las notas del tutor individual y del colectivo y editable.

            //Datos para rellnear la propuesta
            $table->string('nombreProyecto',200)->nullable();
            $table->string('descTipo',60)->nullable(); //Descripcion o aclaración del tipo de proyecto o si escoje Otros.

            $table->longText('textoPropuestaProyecto')->nullable();
            $table->longText('textoRequisitosFuncionales')->nullable();
            $table->longText('textoModulosRelacionados')->nullable();
            $table->unsignedBigInteger('docente_id')->nullable();
            $table->foreign('docente_id')->nullable()->references('id')->on('docentes')->cascadeOnUpdate()->nullOnDelete();
            $table->unsignedBigInteger('tipo_proyecto_id')->nullable();
            $table->foreign('tipo_proyecto_id','fk_tipoProy')->nullable()->references('id')->on('tipo_proyectos')->cascadeOnUpdate()->nullOnDelete();

            $table->integer('estado')->default(0); 
            


        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proyectos');
    }
}
