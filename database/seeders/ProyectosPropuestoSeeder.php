<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProyectosPropuesto;

class ProyectosPropuestoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$nuevo=new ProyectosPropuesto();
    	$nuevo->ciclo_id=3;
    	$nuevo->nombre="Federico";
        $nuevo->email="Federico@gmail.com";
    	$nuevo->propuesta="Proyecto web que permita que el usuario introduzca lo que quiere hacer en su vida y cada dia le envia un mensaje de animo";
		$nuevo->save();


    	$nuevo=new ProyectosPropuesto();
    	$nuevo->ciclo_id=6;
        $nuevo->email="Federico@gmail.com";        
    	$nuevo->propuesta="Proyecto web que permita llevar vía web una pequeña contabilidad para autónomos y llevar un control documental.";
		$nuevo->save();

    }
}
