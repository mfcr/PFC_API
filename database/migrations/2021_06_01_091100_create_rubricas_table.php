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
            $table->smallInteger('curso')->unsigned();
            $table->string('rubrica',200);
            $table->longText('descExcelente')->nullable();
            $table->longText('descBien')->nullable();
            $table->longText('descRegular')->nullable();
            $table->longText('descInsuficiente')->nullable();
            $table->float('porcentaje',4,2);
            $table->foreignId('ciclo_id')->nullable()->references('id')->on('ciclos')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('grupo_rubrica_id')->nullable()->references('Id')->on('grupo_rubricas')->cascadeOnUpdate()->nullOnDelete();

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
