<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ParametroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parametros')->delete(); 
		DB::table('parametros')->insert(['cursoActual'=>2021]); //,'ultimoCheckMensajes'=>'2000-01-01']);

    }
}
