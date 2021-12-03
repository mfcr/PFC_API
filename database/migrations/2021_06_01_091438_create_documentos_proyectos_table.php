<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentosProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos_proyectos', function (Blueprint $table) {
            $table->id();
            $table->enum('tipoDocumento',['Proyecto Completo','Memoria','Imagen','Video','Anexo','Codigo','Otros']); 
            $table->string('descripcion',300)->nullable();
            $table->string('UriDocumento',200)->nullable(); 
            $table->boolean('isFile');
            $table->boolean('publico')->default(true);
            $table->foreignId('proyecto_id')->nullable()->references('id')->on('proyectos')->cascadeOnUpdate()->nullOnDelete();
            $table->timestamps(); 
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documentos_proyectos');
    }
}
