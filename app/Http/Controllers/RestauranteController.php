<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mapper;
use App\Produto;
use Illuminate\Support\Facades\Input;
use App\TipoDeCozinha;
use App\Restaurante;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\Endereco;
use DB;
class RestauranteController extends Controller
{
    
    //exibir a localizacao corrente do cliente   
    public function userLocation(){
        $conteudo='<center>
                         <h4 class="text-success text-center">
                            Vc esta aqui?
                        </h4>
                        <a href="/lista_de_restaurantes" class="btn btn-primary btn-block">Confirmar Endereco                         
                        </a>
                    </center>';

       Mapper::map(-25.935872,32.5705728,['marker'=>false,'markers'=>['icon'=>'img/clientes.png']])

      ->informationWindow(-25.935872,32.5705728,$conteudo,['marker'=>true,'open'=>true]);
       
       return view('restaurantes.mapa_cliente');
    }


    //restaurante location
    public function restauranteLocation(){
         Mapper::map(-25.935872,32.5705728,['marker'=>false,'locate'=>false,'markers'=>['autoClose'=> true]]);
        
        $restaurantes =Restaurante::all();
        $restaurantes->each(function($enderecos)
        {
                 $content='<center><h4 class="text-success text-center">'.$enderecos->rest_nome.'</h4><h5>'.$enderecos->rest_endereco.'</h5><a class="btn btn-success btn-block" href="/carrinho_de_compras/'.$enderecos->id_restaurante.'">Visualizar Cadapio</a></center>';
                 Mapper::informationWindow($enderecos->rest_lat,$enderecos->rest_long,$content,['open'=>false,'marker'=>true]);
        });


        Mapper::informationWindow(-25.935872,32.5705728,"<h5 class='text-center text-primary'>Escolha o Restaurante<br>Mais Proximo de Si.</h5>",['open'=>true,'icon'=>'img/clientes.png']);

         return view('restaurantes.mapa_restaurante',compact('restaurantes'));

    }




    //formulario para registar restaurante
    public function registar(){
        $cozinhas=TipoDeCozinha::all();
        return view('restaurantes.form_restaurante',compact('cozinhas'));
    }

    //funcao que devolve todos restaurantes de uma determinada cozinha
    public function restaurantes_cozinha($id){
        $categoria=TipoDeCozinha::find($id);
        $categorias=TipoDeCozinha::all();
        $restaurantes=$categoria->restaurantes;
        return view('restaurantes.lista_restaurante',compact('categorias','restaurantes'));
    }

    //funcao que retorna todos os restaurantes
    public function restaurantes(){
        $categorias=TipoDeCozinha::all();
        $restaurantes=Restaurante::all();
        return view('restaurantes.lista_restaurante',compact('restaurantes','categorias'));
    }

    //Retorna a lista de produtos de um restaurante
    public function compras($id){
        $restaurante=Restaurante::find($id);
    	$produto=$restaurante->produtos;
        return view('restaurantes.carrinho',compact('produto','restaurante'));
    }


    //funcao para salvar o restaurante na base de dados
    public function salvar(Request $request){

           
            $nomeEndereco=str_replace(' ','+',$request->txt_nome."+".$request->txt_endereco);
            $geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$nomeEndereco.'&sensor=false');

            $output= json_decode($geocode);
            $lat= $output->results[0]->geometry->location->lat;
            $long = $output->results[0]->geometry->location->lng;

            $restaurante=new Restaurante;
            $restaurante->id_cozinha=$request->txt_cozinha;
            $restaurante->rest_nome=$request->txt_nome;
            $restaurante->rest_endereco=$request->txt_endereco;
            $restaurante->rest_numero=$request->txt_numero;
            $restaurante->rest_telefone=$request->txt_telefone;
            $restaurante->rest_email=$request->txt_email;
            $restaurante->rest_senha=hash::make($request->txt_senha);
            $restaurante->rest_imagem='logo.png';
            $restaurante->rest_status='1';
            $restaurante->rest_lat=$lat;
            $restaurante->rest_long=$long;

            $restaurante->save();

            $cozinhas=TipoDeCozinha::all();
            $alert_success=['Restaurante Registado com sucesso!!!'];
            return view('restaurantes.form_restaurante',compact('alert_success','cozinhas'));

    }

    

    public function imgupload(){
        if(Input::hasFile('file')){
            $file=Input::file('file');
            $file->move('img',$file->getClientOriginalName());
         return $file->getClientOriginalName();
        }
    }



}