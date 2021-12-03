<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',100);
            $table->longText('descripcion')->nullable();
            $table->enum('tipo',['Recursos útiles','Información general','Legislación','Programas','Otros'])->default('Otros');
            $table->string('uri',200)->nullable();
            $table->boolean('isFile');
            $table->boolean('publico')->default(true);
            $table->timestamps();
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
        Schema::dropIfExists('documentos');
    }
}
