<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Docente;

class DocenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$nombres=['Luis','Maria','Yolanda','Pedro','Manuel','Eva','Israel','Yaiza','Alba','David Enrique']; //10 items
    	$apellidos=['Fernandez','Garcia','Vallejo','Suarez','De las Heras','Montoto','Sanchez','Barbón','Avilés','Ruiz','Ribera','Quirós']; //12 items

    	for ($a=0;$a<20;$a++){
    		$doc=new Docente();
    		//$doc->nombre=$nombres[rand(0,9)];
    		//$doc->apellido1=$apellidos[rand(0,11)];
    		//$doc->apellido2=$apellidos[rand(0,11)];
    		//$doc->email=substr($doc->nombre,0,3).substr($doc->apellido1,0,4)."_".strval(rand(10,99))."_cifp@educabastu.es";
    		$doc->dni=strval(rand(11000000,71000000)).'D';
    		//$doc->telefono=strval(rand(600000000,699999999));
            $doc->isAdmin=rand(0,1) == 1; //para pruebas, 1/2 son admin.
    		$doc->save();
    	}

    }
}
