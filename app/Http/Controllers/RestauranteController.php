<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mapper;
use App\Produto;
class RestauranteController extends Controller
{
    
    //Busca todos os retaurantes em funcao da localizacao do cliente
    public function index(Request $request){

        //busca a localizacao de um usuario atraves do ip
    	//$local= @unserialize(file_get_contents('http://ip-api.com/php'));

    	  $this->validate($request,[
                'txt_autocomplete'=>'required',
           ]);

	    	$endereco=$request->txt_autocomplete;

	        $endereco_convertido=str_replace(' ','+',$endereco);
	        $localizacao=str_replace(',','+', $endereco_convertido);

	    	$geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$localizacao.'&sensor=false');

	    	
	    	$output= json_decode($geocode);

            $latitude= $output->results[0]->geometry->location->lat;
            $longitude= $output->results[0]->geometry->location->lng;

			Mapper::map(-25.8962418,32.5406427,['marker' => false]);
			Mapper::informationWindow($latitude, $longitude,"Estou na UEM");

      		return view('restaurantes.mapa');
    }


    //Retorna a lista de produtos de um restaurante
    public function compras($id){
    	$produto=Produto::all();
        return view('restaurantes.carrinho',compact('produto'));
    }


    // Retorna o mapa de todos restaurantes
    public function mapa(){

        //Marcador difault eh cidade de Maputo
        Mapper::map(40.59726025535419, 80.02503488467874, ['marker' => false]);
       
        // Informacao do endereco para cada restaurante
        $restaurantes =Restaurante::all();

        $collection->each(function($enderecos)
        {
            $restaurantes =$enderecos->endereco;
            Mapper::informationWindow($address->latitude, $address->longitude, $content);
        });

        //retornar todos restaurantes no mapa.
        return view('restaurantes.mapa', compact('restaurantes '));

    }

    public function conexao_facebook(){

           session_start();

if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['code'])){

 

  // Informe o seu App ID abaixo

 $appId = '1895387320681799';

 

  // Digite o App Secret do seu aplicativo abaixo:

  $appSecret = 'f390c11dcabb68e8c385b2acc17ff235';

 

  // Url informada no campo "Site URL"

  $redirectUri = urlencode('http://swakuda.delivery.com');


 // Obtém o código da query string

  $code = $_GET['code'];

return $code;
 

  // Monta a url para obter o token de acesso e assim obter os dados do usuário

  $token_url = "https://graph.facebook.com/oauth/access_token?"

  . "client_id=" . $appId . "&redirect_uri=" . $redirectUri

  . "&client_secret=" . $appSecret . "&code=" . $code;

 

  //pega os dados

 $response = @file_get_contents($token_url);

  if($response){

    $params = null;

    parse_str($response, $params);

    if(isset($params['access_token']) && $params['access_token']){

      $graph_url = "https://graph.facebook.com/me?access_token="

     . $params['access_token'];

      $user = json_decode(file_get_contents($graph_url));

 

    // nesse IF verificamos se veio os dados corretamente

      if(isset($user->email) && $user->email){

 

            /*

            *Apartir daqui, você já tem acesso aos dados usuario, podendo armazená-los

            *em sessão, cookie ou já pode inserir em seu banco de dados para efetuar

            *autenticação.
        39
            *No meu caso, solicitei todos os dados abaixo e guardei em sessões.
        40
            */

 

        $_SESSION['email'] = $user->email;

        $_SESSION['nome'] = $user->name;

        $_SESSION['localizacao'] = $user->location->name;

        $_SESSION['uid_facebook'] = $user->id;

        $_SESSION['user_facebook'] = $user->username;

        $_SESSION['link_facebook'] = $user->link;


        echo  $_SESSION['nome'];

      }

    }else{

      echo "Erro de conexão com Facebook";

      exit(0);

    }

 

  }else{
    echo "Erro de conexão com Facebook";

    exit(0);

  }

    }else if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['error'])){

      echo 'Permissão não concedida';

    }
}


}