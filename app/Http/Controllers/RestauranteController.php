<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mapper;
use App\Produto;
class RestauranteController extends Controller
{
    
    public function index(Request $request){

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

    //    Mapper::map(40.59726025535419, 80.02503488467874, ['marker' => false]);

    // // Add information window for each address
    // $collection = \App\Address::all();

    // $collection->each(function($address)
    // {
    //     $content = $address->users->name;

    //     Mapper::informationWindow($address->latitude, $address->longitude, $content);
    // });

    // return view('googlmapper', compact('collection'));



    	// return view('restaurantes.lista_restaurante')->with('output');
    }


    public function compras($id){
    	$produto=Produto::all();
        return view('restaurantes.carrinho',compact('produto'));
    }


}
