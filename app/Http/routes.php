<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*Route::get('home/id1/{id1}/id2/{id2}', 'HomeController@getId');
Route::get('home/showview', 'HomeController@showView');*/

//Peticiones del tipo get y post
//Route::match(["get", "post"], "home/form", "HomeController@form");
// Route::any("home/form", "HomeController@form"); 

/*Route::get("home/nombre/{nombre}/apellidos/{apellidos}", function($nombre, $apellidos){
    return  $nombre . " " . $apellidos;
})->where(["nombre" => "[a-zA-Z]+", "apellidos" => "[a-zA-Záéíóú]+"]);

Route::get("home/miformulario", "HomeController@miFormulario");

Route::post("home/validarmiformulario", "HomeController@validarMiFormulario");*/

Route::group(['middleware' => 'guest'], function () {
	Route::get('auth/register', 'Auth\AuthController@getRegister');
	Route::post('auth/register', 'Auth\AuthController@postRegister');

	/*Route::get('auth/confirm/email/{email}/confirm_token/{confirm_token}', 'Auth\AuthController@confirmRegister'); */

	Route::get('auth/login', 'Auth\AuthController@getLogin');
	Route::post('auth/login', 'Auth\AuthController@postLogin');
	
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('auth/logout', 'Auth\AuthController@getLogout');
	//rutas para el recurso user

	Route::resource('user/index', 'UserController@index');
	Route::resource('user/create', 'UserController@create');
	Route::resource('user/edit', 'UserController@edit');
	Route::resource('user/update', 'UserController@update');
	Route::resource('user/show', 'UserController@show');
	Route::resource('user', 'UserController');
	//una nueva ruta para eliminar registros con el metodo get
	Route::get('user/destroy/{id}', 
		['as' => 'user/destroy', 
		'uses'=>'UserController@destroy']);
	Route::resource('productos/index', 'ProductosController@index');
	Route::resource('productos/create', 'ProductosController@create');
	Route::resource('productos/edit', 'ProductosController@edit');
	// Route::('productos/edit', 'ProductosController@edit');
	// Route::get('productos/update', 'ProductosController@update');
	// Route::patch('productos/update', 'ProductosController@update');
	Route::resource('productos/show', 'ProductosController@show');
	Route::resource('productos', 'ProductosController');
	//una nueva ruta para eliminar registros con el metodo get
	Route::get('productos/destroy/{id}', 
		['as' => 'productos/destroy', 
		'uses'=>'ProductosController@destroy']);

	// Route::get('pdf', 'PdfController@invoice');
	Route::get('pdf/usuarios', 'PdfController@reporteUsuarios');
	Route::get('pdf/productos', 'PdfController@reporteProductos');
	/*Route::get('pdf/usuarios', function(){
		$users = App\User::all();
		$pdf = PDF::loadView('pdf.reporte-usuarios',['usuarios'=>$users]);
		return $pdf->download('Reporte de Usuarios.pdf');
	});*/
	// Route::get('formulario', 'StorageController@index');
});

Route::group(['middleware' => 'usuarioAdmin'], function (){
	Route::get('auth/logout', 'Auth\AuthController@getLogout');
});

Route::group(['middleware' => 'usuarioStandard'], function () {	
	 Route::get('auth/logout', 'Auth\AuthController@getLogout');
});
Route::get('/', 'HomeController@home');
Route::get('/home', 'HomeController@home');
/*Route::get('/', 'Auth\AuthController@getLogin');
Route::get('/home', 'Auth\AuthController@getLogin');*/
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Route::get('users/userview', 'Auth\AuthController@getLogout');

