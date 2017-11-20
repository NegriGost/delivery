<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
class ProdutoController extends Controller
{
    public function compra(Request $request){

	    if($request->action=="add"){
	    	$output='

			    			    1......... '.$request->nome.' ........'.$request->preco.'

	    	';
	    	return $output;
	    }
	}

    	   
}
