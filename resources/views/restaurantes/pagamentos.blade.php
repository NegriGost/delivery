@extends('layouts.app')

@section('titulo')
 	 Lista de Restaurantes
@endsection

<br><br>
@section('conteudo')
   <div class="row">
      <!--Inicio de uma nova coluna-->
		<div class="col-md-6">			
				<div class="row">
					<div class="col-md-3">
						<div class="panel-body" style="background-color:#f1f1f1;padding:10px;cursor:pointer;border-radius:5px">
						</div>
					</div>
					
				</div>
		</div>
	</div><!--Fim do painel Restaurante-->
  </div>
  @yield('restaurante_content')
    
@endsection