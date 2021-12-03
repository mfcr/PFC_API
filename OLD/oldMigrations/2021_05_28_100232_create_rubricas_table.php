<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRubricasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rubricas', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('curso');
            $table->string('ciclo_id',20);
            $table->unsignedBigInteger('grupo_rubrica_id')->unsigned();
            $table->string('rubrica',200);
            $table->string('descExcelente',200)->nullable();
            $table->string('descBien',200)->nullable();
            $table->string('descRegular',200)->nullable();
            $table->string('descInsuficiente',200)->nullable();
            $table->smallInteger('porcentaje');
            $table->timestamps();
            $table->foreign('ciclo_id')->references('ciclo_id')->on('ciclos_formativos');
            $table->foreign('grupo_rubrica_id')->references('Id')->on('grupos_rubricas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rubricas');
    }
}
