 <script src="{{asset('js/emulador.js')}}"></script>
    <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}/"></script>
    <script src="{{asset('js/workaround.js')}}"></script>

<!-- Processso de Drag and Drop de produtos -->
<script type="text/javascript">
   $('.area_drag_protuto').on('dragover',function(){
    $(this).addClass('produto_drag_over');
    return false;
  });


  $('.area_drag_protuto').on('dragleave',function(){
    $(this).removeClass('produto_drag_over');
    return false;
  });

   $('.img-drag').on('dragstart',function(e){
    // $(this).removeClass('produto_drag_over');
    e.originalEvent.dataTransfer.setData('id',$(this).data('id'));
    e.originalEvent.dataTransfer.setData('nome',$(this).data('nome'));
    e.originalEvent.dataTransfer.setData('preco',$(this).data('preco'));
  });

    $('.area_drag_protuto').on('drop',function(e){
        e.preventDefault();
        $(this).removeClass('produto_drag_over');
        var id=e.originalEvent.dataTransfer.getData('id');
        var nome=e.originalEvent.dataTransfer.getData('nome');
        var preco=e.originalEvent.dataTransfer.getData('preco');
        var action="add";
        
        $.ajax({
          url:"/produtos",
          method:"get",
          data:{id:id,nome:nome,preco:preco,action:action},
          success:function(data){
            $('.area_drag_protuto').html(data);
          }

        });
        //definir as variaveis que vao assuir o servidor  com ajax
  });

//Fim do drag and drop
</script>
   
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

   
