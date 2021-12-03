<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulosMatriculadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modulos_matriculados', function (Blueprint $table) {
            $table->id();; //Inicialmente la PK era otra pero Eloquent no maneja claves principales múltiples. Se añade clave autonumérica.
            $table->foreignId('ciclo_modulo_id')->nullable()->references('id')->on('ciclo_modulos')->cascadeOnUpdate()->nullOnDelete();

            //$table->foreignId('modulo_id')->nullable()->references('id')->on('modulos')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('proyecto_id')->nullable()->references('id')->on('proyectos')->cascadeOnUpdate()->nullOnDelete();
            $table->unique(array('proyecto_id', 'ciclo_modulo_id'),'un_detalle_matric');         
            //$table->unique(array('proyecto_id', 'modulo_id'),'un_detalle_matric');         
            $table->enum('estado',['Superado', 'Convalidado','Exento', 'Solicitado convalidación', 'Matriculado', 'No Matriculado'])->default('No Matriculado');
            $table->boolean('preevaluado')->nullable(); //usamos 3 estados. Null (no preevaluado), false (no aprobado), true (aprobado)
            $table->string('comentario',100)->nullable(); 
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modulos_matriculados');
    }
}
