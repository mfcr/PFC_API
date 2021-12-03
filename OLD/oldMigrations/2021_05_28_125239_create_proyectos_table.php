<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alumn_id');
            $table->string('ciclo_id',20);
            $table->smallInteger('curso');
            $table->unsignedBigInteger('tut_indiv_id');
            $table->smallInteger('estado'); //No se genera tabla con estados ya que no arreglaríamos nada, 
            //el comportamiento es dependiente del estado --> agregar estados necesariamente hay que modificar el código.
            $table->smallInteger('NotaFinal');
            //Datos para rellnear la propuesta
            $table->string('nombreProyecto',200);
            $table->string('tipoProyecto',100); //Enum: 'Desarrollo Software','Implantacion de sistemas', 'Otro'
            $table->longText('descProyecto');
            $table->longText('textoPropuestaProyecto');
            $table->longText('textoRequisitosFuncionales');
            $table->longText('textoModulosRelacionados');
            //$table->primary(array('alumn_id', 'ciclo_id','curso'),'pk_proy');
            $table->foreign('tut_indiv_id')->references('id')->on('docentes');
            $table->foreign('ciclo_id')->references('ciclo_id')->on('ciclos_formativos');
            $table->foreign('alumn_id')->references('id')->on('alumnado');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proyectos');
    }
}
