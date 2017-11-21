<!--Formulario do Utilizador-->
@extends('layouts.app')
<!--Titulo-->
@section('titulo')
	Registo do Usuario
@endsection
<!--Conteudo-->
<br><br><br>
@section('conteudo')
 <form method="post" action="{{url('form_gravar_cliente')}}">

 	<!--csrf_field-->
 	{{csrf_field()}}
 		
	 	<div class="row">
	 		 <div class="col-md-5 col-md-offset-4 col-sm-8  col-xs-12">
	 			@include('inc.erros')
	 	     </div>
		    <div class="col-md-5 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12"><!--Segunda  coluna-->
		     <br>
			  <div class="form-group">
			    <input type="text" class="form-control input-lg" name="nome"  id="nome"  placeholder="Introduza o seu nome">
			  </div>
			 <div class="form-group">
			    <input type="text" class="form-control input-lg" name="apelido"  id="apelido"  placeholder="Introduza o seu apelido">
			 </div>	

			 <div class="form-group">
			    <input type="number" class="form-control input-lg" name="telefone"  id="telefone"  placeholder="Introduza o seu telefone">
			 </div>	

				<div class="form-group">
			    <input type="email" class="form-control input-lg" name="email"  id="email"  placeholder="Introduza o email">
			  </div>
			  <div class="form-group">
			    <input type="password" class="form-control input-lg"  id="senha" name="senha" placeholder="Introduza a senha">
			  </div>

			   <div class="form-group">
			    <input type="password" class="form-control input-lg" id="senhaf
			    " name="senhaf"  placeholder="confirme a senha">
			   </div>

 		 	   <center><button type="submit" class="btn btn-success btn-lg">Criar Nova Conta</button></center>

 		 	   <div class="text-center">
				   <a href="{{url('/form_login_cliente')}}">Login</a>
			   </div>

		   </div>
	
	 	</div>
	</form><br>
@endsection