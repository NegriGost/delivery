@php
	$id=3;
@endphp

@extends('layouts.app')

@section('titulo')
  Lista de Restaurantes
@endsection
<br><br>
@section('conteudo')
<div class="container">
  <div class="row">
      <div class="col-md-4 col-md-offset-4" style="margin-left:10px; font-size:30px">
        <a href="/lista_de_restaurantes" data-toggle="tooltip" title="Visualizar a Lista de Restaurantes"><span class="glyphicon glyphicon-list"></span></a>
        
        <a href="/mapa_restaurantes" data-toggle="tooltip" title="Visualizar Restaurantes no Mapa"><span class="glyphicon glyphicon-map-marker" style="margin-left:5px;font-size:30px"></span></a>
      </div>
  </div>
</div>
 @yield('restaurante_content')
@endsection