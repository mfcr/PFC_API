<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnadoMatriculaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnado_matricula', function (Blueprint $table) {
            $table->unsignedBigInteger('alumn_id');
            $table->string('modulo_id',10);
            $table->string('ciclo_id',20);
            $table->smallInteger('curso');
            $table->enum('estado',['Superado', 'Convalidado','Exento', 'Solicitado convalidación', 'Matriculado', 'No Matriculado']);
            $table->timestamps();
            $table->foreign('modulo_id')->references('modulo_id')->on('modulos');
            $table->foreign('ciclo_id')->references('ciclo_id')->on('ciclos_formativos');
            $table->foreign('alumn_id')->references('Id')->on('alumnado');
            $table->primary(array('alumn_id','curso','ciclo_id', 'modulo_id'),'pk_alum_matric');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnado_matricula');
    }
}
