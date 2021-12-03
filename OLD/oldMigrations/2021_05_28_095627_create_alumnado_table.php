<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnado', function (Blueprint $table) {
            $table->id();
            $table->string('email',50);
            $table->string('dni',12)->nullable();
            $table->string('nombre',30);
            $table->string('apellido1',30);
            $table->string('apellido2',30)->nullable();
            $table->string('telefono',9)->nullable();
            $table->string('direccion',9)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnado');
    }
}
