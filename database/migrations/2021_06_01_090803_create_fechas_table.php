<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFechasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fechas', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('curso');
            $table->string('nombre',100);
            $table->tinyInteger('diasParaAviso')->default(7); //Dias antes de la fecha limite en la que se enviara el email si marcado.
            $table->longText('descripcion')->nullable();
            $table->boolean('enviar')->default(true);
            $table->date('fechaLimite');
            $table->boolean('enviado')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fechas');
    }
}
