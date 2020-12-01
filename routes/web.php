<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::get('table-list', function () {
		return view('pages.table_list');
	})->name('table');

//CONTROLADOR Y METODOS DE PRODUCTOS
	Route::get('/productos', 'ProductoController@index')->name('productos');
	Route::post('/productos', 'ProductoController@store')->name('productos');
	Route::get('/productos/{id}/edit', 'ProductoController@edit')->name('productosedit');
	Route::post('/productos/{id}/edit', 'ProductoController@update')->name('productosedit');
	Route::post('/productos/{id}/delete', 'ProductoController@eliminar')->name('productoseliminar');
	Route::get('/productos/{id}/img', 'ProductoController@img')->name('productosimagen');
	Route::post('/productos/{id}/img', 'ProductoController@saveimg')->name('productosaveimg');
//CONTROLADOR Y METODOS DE PROVEDORES
Route::get('/provedores', 'ProvedorController@index')->name('provedores');
Route::post('/provedores', 'ProvedorController@store')->name('provedores');
Route::get('/provedores/{id}/edit', 'ProvedorController@edit')->name('provedoresedit');
Route::post('/provedores/{id}/edit', 'ProvedorController@update')->name('provedoresedit');
Route::post('/provedores/{id}/delete', 'ProvedorController@eliminar')->name('provedoreseliminar');
//__________________________________________________________________________________________________
//CONTROLADOR Y METODOS DE INVENTARIOS
Route::get('/inventarios', 'InventarioController@index')->name('inventarios');
Route::get('/inventarios/productos', 'InventarioController@cargProductos')->name('inventarios');
Route::post('/inventarios', 'InventarioController@store')->name('inventarios');
Route::get('/inventarios/{id}/edit', 'InventarioController@edit')->name('inventariosedit');
Route::post('/inventarios/{id}/edit', 'InventarioController@update')->name('inventariosedit');
Route::post('/inventarios/{id}/delete', 'InventarioController@eliminar')->name('inventarioseliminar');
//__________________________________________________________________________________________________
//CONTROLADOR Y METODOS DE TIENDA
Route::get('/tienda', 'TiendaController@index')->name('tienda');
Route::get('/tienda/productos', 'TiendaController@cargProductos')->name('tienda');
Route::post('/tienda', 'TiendaController@store')->name('tienda');
Route::get('/tienda/{id}/edit', 'TiendaController@edit')->name('tiendaedit');
Route::post('/tienda/{id}/edit', 'TiendaController@update')->name('tiendaedit');
Route::post('/tienda/{id}/delete', 'TiendaController@eliminar')->name('tiendaeliminar');
//__________________________________________________________________________________________________
	Route::get('typography', function () {
		return view('pages.typography');
	})->name('typography');

	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

