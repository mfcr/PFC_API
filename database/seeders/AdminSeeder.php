<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Docente;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Este Seeder se debe usar para crear al usuario admin al crear la BBDD de forma que 
        //   ya se pueda trabajar en la web de inmediato. Si se modifica el email también habría que hacerlo en el usuario de la aplicación web.
		$doc=new Docente();
		$doc->nombre='Administrador';
		$doc->apellido1='del sistema';
		$doc->apellido2='';
		$doc->email='admin@admin.admin';
		$doc->dni='000000000';
		$doc->telefono='adminPhone';

        $doc->isAdmin=true; 
		$doc->save();

    }
}
