<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Alumno;

class AlumnoSeeder extends Seeder
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
    	for ($a=0;$a<15;$a++){
    		$alu=new Alumno();
    		$alu->nombre=$nombres[rand(0,9)];
    		$alu->email=substr($alu->nombre,0,3)."_2021_".strval(rand(100,999))."_cifp@educabastu.org";
    		$alu->dni=strval(rand(11000000,71000000)).'A';
    		$alu->apellido1=$apellidos[rand(0,11)];
    		$alu->apellido2=$apellidos[rand(0,11)];
    		$alu->telefono=strval(rand(600000000,699999999));
    		$alu->save();
    	}

    }
}
