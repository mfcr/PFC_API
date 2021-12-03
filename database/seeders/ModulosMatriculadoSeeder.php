<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Proyecto;
use App\Models\ModulosMatriculado;
use App\Models\CicloModulo;
use App\Models\Alumno;

class ModulosMatriculadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

		$estados=['Superado', 'Convalidado','Exento', 'Solicitado convalidación', 'Matriculado', 'No Matriculado'];
        $proyectos=Proyecto::all();

        foreach ($proyectos as $proy) { //añadimos 1 registro por asignatura (modulo) del ciclo
        	$modulos=CicloModulo::where('ciclo_id',$proy->ciclo_id)->get();
        	foreach ($modulos as $m) {
	        	//solo preevaluaciones de proyectos con id >=4, el 5 solo parcialmente y si >=6 todos aptos (preproyecto aprobado)
	    		$valoracion=true;
	    		$valorar=true;
	    		if ($proy->id<=3) {$valorar=false;} //proyectos con id<3 no tienen valoraciones aun por no estar presentados.
	    		if ($proy->id<6 && rand(0,10)>=7) {$valoracion=false;} //El proyecto 4 y 5 aleatoriamente apto/no apto. el resto todos aptos
	    		if ($proy->id==5 && rand(0,10)>=7) { $valorar=false;}//El proyecto con id 5 tiene solo parte de los modulos preevaluados (70%)

	        	$nuevo=new ModulosMatriculado();
	        	$nuevo->proyecto_id=$proy->id;
	        	$nuevo->ciclo_modulo_id=$m->id;
	        	//$nuevo->modulo_id=$m->modulo_id;
	        	$nuevo->estado=$estados[rand(0,5)];
	    		if ($valorar) {
	    			$nuevo->preevaluado=$valoracion;
		    		if(rand(0,10)>5) {  //50% sigue asi, y del resto un 50% debes mejorar. un 25% sin comentarios.
		    			$nuevo->comentario='Sigue así';
		    		} elseif (rand(0,10)>5) { 
		    			$nuevo->comentario='Debes mejorar la presentacion';
		    		}
	    		}
				$nuevo->save();	        	

        	}
        }

    }
}
