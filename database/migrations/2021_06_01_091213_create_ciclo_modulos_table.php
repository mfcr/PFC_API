<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCicloModulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ciclo_modulos', function (Blueprint $table) {
            $table->id(); //Inicialmente la PK era otra pero Eloquent no maneja claves principales múltiples. Se añade clave autonumérica.
            $table->foreignId('modulo_id')->nullable()->references('id')->on('modulos')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('ciclo_id')->nullable()->references('id')->on('ciclos')->cascadeOnUpdate()->nullOnDelete();
            $table->unique(array('modulo_id','ciclo_id'));       
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ciclo_modulo');
    }
}
