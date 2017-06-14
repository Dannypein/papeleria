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

/*----Rutas de Usuario Normal----*/

Route::get('/desktop/informacion', [
	'uses' => 'NormalController@index_info',
	'as' => 'index_info'
]);

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

Route::get('/carrito/nuevo', [
	'uses' => 'CartController@index',
	'as' => 'index'
]);

/*--------------Rutas de control de administrador---------------*/

Route::get('/admin/empresas', [
	'uses' => 'AdminController@empresa',
	'as' => 'empresa'
]);

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

Route::get('/admin/pedidos', [
	'uses' => 'AdminController@pedidos',
	'as' => 'pedidos'
]);

/*----------------Rutas de Control de Usuario Normal---------*/

Route::get('/desktop/pedidos', [
	'uses' => 'NormalController@pedidos_normal',
	'as' => 'pedidos_normal'
]);

Route::get('/desktop/catalogo', [
	'uses' => 'NormalController@catalogo_normal',
	'as' => 'catalogo_normal'
]);

/*------------------------Rutas de edicion-------------------*/

Route::get('/admin/usuarios/editar/user/{id}', [
	'uses' => 'AdminController@edit',
	'as' => 'edit'
]);

Route::get('/admin/empresas/editar/empresa/{id}', [
	'uses' => 'AdminController@edit_empresa',
	'as' => 'edit_empresa'
]);

Route::get('/admin/catalogo/editar/product/{id}', [
	'uses' => 'AdminController@update',
	'as' => 'update'
]);

Route::get('/desktop/catalogo/editar/product/{id}', [
	'uses' => 'NormalController@store',
	'as' => 'store'
]);

Route::get('/admin/creditos/nuevo/credito/{id}', [
	'uses' => 'AdminController@editar_credito',
	'as' => 'editar_credito'
]);

Route::get('/admin/pedidos/editar/pedido/{id}', [
	'uses' => 'AdminController@editar_pedido',
	'as' => 'editar_pedido'
]);

/*-----------Rutas de creacion----------------*/

Route::get('/admin/usuarios/nuevo', [
	'uses' => 'AdminController@nuevo',
	'as' => 'nuevo'
]);

Route::get('/admin/empresas/nueva/empresa', [
	'uses' => 'AdminController@nueva_empresa',
	'as' => 'nueva_empresa'
]);

Route::post('/admin/creditos/nuevo/credito/{id}/nuevo', [
	'uses' => 'AdminController@nuevo_credito',
	'as' => 'nuevo_credito'
]);

/*--------------------Rutas de eliminacion----------------*/

Route::get('/admin/usuarios/{id}/delete', [
	'uses' => 'AdminController@destroy',
	'as' => 'destroy'
]);

/*---------------Rutas de POST de envio--------------------*/

Route::post('/admin/empresas/editar/empresa/{id}', 'AdminController@update_empresa');

Route::post('/admin/usuarios/{id}/refresh', 'AdminController@refresh');

Route::post('/admin/usuarios/nuevo/usuario/create', 'AdminController@create');

Route::post('/admin/empresas/nueva/empresa/create', 'AdminController@create_empresa');

/*--------*/

Route::post('/desktop/usuarios/{id}/update', 'NormalController@update');

Route::post('/desktop/usuarios/catalogo/agregar/{id}', 'NormalController@create');

/*----rutas de las vistas del menu izquierdo----*/

Route::get('/consumibles/originales', [
	'uses' => 'WelcomeController@escolar',
	'as' => 'escolar'
]);

Route::get('/papeleria/oficina', [
	'uses' => 'WelcomeController@oficina',
	'as' => 'oficina'
]);

Route::get('/papeleria/computo', [
	'uses' => 'WelcomeController@computo',
	'as' => 'computo'
]);

Route::get('/consumibles/genericos', [
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
