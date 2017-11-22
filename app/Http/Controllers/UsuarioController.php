<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Session;

class UsuarioController extends Controller
{
    public function registar_usuario(){
    	return view('clientes.form_cliente');
    }

    public function login(){
    	return view('clientes.form_login');
    }

    public function recuperar_usuario(){
    	return view('clientes.form_recuperar');
    }

    public function registar_endereco(){
    	return view("clientes.form_endereco_cliente");
    }
    public function editar_perfil(){
    	return view("clientes.form_editar_perfil");
    }

    //formulario para gravar o usuario
    public function salvar(Request $request){
    	//Validacao
            $this->validate($request,[
                'txtNome'=>'required|between:3,30|alpha_num',
                'txtApelido'=>'required|between:3,30|alpha_num',
                'txtTelefone'=>'required|between:9,9|alpha_num',
                'txtSenha'=>'required|between:8,30',
                'txtSenhaf'=>'required|same:txtSenha',
                'txtEmail'=>'required|email',
            ]);

            //Verificacao do usuario
            $clientes=Usuario::where('usu_nome','=',$request->txtNome)
            ->orWhere('usu_email','=',$request->txtEmail)
            ->get();

            if($clientes->count()!=0){
                $erros_bd=['Ja existe um usuario com mesmo nome ou com mesmo email'];
                return view('form_registar_cliente',compact('erros_bd'));
            }

            //Inserir na base de dados
            $novo_cliente=new Usuario;
            $novo_cliente->usu_nome=$request->txtNome;
            $novo_cliente->usu_apelido=$request->txtApelido;
            $novo_cliente->usu_telefone=$request->txtTelefone;
            $novo_cliente->usu_senha=hash::make($request->txtSenha);
            $novo_cliente->usu_email=$request->txtEmail;
            $novo_cliente->status='1';
            $novo_cliente->save();

            $alert_success=['Usuario Salvado com sucesso!!!'];

            return view('cliente.create',compact('alert_success'));
    }

    //funcao  para efectuar o login na base de dados
    public function efetuar_login(Request $request){
        //validacao
        $this->validate($request,[
                'txtEmail'=>'required|email',
                'txtSenha'=>'required'
         ]);
        

        //verificar se o email de usuario existe
        $user=Usuario::where('usu_email',$request->txtEmail)->first();
        

        if(count($user)==0){
            $erros_bd=['Essa conta de usuario nao existe'];
            return view('cliente.login',compact('erros_bd'));
        }

        //verificar se a senha existe
        if(!Hash::check($request->txtSenha,$user->usu_senha)){
            $erros_bd=['A Senha esta Incorrecta'];
            return view('cliente.login',compact('erros_bd'));
        }

        //Abrindo Sessao de usuario
        Session::put('sessao_cliente','sim');
        Session::put('nome',$user->usu_nome);
         return $this->perfil_do_usuario();
   }

   	//Efectuar Login com as redes sociais
    public function redirectToProvider($service)
    {
        return Socialite::driver($service)->redirect();
    }

    public function handleProviderCallback($service)
    {
        $user =Socialite::driver($service)->user();
        //Abrindo Sessao de usuario
        Session::put('sessao_cliente','sim');
        Session::put('nome',$user->name);
        return $this->perfil_do_usuario();
    }
    //====================================================

    //Visualizar o perfil do usuario
    public function perfil_do_usuario(){
    	return view('clientes.usuario_perfil');
    }


   //Fechar a sessao
   public function close(){
        Session::flush();
        return redirect('/');
   }

   //Enderecos do usuario
   public function enderecos_do_usuario(){
   	return view('clientes.enderecos_cliente');
   }
}
