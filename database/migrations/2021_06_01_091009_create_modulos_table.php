<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modulos', function (Blueprint $table) {
            $table->id(); //Inicialmente la PK era otra pero Eloquent trabaja mejor con claves autonuméricas.
            $table->string('codigoModulo',10)->unique();
            $table->string('nombreModulo',200);
            $table->boolean('tiene_UC')->default(true);
            $table->smallInteger('curso');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modulos');
    }
}
