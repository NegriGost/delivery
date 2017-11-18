@extends('layouts.app')
@section('titulo')
	Compras Online
@endsection
@section('jumbotron')
<div class="jumbotron jumbotron-dash text-center navbar-fixed-top">
	<div class="container">
		<div class="row">
			<!--Pesquisar-->
			<div class="col-sm-6 col-sm-offset-3" >
				 <form class="form-inline" method="post" action="{{url('lista_de_restaurante')}}">
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
<br><br><br>
@section('conteudo')
<h1 class="text-success" style="margin-left:15px">Restaurante  Continental</h1><br>

	<div class="col-md-8">			
					<form>
						<div class="row">
							<div class="col-sm-4">
									<div class="panel panel-default" style="background-color:#f1f1f1;padding:10px;cursor:move;border-radius:20px">
										<div class="panel-body text-center" >
											<center><img src="{{asset('img/f4.jpg')}}" style="width:160px;border-radius:10px;height: 150px" alt="Restaurante didatico icm" class="img-responsive"></center>
											<h4 class="text-primary text-center" style="font-size:16px">Hamburguer Completo</h4>
											<h4 class="text-danger text-center">100 MZN</h4>
										</div>
									</div>

							</div><!--fim da coluna-->

									<div class="col-sm-4">
									<div class="panel panel-default" style="background-color:#f1f1f1;padding:10px;cursor:move;border-radius:20px">
										<div class="panel-body text-center" >
											<center><img src="{{asset('img/f4.jpg')}}" style="width:160px;border-radius:10px;height: 150px" alt="Restaurante didatico icm" class="img-responsive"></center>
											<h4 class="text-primary text-center" style="font-size:16px">Hamburguer Completo</h4>
											<h4 class="text-danger text-center">100 MZN</h4>
										</div>
									</div>

							</div><!--fim da coluna-->


							<div class="col-sm-4">
									<div class="panel panel-default" style="background-color:#f1f1f1;padding:10px;cursor:move;border-radius:20px">
										<div class="panel-body text-center" >
											<center><img src="{{asset('img/f4.jpg')}}" style="width:160px;border-radius:10px;height: 150px" alt="Restaurante didatico icm" class="img-responsive"></center>
											<h4 class="text-primary text-center" style="font-size:16px">Hamburguer Completo</h4>
											<h4 class="text-danger text-center">100 MZN</h4>
										</div>
									</div>

							</div><!--fim da coluna-->




							<div class="col-sm-4">
									<div class="panel panel-default" style="background-color:#f1f1f1;padding:10px;cursor:move;border-radius:20px">
										<div class="panel-body text-center" >
											<center><img src="{{asset('img/f4.jpg')}}" style="width:160px;border-radius:10px;height: 150px" alt="Restaurante didatico icm" class="img-responsive"></center>
											<h4 class="text-primary text-center" style="font-size:16px">Hamburguer Completo</h4>
											<h4 class="text-danger text-center">100 MZN</h4>
										</div>
									</div>

							</div><!--fim da coluna-->




							<div class="col-sm-4">
									<div class="panel panel-default" style="background-color:#f1f1f1;padding:10px;cursor:move;border-radius:20px">
										<div class="panel-body text-center" >
											<center><img src="{{asset('img/f4.jpg')}}" style="width:160px;border-radius:10px;height: 150px" alt="Restaurante didatico icm" class="img-responsive"></center>
											<h4 class="text-primary text-center" style="font-size:16px">Hamburguer Completo</h4>
											<h4 class="text-danger text-center">100 MZN</h4>
										</div>
									</div>

							</div><!--fim da coluna-->




							<div class="col-sm-4">
									<div class="panel panel-default" style="background-color:#f1f1f1;padding:10px;cursor:move;border-radius:20px">
										<div class="panel-body text-center" >
											<center><img src="{{asset('img/f4.jpg')}}" style="width:160px;border-radius:10px;height: 150px" alt="Restaurante didatico icm" class="img-responsive"></center>
											<h4 class="text-primary text-center" style="font-size:16px">Hamburguer Completo</h4>
											<h4 class="text-danger text-center">100 MZN</h4>
										</div>
									</div>

							</div><!--fim da coluna-->



							<div class="col-sm-4">
									<div class="panel panel-default" style="background-color:#f1f1f1;padding:10px;cursor:move;border-radius:20px">
										<div class="panel-body text-center" >
											<center><img src="{{asset('img/f4.jpg')}}" style="width:160px;border-radius:10px;height: 150px" alt="Restaurante didatico icm" class="img-responsive"></center>
											<h4 class="text-primary text-center" style="font-size:16px">Hamburguer Completo</h4>
											<h4 class="text-danger text-center">100 MZN</h4>
										</div>
									</div>

							</div><!--fim da coluna-->



							<div class="col-sm-4">
									<div class="panel panel-default" style="background-color:#f1f1f1;padding:10px;cursor:move;border-radius:20px">
										<div class="panel-body text-center" >
											<center><img src="{{asset('img/f4.jpg')}}" style="width:160px;border-radius:10px;height: 150px" alt="Restaurante didatico icm" class="img-responsive"></center>
											<h4 class="text-primary text-center" style="font-size:16px">Hamburguer Completo</h4>
											<h4 class="text-danger text-center">100 MZN</h4>
										</div>
									</div>

							</div><!--fim da coluna-->



							<div class="col-sm-4">
									<div class="panel panel-default" style="background-color:#f1f1f1;padding:10px;cursor:move;border-radius:20px">
										<div class="panel-body text-center" >
											<center><img src="{{asset('img/f4.jpg')}}" style="width:160px;border-radius:10px;height: 150px" alt="Restaurante didatico icm" class="img-responsive"></center>
											<h4 class="text-primary text-center" style="font-size:16px">Hamburguer Completo</h4>
											<h4 class="text-danger text-center">100 MZN</h4>
										</div>
									</div>

							</div><!--fim da coluna-->



							<div class="col-sm-4">
									<div class="panel panel-default" style="background-color:#f1f1f1;padding:10px;cursor:move;border-radius:20px">
										<div class="panel-body text-center" >
											<center><img src="{{asset('img/f4.jpg')}}" style="width:160px;border-radius:10px;height: 150px" alt="Restaurante didatico icm" class="img-responsive"></center>
											<h4 class="text-primary text-center" style="font-size:16px">Hamburguer Completo</h4>
											<h4 class="text-danger text-center">100 MZN</h4>
										</div>
									</div>

							</div><!--fim da coluna-->



							<div class="col-sm-4">
									<div class="panel panel-default" style="background-color:#f1f1f1;padding:10px;cursor:move;border-radius:20px">
										<div class="panel-body text-center" >
											<center><img src="{{asset('img/f4.jpg')}}" style="width:160px;border-radius:10px;height: 150px" alt="Restaurante didatico icm" class="img-responsive"></center>
											<h4 class="text-primary text-center" style="font-size:16px">Hamburguer Completo</h4>
											<h4 class="text-danger text-center">100 MZN</h4>
										</div>
									</div>

							</div><!--fim da coluna-->



							<div class="col-sm-4">
									<div class="panel panel-default" style="background-color:#f1f1f1;padding:10px;cursor:move;border-radius:20px">
										<div class="panel-body text-center" >
											<center><img src="{{asset('img/f4.jpg')}}" style="width:160px;border-radius:10px;height: 150px" alt="Restaurante didatico icm" class="img-responsive"></center>
											<h4 class="text-primary text-center" style="font-size:16px">Hamburguer Completo</h4>
											<h4 class="text-danger text-center">100 MZN</h4>
										</div>
									</div>

							</div><!--fim da coluna-->



							<div class="col-sm-4">
									<div class="panel panel-default" style="background-color:#f1f1f1;padding:10px;cursor:move;border-radius:20px">
										<div class="panel-body text-center" >
											<center><img src="{{asset('img/f4.jpg')}}" style="width:160px;border-radius:10px;height: 150px" alt="Restaurante didatico icm" class="img-responsive"></center>
											<h4 class="text-primary text-center" style="font-size:16px">Hamburguer Completo</h4>
											<h4 class="text-danger text-center">100 MZN</h4>
										</div>
									</div>

							</div><!--fim da coluna-->
						</div><!--fim da Linha-->
				   </form><!--Fim do formulario-->

	</div><!--Fim da Row 8-->


	<div class="col-md-4 col-md-offset-7 affix">			
		<div class="panel panel-default">
				<div class="panel-heading" >
					<h4 class="text-success text-center"><span class="glyphicon glyphicon-shopping-cart"></span>Seu Carrinho de compras</h4>
				</div>

				<div class="panel-body ">
						<div class="area_drag_protuto" style="height:100px">
							<p class="text-center">Arraste os Produtos Aqui</p>
							<img src="img-responsive img-drag">
						</div>
				</div>
			    
		</div>
	</div>
@endsection
