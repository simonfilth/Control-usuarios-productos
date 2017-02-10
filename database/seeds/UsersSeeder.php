<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert(array (

        'name' => "Simon Aguilera",
        'email' => "developer@simonaguilera.com.ve",
        'telefono' => "+584121039433",
        'address' => "3ra calle Pueblo nuevo sur",
        'username' => "simonfilth",
        'password' => \Hash::make('admin'),
        'remember_token' => str_random(10),
        'tipousuarioid' => 1,
        // 'tipousuarioid' => App\TipoUsuarios::all()->random()->id,
		));
    }//php artisan db:seed --class=UsersSeeder
}
