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

//=======================Routes de Login com redes sociais=============================
Route::get('login/{service}', 'UsuarioController@redirectToProvider');
Route::get('login/{service}/callback', 'UsuarioController@handleProviderCallback');
//=================================Restaurantes=========================================

Route::post('/lista_de_restaurante','RestauranteController@index');
Route::get('/mapa','RestauranteController@mapa');
Route::get('/carrinho_de_compras/{id}','RestauranteController@compras');

Route::get('/sms',function(){
	$nexmo = app('Nexmo\Client');
	$nexmo->message()->send([
		'from' => 'Swakuda',
	    'to'   => '+258849231169',
	    'text' => 'Ola Costa, Viemos por este meio te desejar uma boa tarde.Swakuda Software Solution'
	]);
	return "SMS Enviada com sucesso!!!";
});

Route::get('/form_registar_restaurante','RestauranteController@registar');

Route::get('/lista_de_restaurantes',function(){

	return view('restaurantes.lista_restaurante');
});

Route::get('/produtos','ProdutoController@compra');
Route::get('/pagamentos','ProdutoController@compra');

Route::get('/upload',function(){
	return view('inicio.upload');
});

Route::post('/uploadimg','RestauranteController@imgupload');

//=======================================Cliente======================================================
Route::get('/form_registar_cliente','UsuarioController@registar_usuario');
Route::get('/form_login','UsuarioController@login');
Route::get('/usuario_perfil','UsuarioController@perfil_do_usuario');
Route::get('/form_recuperar_Senha_cliente','UsuarioController@recuperar');
Route::get('/sair','UsuarioController@close');
Route::get('/meus_enderecos','UsuarioController@enderecos_do_usuario');
Route::get('/form_cadastrar_endereco','UsuarioController@registar_endereco');
Route::get('/form_editar_perfil','UsuarioController@editar_perfil');
Route::post('/form_gravar_cliente','UsuarioController@salvar');
