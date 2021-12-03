<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCiclosFormativosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ciclos_formativos', function (Blueprint $table) {
            $table->string('ciclo_id',20); //NOTA: los ciclos a distancia y presenciales se duplican. ej: DAW-presencial, DAW-distancia, ...
            $table ->string('nombreCiclo',200)->nullable();
            $table ->longText('descripcion')->nullable();
            $table->primary('ciclo_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ciclos_formativos');
    }
}
