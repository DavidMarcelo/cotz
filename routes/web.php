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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/cafes','CafesController@index');
//Route::get('/nosotros',['as' => 'nosotros', 'uses' => 'CafesController@nosotros']);
Route::get('/','CafesController@index');
Route::get('/nosotros','CafesController@nosotros');
Route::get('/tiendita','CafesController@tiendita');
// Route::get('/opciones','CafesController@opcion');
Route::resource('/tienda','TiendaController')->middleware('auth');
Route::resource('cafes', 'CafesController');
Route::resource('/productos', 'ProductosController')->middleware('auth');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
