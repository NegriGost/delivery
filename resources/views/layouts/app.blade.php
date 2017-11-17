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
    <div class="container">
       @yield('conteudo')
    </div>

  <!--Definicao do footer-->
    @include('segmentos.app_footer')

	<!-- Area de Sripts -->
    <script src="{{asset('js/emulador.js')}}"></script>
    <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}/"></script>
    <script src="{{asset('js/workaround.js')}}"></script>
   
    <script type="text/javascript">


    var current_fs, next_fs, previous_fs; 
    var left, opacity, scale; 
    var animating;
     
    $(".next").click(function(){
      if(animating) return false;
      animating = true;
      
      current_fs = $(this).parent();
      next_fs = $(this).parent().next();
      $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

      next_fs.show(); 

      current_fs.animate({opacity: 0}, {
        step: function(now, mx) {
          scale = 1 - (1 - now) * 0.2;
          left = (now * 50)+"%";
          opacity = 1 - now;
          current_fs.css({
            'transform': 'scale('+scale+')',
            'position': 'absolute'
          });
          next_fs.css({'left': left, 'opacity': opacity});
        }, 
        duration: 800, 
        complete: function(){
          current_fs.hide();
          animating = false;
        }, 
        easing: 'easeInOutBack'
      });
    });
     
    $(".previous").click(function(){
      if(animating) return false;
      animating = true;
      
      current_fs = $(this).parent();
      previous_fs = $(this).parent().prev();

      $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
      
      previous_fs.show(); 
      current_fs.animate({opacity: 0}, {
        step: function(now, mx) {
          scale = 0.8 + (1 - now) * 0.2;
          left = ((1-now) * 50)+"%";
          opacity = 1 - now;
          current_fs.css({'left': left});
          previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
        }, 
        duration: 800, 
        complete: function(){
          current_fs.hide();
          animating = false;
        }, 
        easing: 'easeInOutBack'
      });
    });
     
    $(".submit").click(function(){
      return false;
    });
    
    </script>

   

    
</body>

</html>