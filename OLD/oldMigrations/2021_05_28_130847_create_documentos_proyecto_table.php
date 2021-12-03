<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentosProyectoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos_proyecto', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('proy_id');
            $table->enum('tipoDocumento',['Proyecto Completo','Memoria','Imagen','Video','Anexo','Codigo','Otros']); 
            $table->string('descripcion',300);
            $table->string('UriDocumento',200);
            $table->foreign('proy_id')->references('id')->on('proyectos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documentos_proyecto');
    }
}
