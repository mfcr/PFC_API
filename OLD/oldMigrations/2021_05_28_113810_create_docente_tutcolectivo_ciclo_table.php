<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocenteTutcolectivoCicloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docente_tutcolectivo_ciclo', function (Blueprint $table) {
            $table->unsignedBigInteger('docente_id');
            $table->string('ciclo_id',20);
            $table->smallInteger('curso');
            $table->primary(array('docente_id', 'ciclo_id','curso'));
            $table->foreign('docente_id')->references('Id')->on('docentes');
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
        Schema::dropIfExists('docente_tutcolectivo_ciclo');
    }
}
