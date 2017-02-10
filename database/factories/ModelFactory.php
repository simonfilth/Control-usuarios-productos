<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/


$factory->define(App\User::class, function ($faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'telefono' => $faker->e164PhoneNumber,
        'address' => $faker->address,
        'username' => $faker->username,
        'password' => \Hash::make('123456'),
        'remember_token' => str_random(10),
        'tipousuarioid' => 2,
        // 'tipousuarioid' => App\TipoUsuarios::all()->random()->id,
    ];
});

// $factory->define(App\Productos::class, function ($faker) {
//     return [
//         'name' => $faker->name,
//         'email' => $faker->email,
//         'telefono' => $faker->e164PhoneNumber,
//         'address' => $faker->address,
//         'username' => $faker->username,
//         'password' => \Hash::make('123456'),
//         'remember_token' => str_random(10),
//         'tipousuarioid' => 2,
//     ];
// });




// $arrayName = array(
//     'nombre' => 'Té Dharamsala', 
//     'codigo' => $faker->ean8,
//     'imagen' => 'bebidas.png',
//     'imagen' => 'bebidas.png',
//     'descripcion' => 'Descripcion',
//     'precio' => 18.00,
//     'cantidad' => 39,
//     );
/*

$nombre = array('nombre' => , ['Cerveza tibetana Barley','Refresco Guaraná Fantástica','Buey Mishi Kobe','Cordero Alice Springs','Sirope de regaliz','Especias Cajun del chef Anton','Peras secas orgánicas del tío Bob','Cuajada de judías','Queso Cabrales','Queso Manchego La Pastora','Pez espada','Algas Konbu','Pan fino','Tallarines de Singapur','Postre de merengue Pavlova','Pastas de té de chocolate']);

        $codigo = array('codigo' => , [$faker->ean8,$faker->ean8,$faker->ean8,$faker->ean8,$faker->ean8,$faker->ean8,$faker->ean8,$faker->ean8,$faker->ean8,$faker->ean8,$faker->ean8,$faker->ean8,$faker->ean8,$faker->ean8,$faker->ean8,$faker->ean8]);

        $imagen = array('imagen' => , ['bebidas.png','bebidas.png','carnes.png','carnes.png','condimentos.png','condimentos.png','frutas.png','frutas.png','lacteos.png','lacteos.png','pescado.png','pescado.png','granos.png','granos.png','reposteria.png','reposteria.png']);

        $descripcion = array('descripcion' => ,[sentence($nbWords = 6, $variableNbWords = true),sentence($nbWords = 6, $variableNbWords = true),sentence($nbWords = 6, $variableNbWords = true),sentence($nbWords = 6, $variableNbWords = true),sentence($nbWords = 6, $variableNbWords = true),sentence($nbWords = 6, $variableNbWords = true),sentence($nbWords = 6, $variableNbWords = true),sentence($nbWords = 6, $variableNbWords = true),sentence($nbWords = 6, $variableNbWords = true),sentence($nbWords = 6, $variableNbWords = true),sentence($nbWords = 6, $variableNbWords = true),sentence($nbWords = 6, $variableNbWords = true),sentence($nbWords = 6, $variableNbWords = true),sentence($nbWords = 6, $variableNbWords = true),sentence($nbWords = 6, $variableNbWords = true),sentence($nbWords = 6, $variableNbWords = true)] );

        $categoriaid = array('categoria_id' => ,['1','1','2','2','3','3','4','4','5','5','6','6','7','7','8','8']);

        $cantidad = array('cantidad' => , [$faker->randomDigit,$faker->randomDigit,$faker->randomDigit,$faker->randomDigit,$faker->randomDigit,$faker->randomDigit,$faker->randomDigit,$faker->randomDigit,$faker->randomDigit,$faker->randomDigit,$faker->randomDigit,$faker->randomDigit,$faker->randomDigit,$faker->randomDigit,$faker->randomDigit,$faker->randomDigit]);

        $precio = array('precio' => ,[19.00,4.50,97.00,39.00,10.00,22.00,30.00,23.25,21.00,38.00,31.00,6.00,9.00,14.00,17.45,9.20]);





NombreProducto  Categoría   PrecioUnidad    UnidadesEnExistencia

'Cerveza tibetana Barley' 1   19,00  17
'Refresco Guaraná Fantástica' 1   4,50   20
Cerveza Sasquatch   1   14,00  111
Cerveza negra Steeleye  1   18,00  20
Vino Côte de Blaye  1   263,50     17
Licor verde Chartreuse  1   18,00  69
Café de Malasia 1   46,00  17
Cerveza Laughing Lumberjack 1   14,00  52
Cerveza Outback 1   15,00  15
Cerveza Klosterbier Rhönbräu    1   7,75   125
Licor Cloudberry    1   18,00  57
'Buey Mishi Kobe' 2   97,00  29
'Cordero Alice Springs'   2   39,00  0
Salchicha Thüringer 2   123,79     0
Empanada de carne   2   32,80  0
Empanada de cerdo   2   7,45   21
Paté chino  2   24,00  115
'Sirope de regaliz'   3   10,00  13
'Especias Cajun del chef Anton'   3   22,00  53
Mezcla Gumbo del chef Anton 3   21,35  0
Mermelada de grosellas de la abuela 3   25,00  120
Salsa de arándanos Northwoods   3   40,00  6
Salsa de soja baja en sodio 3   15,50  39
Azúcar negra Malacca    3   19,45  27
Sirope de arce  3   28,50  113
Sandwich de vegetales   3   43,90  24
Salsa de pimiento picante de Luisiana   3   21,05  76
Especias picantes de Luisiana   3   17,00  4
Salsa verde original Frankfurter    3   13,00  32
'Peras secas orgánicas del tío Bob'   4   30,00  15
'Cuajada de judías'   4   23,25  35
Col fermentada Rössle   4   45,60  26
Manzanas secas Manjimup 4   53,00  20
Queso de soja Longlife  4   10,00  4
'Queso Cabrales'  5   21,00  22
'Queso Manchego La Pastora'   5   38,00  86
Queso gorgonzola Telino 5   12,50  0
Queso Mascarpone Fabioli    5   32,00  9
Queso de cabra  5   2,50   112
Raclet de queso Courdavault 5   55,00  79
Camembert Pierrot   5   34,00  19
Queso Gudbrandsdals 5   36,00  26
Crema de queso Fløtemys 5   21,50  26
Queso Mozzarella Giovanni   5   34,80  14
'Pez espada'  6   31,00  31
'Algas Konbu' 6   6,00   24
Langostinos tigre Carnarvon 6   62,50  42
Arenque blanco del noroeste 6   25,89  10
Escabeche de arenque    6   19,00  112
Salmón ahumado Gravad   6   26,00  11
Carne de cangrejo de Boston 6   18,40  123
Crema de almejas estilo Nueva Inglaterra    6   9,65   85
Arenque ahumado 6   9,50   5
Arenque salado  6   12,00  95
Caracoles de Borgoña    6   13,25  62
Caviar rojo 6   15,00  101
Pan de centeno crujiente estilo Gustafs    7   21,00  104
'Pan fino'    7   9,00   61
'Tallarines de Singapur'  7   14,00  26
Cereales para Filo  7   7,00   38
Gnocchi de la abuela Alicia 7   38,00  21
Raviolis Angelo 7   19,50  36
Bollos de pan de Wimmer 7   33,25  22
'Postre de merengue Pavlova'  8   17,45  29
'Pastas de té de chocolate'   8   9,20   25
Mermelada de Sir Rodneys   8   81,00  40
Bollos de Sir Rodneys  8   10,00  3
Crema de chocolate y nueces NuNuCa  8   14,00  76
Ositos de goma Gumbär   8   31,23  15
Chocolate Schoggi   8   43,90  49
Galletas Zaanse 8   9,50   36
Chocolate holandés  8   12,75  15
Regaliz 8   20,00  10
Chocolate blanco    8   16,25  65
Tarta de azúcar 8   49,30  17
Barras de pan de Escocia    8   12,50  6*/


