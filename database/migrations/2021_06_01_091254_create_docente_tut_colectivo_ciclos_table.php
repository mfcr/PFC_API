<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocenteTutColectivoCiclosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docente_tut_colectivo_ciclos', function (Blueprint $table) {
            $table->id(); //Inicialmente la PK era otra pero Eloquent no maneja claves principales múltiples. Se añade clave autonumérica.
            $table->smallInteger('curso')->unsigned();
            $table->unique(array('docente_id','ciclo_id','curso'),'un_doc_tut_colec_ciclos');       
            $table->foreignId('docente_id')->nullable()->references('id')->on('docentes')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('ciclo_id')->nullable()->references('id')->on('ciclos')->cascadeOnUpdate()->nullOnDelete();

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('docente_tut_colectivo_ciclos');
    }
}
