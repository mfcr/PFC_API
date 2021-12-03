<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMensajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensajes', function (Blueprint $table) {
            $table->id();
            $table->boolean('alum_a_tut')->default(false); //true si mensaje de alumno a tutor, false si tutor a alumno.
            $table->string('cabecera',100);
            $table->longText('cuerpo');
            //$table->string('urifichero',255); //Por ahora no complicamos aquí.
            $table->boolean('leido')->default(false);
            $table->foreignId('proyecto_id')->nullable()->references('id')->on('proyectos')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('alumno_id')->nullable()->references('id')->on('alumnos')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('docente_id')->nullable()->references('id')->on('docentes')->cascadeOnUpdate()->nullOnDelete();
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mensajes');
    }
}
