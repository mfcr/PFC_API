<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TipoProyecto;

class TipoProyectoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoProyecto::insert([['tipo'=>'Desarrollo de Software'],['tipo'=>'Implantación de sistemas'],['tipo'=>'Otro tipo (describir)']]);
        //TipoProyecto::upsert([['tipo'=>'Desarrollo de Software'],['tipo'=>'Implantación de sistemas'],['tipo'=>'Otro tipo (describir)']],'tipo','tipo');
    }
}
