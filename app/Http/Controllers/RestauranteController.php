<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mapper;
use App\Produto;
use Illuminate\Support\Facades\Input;
class RestauranteController extends Controller
{
        
    //formulario para registar restaurante
    public function registar(){
        return view('restaurantes.form_restaurante');
    }





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

    public function imgupload(){

        if(Input::hasFile('file')){
            $file=Input::file('file');
            $file->move('img',$file->getClientOriginalName());
         return $file->getClientOriginalName();
        }

       


    }



}