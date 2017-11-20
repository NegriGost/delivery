@extends('layouts.app')
@section('titulo')
	Compras Online
@endsection
<br><br><br><br>
@section('jumbotron')
<div class="jumbotron jumbotron-dash text-center navbar-fixed-top">
	<div class="container">
		<div class="row">
			<!--Pesquisar-->
			<div class="col-sm-6 col-sm-offset-3" >
				 <form class="form-inline" method="post" action="/lista_de_restaurante">
				    <!--csrf_field-->
				    {{csrf_field()}}
				    <div class="input-group">
				      <input type="text" class="form-control" size="50" placeholder="Informe o prato...">
			      <div class="input-group-btn">
				        <button type="submit" class="btn btn-success" >Pesquisar</button>
				      </div>
				    </div>
				  </form>
			</div>
		</div>
    </div>
</div>

@endsection
@section('conteudo')

	<div class="row">
		<div class="col-md-8">			
					<form>
						<div class="row">
							@foreach($produto as $prod)
							<div class="col-sm-4">
									<div class="panel panel-default" style="background-color:#f1f1f1;padding:10px;cursor:move;border-radius:5px">
										<div class="panel-body text-center" >
		
											<center>
												<img src="/img/{{$prod->imagem}}" style="width:160px;border-radius:5px;height: 150px" alt="Restaurante didatico icm" class="img-responsive img-drag" data-id="{{$prod->id_produto}}" data-nome="{{$prod->nome}}" data-preco="{{$prod->preco}}"   >
											</center>
											<h4 class="text-primary text-center" style="font-size:16px">{{$prod->nome}}</h4>
											<h4 class="text-danger text-center">MZN {{$prod->preco}}</h4>
										</div>
									</div>

							</div><!--fim da coluna-->
							@endforeach

						</div><!--fim da Linha-->
				   </form><!--Fim do formulario-->

		</div><!--Fim da Row 8-->


	<div class=" col-md-4" >			
		<div class="panel panel-default" class="nav nav-pills nav-stacked" data-spy="affix" style="width:25%">
				<div class="panel-heading" >
					<h4 class="text-success text-center"><span style="font-size:30px" class="glyphicon glyphicon-shopping-cart"></span>Restaurante Continental</h4>
				</div>

				<div class="panel-body" >
						<div class="area_drag_protuto  table-responsive " style="height:200px">
						</div>
				</div>

				<div class="panel-footer panel-default">
					<button type="button" class="btn btn-success btn-block">Finalizar pedido</button>
				</div>
			    
		</div>
	</div>
</div>
@endsection

