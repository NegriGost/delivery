<!--Formulario do Utilizador-->
@extends('layouts.app')
<!--Titulo-->
@section('titulo')
	Registo do Restaurante
@endsection
<!--Conteudo-->
<br><br>
@section('conteudo')
<div class="container">
 <form method="post" action="/form_gravar_restaurante">
 	<!--csrf_field-->
 	{{csrf_field()}}
 	@include('inc.erros')
 		<h4 style="font-size: 23px"  class="text-success">Dados do Restaurante</h4><hr>
	 	<div class="row">
	 		 <div class="col-md-6 col-sm-8  col-xs-12">
	 		 	<div class="form-group">
			  	<label for="txt_nome">Nome</label>
			    <input type="text" class="form-control" name="txt_nome"  id="txt_nome"  placeholder="Introduza o nome do restaurante">
			  </div>
	

		      <div class="form-group">
			 	<label for="txt_numero">Numero:</label>
			    <input type="number" class="form-control" name="txt_numero"  id="txt_numero"  placeholder="informe o numero">
		      </div>
		      <div class="form-group">
				  <label for="txt_cozinha">Tipo de Cozinha:</label>
				  <select class="form-control" id="txt_cozinha" name="txt_cozinha">
				  		@foreach($cozinhas as $coz)
				    		<option value="{{$coz->id_cozinha}}">{{$coz->coz_nome}}</option>
				        @endforeach
				  </select>
	        </div>


	 	     </div><!--Fim Da coluna-->

		    <div class="col-md-6  col-sm-8 col-xs-12">
		    	<!--Segunda  coluna-->
			  
			 <div class="form-group">
			 	<label for="txt_endereco">Endereco:</label>
			    <input type="text" class="form-control" name="txt_endereco"  id="txt_endereco"  placeholder="Introduza o seu endereco">
			 </div>	

	        <div class="form-group">
			  	<label for="txt_telefone">Telefone:</label>
			    <input type="text" class="form-control" name="txt_telefone"  id="txt_telefone"  placeholder="Introduza o telefone">
			 </div>

			 <div class="form-group">
				 	<label for="txt_email">Email:</label>
				    <input type="email" class="form-control" name="txt_email"  id="txt_email"  placeholder="Introduza o seu email">
			  </div>

		   </div>
	
	 	</div>
	 	<!--Fim da primeira linha-->

	 	<h4 style="font-size: 23px" class="text-success">Dados de Acesso</h4><hr>
		 		
		 	<!-- Fim da segunda Linha -->
	 	<div class="row">

	 		 <div class="col-md-6  col-sm-8 col-xs-12">
		 		<div class="form-group">
				 	<label for="txt_senha">Senha:</label>
				    <input type="password" class="form-control"  id="txt_senha" name="txt_senha" placeholder="Introduza a senha">
				 </div>
		    </div>

	 		 <div class="col-md-6 col-sm-8  col-xs-12">
				 <div class="form-group">
			 	<label for="txt_Senhaf">Confirmar Senha:</label>
			    <input type="password" class="form-control"  id="txt_Senhaf" name="txtSenhaf" placeholder="Confirmar a senha">
				 </div>
			 </div>

	 	</div><!--Fim da 3 linha-->
		
		<button type="submit" class="btn btn-success btn-lg">Criar Conta</button>

	</form>

</div>
<br><br>
@endsection
