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
//Route::resource('/tienda','TiendaController');
Route::post('/tienda', function(){
    return view('tienda.index');
});
Route::get('/tienda', function(){
    return view('tienda.index');
});
Route::get('/tienda/mostrarCarrito', function(){
    return view('tienda.mostrarCarrito');
});
Route::post('/tienda/mostrarCarrito', function(){
    return view('tienda.mostrarCarrito');
});
Route::resource('cafes', 'CafesController');
Route::resource('/productos', 'ProductosController');
// Route::get('/nosotros',['as' => 'registro', 'uses' => 'RegisterController@registro']);
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
