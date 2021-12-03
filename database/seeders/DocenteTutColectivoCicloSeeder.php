<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ciclo;
use App\Models\Docente;
use App\Models\Proyecto;
use App\Models\DocenteTutColectivoCiclo;

class DocenteTutColectivoCicloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$ciclos=Ciclo::all();
    	$docentes=Docente::all();
    	$cursos=Proyecto::select('curso')->distinct()->get(); //Los años en los que hay proyectos (ahora mismo solo 2021)
    	foreach($cursos as $cur) {
    		foreach ($ciclos as $c) {
    			$nuevo=new DocenteTutColectivoCiclo();
    			$nuevo->docente_id=$docentes[rand(0,sizeof($docentes)-1)]->id;
    			$nuevo->ciclo_id=$c->id;
    			$nuevo->curso=$cur->curso;
    			$nuevo->save();
    		}
    	}
    }
}
