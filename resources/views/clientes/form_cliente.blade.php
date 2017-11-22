<!--Formulario do Utilizador-->
@extends('layouts.app')
<!--Titulo-->
@section('titulo')
	Registo do Usuario
@endsection
<!--Conteudo-->
<br><br>
@section('conteudo')
<div class="container">
 <form method="post" action="/form_gravar_cliente">

	 	<!--csrf_field-->
	 	{{csrf_field()}}
	    @include('inc.erros')
 		<h3   class="text-success">Dados Pessoais</h3><hr>
	 	<div class="row">

	 		 <div class="col-md-6 col-sm-8  col-xs-12">
	 		 	<div class="form-group">
			  	<label for="txtNome">Nome</label>
			    <input type="text" class="form-control" name="txtNome"  id="txtNome"  placeholder="Introduza o seu nome">
			  </div>

			  <div class="form-group">
			 	<label for="txtTelefone">Telefone</label>
			    <input type="number" class="form-control" name="txtTelefone"  id="txtTelefone"  placeholder="Introduza o seu telefone">
			 </div>	

	 	     </div><!--Fim Da coluna-->
		    <div class="col-md-6  col-sm-8 col-xs-12">
		    	<!--Segunda  coluna-->
			  
			 <div class="form-group">
			 	<label for="txtApelido">Apelido</label>
			    <input type="text" class="form-control" name="txtApelido"  id="txtApelido"  placeholder="Introduza o seu apelido">
			 </div>	

			  <div class="form-group">
			 	<label for="txtEmail">Email</label>
			    <input type="email" class="form-control" name="txtEmail"  id="txtEmail"  placeholder="Introduza o seu email">
		      </div>

		   </div>
	
	 	</div><!--Fim da row-->

	 	<h3 class="text-success">Dados de Acesso</h3><hr>
	 		<div class="row">
	 		 <div class="col-md-6 col-sm-8  col-xs-12">

			 <div class="form-group">
			 	<label for="txtSenha">Senha</label>
			    <input type="password" class="form-control"  id="txtSenha" name="txtSenha" placeholder="Introduza a senha">
			 </div>

		  </div>
		  <!-- Fim da primeira coluna -->

			<div class="col-md-6  col-sm-8 col-xs-12">
	 		
		      <div class="form-group">
			 	<label for="txtSenhaf">Confirmar Senha</label>
			    <input type="password" class="form-control"  id="txtSenhaf" name="txtSenhaf" placeholder="Introduza a senha">
			 </div>

		    </div>
		    <!-- Fim da segunda coluna -->

	 	</div><!--Fim da row-->

	 <button type="submit" class="btn btn-success btn-lg">Criar Conta</button>
	</form>
	</div>
	<br><br><br><br>
@endsection

