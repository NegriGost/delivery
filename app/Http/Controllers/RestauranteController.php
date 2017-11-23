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

    //Busca todos os retaurantes em funcao da localizacao do cliente
    public function buscar_endereco(Request $request){
    	  $this->validate($request,[
                'txt_autocomplete'=>'required',
                'txt_numero'=>'required',
           ]);

	    	$endereco=$request->txt_autocomplete;

	        $endereco_convertido=str_replace(' ','+',$endereco);
	        $localizacao=str_replace(',','+', $endereco_convertido);
            try{
	    	$geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$localizacao.'&sensor=false');

	    	$output= json_decode($geocode);

            $latitude= $output->results[0]->geometry->location->lat;
            $longitude= $output->results[0]->geometry->location->lng;

            }catch(ErrorException  $e) {
                return "<script>alert('Erro de conexao com a internet,Ou Local nao Encontrado')</script>";
            }

            $address=new Endereco;
            $address->id_usuario=3;
            $address->end_nome=$endereco;
            $address->end_numero=$request->txt_numero;
            $address->end_lat=$latitude;
            $address->end_long=$longitude;
            $address->save();

            $id=3;


            $conteudo='<h4 class="text-success text-center">Eu estou em:</h4><br><center><h5>'.$endereco.'<br>Numero:'.$request->txt_numero.'</h5></center><br><a href="/lista_de_restaurantes'.$id.' " class="btn btn-primary btn-block">Confirmar Endereco</a>';
			
            Mapper::map($latitude, $longitude,['marker' =>false]); 
           
            Mapper::informationWindow(
                $latitude, $longitude,$conteudo,
                ['open'=>true,'markers'=>['icon' =>'img/cliente.png']]
            );

      		return view('restaurantes.mapa_cliente',compact('cozinhas','endereco'));
    }


    //Retorna a lista de produtos de um restaurante
    public function compras($id){
        $restaurante=Restaurante::find($id);
    	$produto=$restaurante->produtos;
        return view('restaurantes.carrinho',compact('produto','restaurante'));
    }

    // Retorna o mapa de todos restaurantes
    public function mapa_restaurantes(){
        //Marcador difault eh cidade de Maputo
        $id=3;
        $endereco=Endereco::where('id_usuario','=',$id)->first();
        Mapper::map($endereco->end_lat,$endereco->end_long, ['marker' =>true,'markers'=>['icon'=>'/img/cliente.png']]);
        // Informacao do endereco para cada restaurante
        $restaurantes =Restaurante::all();

        $restaurantes->each(function($enderecos)
        {
              $content='<center><h4 class="text-success text-center">'.$enderecos->rest_nome.'</h4><h5>'.$enderecos->rest_endereco.'</h5><a class="btn btn-success btn-block" href="/carrinho_de_compras/'.$enderecos->id_restaurante.'">Visualizar Cadapio</a></center>';
            Mapper::informationWindow($enderecos->rest_lat,$enderecos->rest_long,$content,['open'=>true]);
        });

        //retornar todos restaurantes no mapa.
        return view('restaurantes.mapa_restaurante', compact('restaurantes'));

    }

    //funcao para salvar o restaurante na base de dados
    public function salvar(Request $request){

            if(!isset($request->txt_nome) && !isset($request->txt_endereco) && !isset($request->txt_numero)){
                $errors=['Preencha O fromulario!!!'];
                return view('restaurantes.form_restaurante',compact('errors'));
            }

            $nomeConvert=str_replace(' ','+',$request->txt_nome."+".$request->txt_endereco);
            //Tratando a Excepcao

            // if (!$sock = @fsockopen('http://maps.google.com/maps/api/geocode/json?address='.$nomeConvert.'&sensor=false', 80, $num, $error, 5)){
            //     return 'OFF LINE';
            // }else{
            //      try{

                 

            //      }catch(ErrorException  $e){
            //          echo 'Erro! Ligue a sua internet';
            //      }
            // }  

            $geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$nomeConvert.'&sensor=false');

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