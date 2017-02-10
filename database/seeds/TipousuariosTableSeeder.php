<?php

use Illuminate\Database\Seeder;

class TipousuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('tipousuarios')->insert(array (
        	'name' => "Administrador",
		));
		\DB::table('tipousuarios')->insert(array (
        	'name' => "Cliente",
		));
    }//php artisan db:seed --class=TipousuariosTableSeeder
}
