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
            $table->string('ciclo_id',20)->nullable(); //Permite relaciones 0..1
            $table->string('nombre',100);
            $table->longText('descripción');
            $table->enum('tipo',['Recursos útiles','Información general','Legislación','Programas','Otros']);
            $table->timestamps();
            $table->foreign('ciclo_id')->references('ciclo_id')->on('ciclos_formativos');
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
