<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

		$user=new User();
		$user->name='AppWeb';
        $user->email='AppWeb@AppWeb.app';
		$user->password='webApp2021';
		$user->save();

        $user=new User();
        $user->name='AppAndroid';
        $user->email='AppAndroid@AppAndroid.app';
        $user->password='androidApp2021';
        $user->save();



    }
}
