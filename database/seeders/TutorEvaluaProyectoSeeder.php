<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Proyecto;
use App\Models\TutorEvaluaProyecto;
use App\Models\Rubrica;
use App\Models\DocenteTutColectivoCiclo;

class TutorEvaluaProyectoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$proy=Proyecto::where('id','>',6)->get();
    	//Proyecto >=7 tutor individual ya evaluó y >=8 tb tut colectivo.
    	foreach($proy as $p) {
    		$ciclo=$p->ciclo_id;
    		$curso=$p->curso;
    		$rubricas=Rubrica::where('ciclo_id',$ciclo)->where('curso',$curso)->get();
    		//Valoraciones del TutorIndividual.
    		foreach ($rubricas as $r) {
    			$nuevo=new TutorEvaluaProyecto();
    			$nuevo->proyecto_id=$p->id;
    			$nuevo->docente_id=$p->docente_id;
    			$nuevo->rubrica_id=$r->id;
    			$val=rand(0,100);
    			$nuevo->nota=($val>=80)?4:(($val>=40)?3:(($val>=20)?2:1)); //20% 4, 40% 3, 20% 2, 20%1
    			if (rand(0,10)>7) { //30% welldone, 20% del 70% restante necesitamejorar, resto nada
    				$nuevo->comentario='Well Done';
    			} elseif (rand(0,10)>8) {
    				$nuevo->comentario='Necesira mejorar';
    			} 
                $nuevo->esColectivo=false;
    			$nuevo->save();
    		}
    		//Valoraciones del tutor colectivo.
    		$tutCol=DocenteTutColectivoCiclo::where('ciclo_id',$ciclo)->where('curso',$curso)->first();
    		if ($p->id>7) {
	    		foreach ($rubricas as $r) {
	    			$nuevo=new TutorEvaluaProyecto();
	    			$nuevo->proyecto_id=$p->id;
	    			$nuevo->docente_id=$tutCol->docente_id;
	    			$nuevo->rubrica_id=$r->id;
	    			$val=rand(0,100);
	    				$nuevo->nota=($val>=80)?4:(($val>=40)?3:(($val>=20)?2:1)); //20% 4, 40% 3, 20% 2, 20%1
	    			if (rand(0,10)>7) { //30% welldone, 20% del 70% restante necesitamejorar, resto nada
	    				$nuevo->comentario='Well Done';
	    			} elseif (rand(0,10)>8) {
	    				$nuevo->comentario='Necesira mejorar';
    				} 
                    $nuevo->esColectivo=true;
	    			$nuevo->save();
	    		}
	    	}
    	}

    }
}
