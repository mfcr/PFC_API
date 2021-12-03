<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulosCiclosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modulos_ciclos', function (Blueprint $table) {
            $table->string('ciclo_id',20);
            $table->string('modulo_id',10);
            $table->primary(array('ciclo_id', 'modulo_id'));
            $table->foreign('modulo_id')->references('modulo_id')->on('modulos');
            $table->foreign('ciclo_id')->references('ciclo_id')->on('ciclos_formativos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modulos_ciclos');
    }
}
