@extends('restaurantes.index_restaurante')
@section('jumbotron')

@endsection
@section('restaurante_content')
<div class="container">
<!-- Primeira Linha -->
	<div class="row">
<!-- Segunda Coluna -->
		<div class="col-md-3">
			<div class="panel panel-success" style="margin-top:12px;height:auto;">
			  <div class="panel-heading text-center">Tipo de Comida</div>
			  <div class="panel-body">
			  	<ul class="nav nav-pills nav-stacked text-center">
			  		@foreach($categorias as $cat)
			  			<li><a href="/restaurantes_da_cozinha/{{$cat->id_cozinha}}">{{$cat->coz_nome}}</a></li>
			  		@endforeach
			  	</ul>
			  </div>
			</div>
	    </div>

<!-- Primeira Coluna -->
		<div class="col-md-9 ">
		<!--Inicio de uma nova coluna-->
						<!--Inicio de uma nova coluna-->
				 @foreach($restaurantes as $rest)
					<div class="col-md-6">			
						<a href="/carrinho_de_compras/{{$rest->id_restaurante}}" data-toggle="tooltip" title="Visualizar Cardapio">
							<div class="panel panel-info">
								<div class="panel-body" style="background-color:#f1f1f1;padding:10px;cursor:pointer;border-radius:5px">
									<div class="row">
										<div class="col-md-3">
											<img src="/img/{{$rest->rest_imagem}}" style="width:90px;height:60px" alt="Restaurante didatico icm" class="img-responsive">
										</div>
										<div class="col-md-9">
											<span class="text-primary"><b>{{$rest->rest_nome}}</b></span>
											<br>
										    <span style="margin-left:10px;width: 50px">
										    	{{$rest->rest_endereco}}
										    </span>
										</div>
									</div>
								
							    </div>
						    </div>
					 </a>
					</div><!--Fim do painel Restaurante-->
					@endforeach


				</div><!--Fim do painel body-->
			</div><!--Fim do painel default-->




	    </div><!--Fim da Linha -->


	</div>

@endsection