<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EstadosProyecto;

class EstadosProyectoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


    	$estadosArray=['No Iniciado'=>0,
                    'Propuesta Presentada'=>1,
                    'Propuesta Aprobada'=>2,
                    'Proyecto Evaluado'=>3,
                    'Proyecto Aprobado'=>4,
                    'Proyecto Publicado'=>5,
                    'Propuesta no Valida'=>100,
                    'Proyecto Suspenso'=>150,
                    'Abandonado'=>200,
                    'Renuncia Convocatoria'=>175,
                    'Renuncia de Oficio'=>176];
        $estadosCodigo=[];
    	foreach($estadosArray as $k=>$v) {

	        $est=new EstadosProyecto();
	        $est->estado=$k;
            $est->codigo=$v;
	        $est->save();
	    }
    }
}

