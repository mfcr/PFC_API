<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectosPropuestosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos_propuestos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',100)->nullable();
            $table->foreignId('ciclo_id')->nullable()->references('id')->on('ciclos')->cascadeOnUpdate()->nullOnDelete();
            $table->string('email',50);
            $table->longText('propuesta');
            $table->boolean('leido')->default(false); 
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
        Schema::dropIfExists('proyectos_propuestos');
    }
}
