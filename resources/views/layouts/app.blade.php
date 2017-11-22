<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">

<head>

  <!--Definicao do titulo-->
    <title>@yield('titulo','Swakuda Software Development')</title>

  <!--Definicao dos meta Tags-->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">  
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sistema de pedidos online para restaurantes">
    <meta name="author" content="Rodrigues Mafumo,Dionisio Macamo, Costa Tangune">
  
  <!--Definicao de Links-->
    <link rel="icon" href="{{asset('img/logokuda1.png')}}">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/workaround.css')}}" rel="stylesheet">
    <link href="{{asset('css/estilo.css')}}" rel="stylesheet">

  </head>

  <body>
    <!--definicao da navegacao-->
     @include('segmentos.app_header')
   
    <!--jumbotron-->
     @yield('jumbotron')

    <!--Conteudo-->
    <div class="container-fluid">
       @yield('conteudo')
    </div>

  <!--Definicao do footer-->
    @include('segmentos.app_footer')

	<!-- Area de Sripts -->
    @include('segmentos.app_scripts')
    
</body>

</html>