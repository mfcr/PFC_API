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
            $table->unsignedBigInteger('proy_id');
            $table->unsignedBigInteger('alumn_id')->nullable();
            $table->unsignedBigInteger('tut_id')->nullable();
            $table->string('cabecera',100);
            $table->longText('cuerpo');
            //$table->string('urifichero',255); //Por ahora no complicamos aquí.
            $table->boolean('leido')->default(false);
            $table->foreign('proy_id')->references('id')->on('proyectos');
            $table->foreign('alumn_id')->references('id')->on('alumnado');
            $table->foreign('tut_id')->references('id')->on('docentes');
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
