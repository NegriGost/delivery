<!--Formulario do Utilizador-->
@extends('layouts.app')
<!--Titulo-->
@section('titulo')
	Editar perfil
@endsection
<!--Conteudo-->
<br>
@section('conteudo')
<!-- Emissao de Erros -->
@include('inc.erros')
<div class="container">
 <form method="post" action="/form_atualizar_perfil">

 	<!--csrf_field-->
 	{{csrf_field()}}
 		
 		<h4 class="text-success">Meu Perfil</h4>
 		<h4 style="background-color:#ddd; padding:5px">Dados Pessoais</h4>
	 	<div class="row">
	 		 <div class="col-md-6 col-sm-8  col-xs-12">
	 		 	<center>
	 		 		<img class="img-responsive" src="{{asset('img/sem_foto.png')}}" style="border-radius:90px;margin-top:45px">
	 		 	</center>

	 	     </div><!--Fim Da coluna-->
		    <div class="col-md-6  col-sm-8 col-xs-12">
		    	<!--Segunda  coluna-->
			  <div class="form-group">
			  	<label for="txtNome">Nome</label>
			    <input type="text" value="" class="form-control" name="txtNome"  id="txtNome"  placeholder="Introduza o seu nome">
			  </div>
			  <div class="form-group">
			 	<label for="txtApelido">Apelido</label>
			    <input type="text" value=""  class="form-control" name="txtApelido"  id="txtApelido"  placeholder="Introduza o seu apelido">
			  </div>	
			  <div class="form-group">
			 	<label for="txtTelefone">Telefone</label>
			    <input type="number" value="" class="form-control" name="txtTelefone"  id="txtTelefone"  placeholder="Introduza o seu telafone">
			  </div>	

			  <div class="form-group">
			 	<label for="txtEmail">Email</label>
			    <input type="text" value="" disabled class="form-control" name="txtEmail"  id="txtEmail"  >
			  </div>
			 

		   </div>
	
	 	</div><!--Fim da row-->

	 	<h4 style="background-color:#ddd;padding:5px">Dados de Acesso</h4>
	 		<div class="row">
	 		 <div class="col-md-6 col-sm-8  col-xs-12">
	 		 
		      <div class="form-group">
			 	<label for="txtSenhaA">Senha Atual</label>
			    <input type="password" class="form-control"  id="txtSenhaA" name="txtSenhaA" placeholder="Introduza a senha atual">
			 </div>

		     

		  </div>

		  <div class="col-md-6  col-sm-8 col-xs-12">
	 		<div class="form-group">
			 	<label for="txtSenha">Nova Senha</label>
			    <input type="password" class="form-control"  id="txtSenha" name="txtSenha" placeholder="Introduza a senha">
			 </div>
		   </div>

	 	</div><!--Fim da row-->

	 <button type="submit" class="btn btn-success btn-lg">Salvar</button>
	</form>
</div>
@endsection

