<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::middleware(['auth'])->group(function () {
	Route::get('pedidos/invoice/{id}', 'PedidosController@getInvoice')->name('pedidos_invoice');
	Route::get('pedidos/index', 'PedidosController@index')->name('pedidos_index');
	Route::get('pedidos/create', 'PedidosController@create')->name('pedidos_create');
	Route::post('pedidos/store', 'PedidosController@store')->name('pedidos_store');
	Route::get('pedidos/edit/{id}', 'PedidosController@edit')->name('pedidos_edit');
	Route::put('pedidos/update/{id}', 'PedidosController@update')->name('pedidos_update');
	Route::delete('pedidos/destroy/{id}', 'PedidosController@destroy')->name('pedidos_destroy');
	
	Route::get('detalle_pedido/index/{idpedidos}', 'Detalle_pedidoController@index')->name('detalle_pedido_index');
	Route::get('detalle_pedido/create/{idpedidos}', 'Detalle_pedidoController@create')->name('detalle_pedido_create');
	Route::post('detalle_pedido/store/{idpedidos}', 'Detalle_pedidoController@store')->name('detalle_pedido_store');
	Route::get('detalle_pedido/edit/{idpedidos}/{id}', 'Detalle_pedidoController@edit')->name('detalle_pedido_edit');
	Route::put('detalle_pedido/update/{idpedidos}/{id}', 'Detalle_pedidoController@update')->name('detalle_pedido_update');
	Route::delete('detalle_pedido/destroy/{idpedidos}/{id}', 'Detalle_pedidoController@destroy')->name('detalle_pedido_destroy');

	Route::get('user/index', 'UsersController@index')->name('user_index');
	Route::get('user/create', 'UsersController@create')->name('user_create');
	Route::post('user/store', 'UsersController@store')->name('user_store');
	Route::get('user/edit/{id}', 'UsersController@edit')->name('user_edit');
	Route::put('user/update/{id}', 'UsersController@update')->name('user_update');
	Route::delete('user/destroy/{id}', 'UsersController@destroy')->name('user_destroy');

	Route::get('productos/index', 'ProductosController@index')->name('productos_index');
	Route::get('productos/create', 'ProductosController@create')->name('productos_create');
	Route::post('productos/store', 'ProductosController@store')->name('productos_store');
	Route::get('productos/edit/{id}', 'ProductosController@edit')->name('productos_edit');
	Route::put('productos/update/{id}', 'ProductosController@update')->name('productos_update');
	Route::delete('productos/destroy/{id}', 'ProductosController@destroy')->name('productos_destroy');

	Route::get('clientes/index', 'ClientesController@index')->name('clientes_index');
	Route::get('clientes/create', 'ClientesController@create')->name('clientes_create');
	Route::post('clientes/store', 'ClientesController@store')->name('clientes_store');
	Route::get('clientes/edit/{id}', 'ClientesController@edit')->name('clientes_edit');
	Route::put('clientes/update/{id}', 'ClientesController@update')->name('clientes_update');
	Route::delete('clientes/destroy/{id}', 'ClientesController@destroy')->name('clientes_destroy');

	Route::get('estado/index', 'EstadoController@index')->name('estado_index');
	Route::get('estado/create', 'EstadoController@create')->name('estado_create');
	Route::post('estado/store', 'EstadoController@store')->name('estado_store');
	Route::get('estado/edit/{id}', 'EstadoController@edit')->name('estado_edit');
	Route::put('estado/update/{id}', 'EstadoController@update')->name('estado_update');
	Route::delete('estado/destroy/{id}', 'EstadoController@destroy')->name('estado_destroy');	
	
});



Route::get('/', function () {

    return redirect()->route('pedidos_index');
});

/*
Route::get('/grupo', function () {
	
	$usuario = new App\User;
	$usuario->name="admin";
	$usuario->email="admin@admin.com";
	$usuario->password=\Hash::make("1234567");
	$usuario->save();
	
    return view('welcome');
});*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
