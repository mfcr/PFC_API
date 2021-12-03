<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GrupoRubrica;

class GrupoRubricaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gr_rub=new GrupoRubrica(); //1
        $gr_rub->grupo='PROYECTO';
        $gr_rub->save();

        $gr_rub=new GrupoRubrica(); //2
        $gr_rub->grupo='MEMORIA';
        $gr_rub->save();

        $gr_rub=new GrupoRubrica(); //3
        $gr_rub->grupo='VIDEO';
        $gr_rub->save();


    }
}
