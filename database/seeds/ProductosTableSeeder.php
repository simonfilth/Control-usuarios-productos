<?php

use Illuminate\Database\Seeder;

class ProductosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker\Factory::create(); 
    	$nombre = array('Cerveza tibetana Barley','Refresco Guaraná Fantástica','Buey Mishi Kobe','Cordero Alice Springs','Sirope de regaliz','Especias Cajun del chef Anton','Peras secas orgánicas del tío Bob','Cuajada de judías','Queso Cabrales','Queso Manchego La Pastora','Pez espada','Algas Konbu','Pan fino','Tallarines de Singapur','Postre de merengue Pavlova','Pastas de té de chocolate');

		$codigo = array($faker->ean8,$faker->ean8,$faker->ean8,$faker->ean8,$faker->ean8,$faker->ean8,$faker->ean8,$faker->ean8,$faker->ean8,$faker->ean8,$faker->ean8,$faker->ean8,$faker->ean8,$faker->ean8,$faker->ean8,$faker->ean8);

		$imagen = array('bebidas.png','bebidas.png','carnes.png','carnes.png','condimentos.png','condimentos.png','frutas.png','frutas.png','lacteos.png','lacteos.png','pescado.png','pescado.png','granos.png','granos.png','reposteria.png','reposteria.png');

		$descripcion = array('Descripcion','Descripcion','Descripcion','Descripcion','Descripcion','Descripcion','Descripcion','Descripcion','Descripcion','Descripcion','Descripcion','Descripcion','Descripcion','Descripcion','Descripcion','Descripcion',);

		$categoriaid = array('1','1','2','2','3','3','4','4','5','5','6','6','7','7','8','8');

		$cantidad = array($faker->randomDigit,$faker->randomDigit,$faker->randomDigit,$faker->randomDigit,$faker->randomDigit,$faker->randomDigit,$faker->randomDigit,$faker->randomDigit,$faker->randomDigit,$faker->randomDigit,$faker->randomDigit,$faker->randomDigit,$faker->randomDigit,$faker->randomDigit,$faker->randomDigit,$faker->randomDigit);
		// $cantidad = array(10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10);

		$precio = array(19.00,4.50,97.00,39.00,10.00,22.00,30.00,23.25,21.00,38.00,31.00,6.00,9.00,14.00,17.45,9.20);
	for ($i=0; $i <16 ; $i++) { 
        \DB::table('productos')->insert(array (
        	
	        	'nombre' => $nombre[$i], 
			    'codigo' => $codigo[$i],
			    'imagen' => $imagen[$i],	    
			    'descripcion' => $descripcion[$i],
			    'precio' => $precio[$i],
			    'cantidad' => $cantidad[$i],
			    'categoria_id' => $categoriaid[$i],
			
		));
    }
		/*\DB::table('tipousuarios')->insert(array (
        	'nombre' => 'Té Dharamsala', 
		    'codigo' => $faker->ean8,
		    'imagen' => 'bebida.png',
		    'imagen' => 'bebida.png',
		    'descripcion' => 'Descripcion',
		    'precio' => 18.00,
		    'cantidad' => 39,
		));*/
    }//php artisan db:seed --class=ProductosTableSeeder
}
