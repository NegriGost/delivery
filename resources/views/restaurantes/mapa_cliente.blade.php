@extends('layouts.app')
<br><br>
@section('conteudo')
<div class="container">
<div class="row">
   <div class="col-md-12">      
    <div class="panel panel-default">
        <div class="panel-body">
          <div id="map" style="height:600px;width:100%">
            {!! Mapper::render() !!}
          </div>
          </div>
    </div>
  </div>
</div>
</div>
@endsection