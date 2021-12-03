<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docentes', function (Blueprint $table) {
            $table->id();
            $table->string('email',50)->unique();
            $table->string('dni',9)->nullable();
            $table->string('nombre',30)->nullable();
            $table->string('apellido1',30)->nullable();
            $table->string('apellido2',30)->nullable();
            $table->string('telefono',15)->nullable();
            $table->boolean('activo')->default(true);
            $table->boolean('isAdmin')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('docentes');
    }
}
