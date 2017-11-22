<!--Formulario do Utilizador-->
@extends('layouts.app')
<!--Titulo-->
@section('titulo')
	Registar Enderecos
@endsection
<!--Conteudo-->
<br><br><br>
@section('conteudo')
<!-- Apresentacao de Erros -->
@include('inc.erros')
<div class="container">
	<form method="post" action="{{url('form_gravar_cliente')}}">
 	<!--csrf_field-->
 	{{csrf_field()}}
 		
 		<h3 class="text-success">Registo de Endereco</h3><hr>
	 	<div class="row">
	 		 <div class="col-md-6 col-sm-8  col-xs-12">
	 		 	<div class="form-group">
			  	<label for="txtProvincia">Provincia</label>
			    <input type="text" class="form-control" name="txtProvincia"  id="txtProvincia"  placeholder="Introduza a sua provincia">
			  </div>

			  <div class="form-group">
			 	<label for="txtDistrito">Distrito</label>
			    <input type="text" class="form-control" name="txtDistrito"  id="txtDistrito"  placeholder="Introduza o seu distrito">
			 </div>	

			 <div class="form-group">
			 	<label for="txtRua">Rua</label>
			    <input type="password" class="form-control"  id="txtRua" name="txtRua" placeholder="Introduza a Rua">

		      </div>

	 	     </div><!--Fim Da coluna-->
		    <div class="col-md-6  col-sm-8 col-xs-12">
		    	<!--Segunda  coluna-->
			  
			 <div class="form-group">
			 	<label for="txtBairro">Bairro</label>
			    <input type="text" class="form-control" name="txtBairro"  id="txtBairro"  placeholder="Introduza o Bairro">
			 </div>	

			  <div class="form-group">
			 	<label for="txtAvenida">Avenida</label>
			    <input type="email" class="form-control" name="txtAvenida"  id="txtAvenida"  placeholder="Introduza a  Avenida">

		      </div>

	 				 <div class="form-group">
					 	<label for="txtNumR">Numero da Rua</label>
					    <input type="password" class="form-control"  id="txtNumR" name="txtNumR" placeholder="Introduza a senha">
					 </div>


		   </div><!--Fim da coluna-->
	
	 	</div><!--Fim da row-->

	 <button type="submit" class="btn btn-success btn-lg">Salvar</button>
	</form>
</div>
<br><br><br><br><br><br><br>
@endsection

