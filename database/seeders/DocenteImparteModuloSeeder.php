<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Docente;
use App\Models\DocenteImparteModulo;
use App\Models\CicloModulo;


class DocenteImparteModuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$doc=Docente::all('id'); //Todos los Id de los docentes, sizeof($doc) cuenta el num de elementos.
    	$cic_mod=CicloModulo::all();
    	foreach($cic_mod as $cm) {
    		$nuevo=new DocenteImparteModulo();
    		//$nuevo->ciclo_id=$cm->ciclo_id;
    		//$nuevo->modulo_id=$cm->modulo_id;

            $nuevo->ciclo_modulo_id=$cm->id;

    		$nuevo->docente_id=$doc[rand(0,sizeof($doc)-1)]->id;
    		$nuevo->curso=2021;
    		$nuevo->save();

    	}

    }
}
