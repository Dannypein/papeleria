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

Route::get('/admin/creditos/nuevo/credito/{id}', [
	'uses' => 'AdminController@editar_credito',
	'as' => 'editar_credito'
]);

Route::get('/admin/pedidos/editar/pedido/{id}', [
	'uses' => 'AdminController@editar_pedido',
	'as' => 'editar_pedido'
]);

Route::get('/desktop/pedidos/editar/pedido/{id}', [
	'uses' => 'NormalController@pedido_show',
	'as' => 'pedido_show'
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

Route::get('/admin/empresas/nuevo/departamento/', [
	'uses' => 'AdminController@nuevo_depa',
	'as' => 'nuevo_depa'
]);

Route::get('/admin/catalogo/producto/nuevo', [
	'uses' => 'AdminController@nuevo_product',
	'as' => 'nuevo_product'
]);
/*-----------Ruta De Busqueda---------*/

Route::get('/buscar','WelcomeController@search');

Route::get('/catalogo/buscar','NormalController@search2');

Route::get('/admin/catalogo/buscar','AdminController@search3');

/*----RUtas de busqueda Especifica----*/

Route::get('/admin/catalogo/reciente',[
		'as' => 'catalogo.reciente',
		'uses' => 'ProductsController@reciente'
	]);

Route::get('/admin/catalogo/modificado',[
		'as' => 'catalogo.modificado',
		'uses' => 'ProductsController@modificado'
	]);

Route::get('/admin/catalogo/precios/menor',[
		'as' => 'catalogo.precio',
		'uses' => 'ProductsController@precio'
	]);

Route::get('/admin/catalogo/precios/mayor',[
		'as' => 'catalogo.preciomayor',
		'uses' => 'ProductsController@preciomayor'
	]);

Route::get('/admin/catalogo/disponibles',[
		'as' => 'catalogo.disponible',
		'uses' => 'ProductsController@disponible'
	]);

/*---------------*/

Route::get('/desktop/catalogo/reciente',[
		'as' => 'catalogo.reciente2',
		'uses' => 'ProductsController@reciente2'
	]);

Route::get('/desktop/catalogo/modificado',[
		'as' => 'catalogo.modificado2',
		'uses' => 'ProductsController@modificado2'
	]);

Route::get('/desktop/catalogo/precios',[
		'as' => 'catalogo.precio2',
		'uses' => 'ProductsController@precio2'
	]);

Route::get('/desktop/catalogo/disponibles',[
		'as' => 'catalogo.disponible2',
		'uses' => 'ProductsController@disponible2'
	]);

/*--------------------Rutas de eliminacion----------------*/

Route::get('/admin/usuarios/{id}/delete', [
	'uses' => 'AdminController@destroy',
	'as' => 'destroy'
]);

Route::get('/admin/catalogo/product/delete/{id}', [
	'uses' => 'AdminController@delete',
	'as' => 'delete'
]);

/*---------------Rutas de POST de envio--------------------*/

Route::post('/admin/creditos/nuevo/credito/{id}/nuevo', [
	'uses' => 'AdminController@nuevo_credito',
	'as' => 'nuevo_credito'
]);

Route::post('/admin/product/edit/{id}', [
	'uses' => 'AdminController@store',
	'as' => 'store'
]);

Route::POST('/admin/catalogo/producto/nuevo', [
	'uses' => 'AdminController@create_p',
	'as' => 'create_p'
]);

Route::post('/contacto/correo', [
	'as'   => 'contacto.correo',
	'uses' => 'ContactoController@index'
]);

Route::post('/desktop/pedidos/renviar/{id}', [
	'as'   => 'contacto.remit',
	'uses' => 'ContactoController@remit'
]);


Route::post('/admin/empresas/editar/empresa/{id}', 'AdminController@update_empresa');

Route::post('/admin/usuarios/{id}/refresh', 'AdminController@refresh');

Route::post('/admin/usuarios/nuevo/usuario/create', 'AdminController@create');

Route::post('/admin/empresas/nueva/empresa/create', 'AdminController@create_empresa');

Route::post('/admin/empresas/nuevo/departamento/create', 'AdminController@create_department');

Route::post('/admin/pedidos/status/update/{id}', 'AdminController@update_status');

/*--------*/

Route::post('/desktop/usuarios/{id}/update', 'NormalController@update');

Route::post('/desktop/usuarios/catalogo/agregar', ['uses' => 'NormalController@create', 'as' => 'pedido.create']);

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

Route::get('/admin/productos/importar', [
	'uses' => 'ProductsController@formImportar',
	'as'   => 'products.form_importar'
]);

Route::post('/admin/productos/importar', [
	'uses' => 'ProductsController@importar',
	'as'   => 'products.importar'
]);

/*----rutas para el cart----*/
Route::get('/cart', ['as' =>'cart.show', 'uses' => 'CartController@show']);
Route::post('/cart/add_product', ['as' => 'cart.add_product', 'uses' => 'CartController@addProduct', 'middleware' => 'check_credit_limit']);
Route::delete('/cart/{id}', ['as' =>'cart.remove_product', 'uses' => 'CartController@removeProduct']);
Route::delete('/cart', ['as' =>'cart.destroy', 'uses' => 'CartController@destroy']);
