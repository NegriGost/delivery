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


Route::get('/form_registar_cliente', function () {
    return view('clientes.registar_cliente');
});

//=================================REstaurantes=========================================

Route::post('/lista_de_restaurante','RestauranteController@index');

