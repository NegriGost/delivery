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

Route::get('/mapa','RestauranteController@mapa');

//Routes de Login com redes sociais
Route::get('login/{service}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{service}/callback', 'Auth\LoginController@handleProviderCallback');

//=================================REstaurantes=========================================

Route::post('/lista_de_restaurante','RestauranteController@index');
Route::get('/lista_de_restaurantes',function(){

	return view('restaurantes.lista_restaurante');
});

Route::get('/carrinho_de_compras/{id}','RestauranteController@compras');
Route::get('/produtos','ProdutoController@compra');
Route::get('/pagamentos','ProdutoController@compra');
Route::get('/facebook','RestauranteController@conexao_facebook');
// session_start();

// if($_POST["action"]=="add"){


//     	if(isset($_SESSION['carrinho'])){

//     		$item_array_id=array_column($_SESSION["carrinho"],"item_id");

//     		if(!in_array($_POST["id"],$item_array_id)){

//     			$count=count($_SESSION['carrinho']);

//     			$item_array=array(
//     					'item_id'=>$_POST['id'],
// 		    			'item_nome'=>$_POST['nome'],
// 		    			'item_preco'=>$_POST['preco'],
// 		    			'item_qtd'=>'1',

//     			);

//     			$_SESSION['carrinho'][$count]=$item_array;


//     		}else{
//     			echo "<script>alert('Esse Produto Ja foi adicionado')</script";
//     		}
    		
//     	}else{

//     		$item_array=array(
//     			'item_id'=>$_POST['id'],
//     			'item_nome'=>$_POST['nome'],
//     			'item_preco'=>$_POST['preco'],
//     			'item_qtd'=>'1',
//     		);
//     		$_SESSION['carrinho'][0]=$item_array;
//     	}

//     	}
//     }