<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
     public function index()
    {
       return view('cliente.perfil_cliente');
    }


    public function create()
    {
        
    }

     public function store(Request $request)
    {
        //Validacao
            $this->validate($request,[
                'nome'=>'required|between:3,30|alpha_num',
                'apelido'=>'required|between:3,30|alpha_num',
                'telefone'=>'required|between:9,9|alpha_num',
                'senha'=>'required|between:8,30',
                'senhaf'=>'required|same:senha',
                'email'=>'required|email',
            ]);

           //Verificacao do usuario
            $dados=Cliente::where('nome','=',$request->nome)
            ->orWhere('email','=',$request->email)
            ->get();

            if($dados->count()!=0){
                $erros_bd=['Ja existe um usuario com mesmo nome ou com mesmo email'];
                return view('clienteform',compact('erros_bd'));
            }

            //Inserir na base de dados
            $novo=new Cliente();
            $novo->nome=$request->nome;
            $novo->apelido=$request->apelido;
            $novo->telefone=$request->telefone;
            $novo->senha=hash::make($request->senha);
            $novo->email=$request->email;
            $novo->save();


            return redirect('/form_registar_cliente');
    }


    public function show(Cliente $cliente)
    {
        //
    }


    public function edit(Cliente $cliente)
    {
        //
    }

    
    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    public function destroy(Cliente $cliente)
    {
        //
    }
}
