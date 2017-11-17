<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mapper;

class RestauranteController extends Controller
{
    
    public function index(){
    	$local= @unserialize(file_get_contents('http://ip-api.com/php'));
    	$latitude=$local['lon'];
    	$longitude=$local['lat'];

    	
    	Mapper::map(-25.8962418,32.5406427);

    	return view('restaurantes.mapa');



    	// return view('restaurantes.lista_restaurante')->with('output');
    }
}
