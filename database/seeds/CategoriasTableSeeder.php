<?php

use Illuminate\Database\Seeder;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('categorias')->insert(array (
        	'nombre' => "Bebidas",
		));
		\DB::table('categorias')->insert(array (
        	'nombre' => "Carnes",
		));
		\DB::table('categorias')->insert(array (
        	'nombre' => "Condimentos",
		));
		\DB::table('categorias')->insert(array (
        	'nombre' => "Frutas",
		));
		\DB::table('categorias')->insert(array (
        	'nombre' => "Lácteos",
		));
		\DB::table('categorias')->insert(array (
        	'nombre' => "Pescado",
		));
		\DB::table('categorias')->insert(array (
        	'nombre' => "Harinas",
		));
		\DB::table('categorias')->insert(array (
        	'nombre' => "Repostería",
		));
    }//php artisan db:seed --class=CategoriasTableSeeder
}
