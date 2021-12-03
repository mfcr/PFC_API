<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ciclo;
use App\Models\TipoProyecto;
use App\Models\TipoProyectoCiclo;

class TipoProyectoCicloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ciclos=Ciclo::all();
        $tipos=TipoProyecto::all();
        foreach($ciclos as $c) {
        	foreach($tipos as $t) {
        		$nuevo=new TipoProyectoCiclo();
        		$nuevo->ciclo_id=$c->id;
        		$nuevo->tipo_proyecto_id=$t->id;
        		$nuevo->save();
        	}
        }
    }
}
