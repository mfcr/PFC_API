<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCiclosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ciclos', function (Blueprint $table) {
            $table->id(); //Inicialmente la PK era otra pero Eloquent trabaja mejor con claves autonuméricas.
            $table->string('codigoCiclo',20)->unique(); //NOTA: los ciclos a distancia y presenciales se duplican. ej: DAW-presencial, DAW-distancia, ...
            $table ->string('nombreCiclo',200);
            $table ->longText('descripcion')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ciclos');
    }
}
