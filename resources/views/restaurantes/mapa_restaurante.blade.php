@extends('restaurantes.index_restaurante')

@section('restaurante_content')
<div class="container">
<div class="row">
   <div class="col-md-12">      
    <div class="panel panel-default">
        <div class="panel-body">
          <div id="map" style="height:500px;width:100%">
            {!! Mapper::render() !!}
          </div>
          </div>
    </div>
  </div>
</div>
</div>
@endsection