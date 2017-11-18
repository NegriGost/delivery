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

Route::get('/', function () {
    return view('inicio.index');
});

Route::get('/mapa', function () {
    return view('restaurantes.mapa');
});

Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');

//=================================REstaurantes=========================================

Route::post('/lista_de_restaurante','RestauranteController@index');
Route::get('/lista_de_restaurantes',function(){

	return view('restaurantes.lista_restaurante');
});

Route::get('/carrinho_de_compras/{id}','RestauranteController@compras');