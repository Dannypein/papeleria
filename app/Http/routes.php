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

/*----Rutas por defecto----*/

/*Route::get('/', 'WelcomeController@index');*/

Route::get('home', 'WelcomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

/*----Rutas de administrador----*/

Route::get('/desktop', 'AdminController@desktop');

Route::get('/admin', 'AdminController@admin');

/*----Rutas personales----*/

Route::get('/', [
	'uses' => 'WelcomeController@index',
	'as' => 'home'
]);

Route::get('/acercade', [
	'uses' => 'WelcomeController@acercade',
	'as' => 'acercade'
]);

Route::get('/contacto', [
	'uses' => 'WelcomeController@contacto',
	'as' => 'contacto'
]);

/*---ruta de los articulos----*/

Route::get('/articulo/{id}', [
	'uses' => 'WelcomeController@articulo',
	'as' => 'articulo'
]);

/*----Ruta del Carrito de Compras----*/

Route::get('/carrito', [
	'uses' => 'AdminController@carrito',
	'as' => 'carrito'
]);

/*----Rutas de control de administrador----*/

Route::get('/admin/usuarios', [
	'uses' => 'AdminController@usuarios',
	'as' => 'usuarios'
]);

Route::get('/admin/creditos', [
	'uses' => 'AdminController@creditos',
	'as' => 'creditos'
]);

Route::get('/admin/catalogo', [
	'uses' => 'AdminController@catalogo',
	'as' => 'catalogo'
]);


/*----Rutas de edicion----*/

Route::get('/admin/usuarios/edit/user/{id}', [
	'uses' => 'AdminController@edit',
	'as' => 'edit'
]);

Route::get('/admin/catalogo/edit/product/{id}', [
	'uses' => 'AdminController@update',
	'as' => 'update'
]);

/*----rutas de las vistas del menu izquierdo----*/

Route::get('/escolar', [
	'uses' => 'WelcomeController@escolar',
	'as' => 'escolar'
]);

Route::get('/oficina', [
	'uses' => 'WelcomeController@oficina',
	'as' => 'oficina'
]);

Route::get('/computo', [
	'uses' => 'WelcomeController@computo',
	'as' => 'computo'
]);

Route::get('/regalos', [
	'uses' => 'WelcomeController@regalos',
	'as' => 'regalos'
]);

/*----rutas par importar productos----*/

Route::get('/productos/importar', [
	'uses' => 'ProductsController@formImportar',
	'as'   => 'products.form_importar'
]);

Route::post('/productos/importar', [
	'uses' => 'ProductsController@importar',
	'as'   => 'products.importar'
]);
