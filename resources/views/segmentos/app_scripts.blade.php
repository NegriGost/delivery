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

<!--     <script>
      // Note: This example requires that you consent to location sharing when
      // prompted by your browser. If you see the error "The Geolocation service
      // failed.", it means you probably did not give permission for the browser to
      // locate you.
      var map, infoWindow;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 6
        });
        infoWindow = new google.maps.InfoWindow;

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            $('#latitude').val(pos.lat);

            $('#longitude').val(pos.lng);
             //alert(pos.lat+" "+pos.lng);

            infoWindow.setPosition(pos);
            infoWindow.setContent('Estou aqui.');
            infoWindow.open(map);
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
      }

      // function handleLocationError(browserHasGeolocation, infoWindow, pos) {
      //   infoWindow.setPosition(pos);
      //   infoWindow.setContent(browserHasGeolocation ?
      //                         'Error: The Geolocation service failed.' :
      //                         'Error: Your browser doesn\'t support geolocation.');
      //   infoWindow.open(map);
      // }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDnOio2-38aqc86jOFG4soPgvx6lVDIPRc&callback=initMap">
    </script> -->

    <!-- <script type="text/javascript">

      window.onload=geoFindMe;

      function geoFindMe() {
      var output = document.getElementById("out");

      if (!navigator.geolocation){
        output.innerHTML = "<p>O seu Browser nao suporta geolocalizacao</p>";
        return;
      }

      function success(position) {
        var latitude  = position.coords.latitude;
        var longitude = position.coords.longitude;

        output.innerHTML = '<p>Latitude is ' + latitude + '° <br>Longitude is ' + longitude + '°</p>';

        var img = new Image();
        img.src = "https://maps.googleapis.com/maps/api/staticmap?center=" + latitude + "," + longitude + "&zoom=13&size=300x300&sensor=false";

        output.appendChild(img);
      }

      function error() {
        output.innerHTML = "Descupe nao conseguimos ti localizar";
      }

      output.innerHTML = "<p>Locating…</p>";

      navigator.geolocation.getCurrentPosition(success, error);
    }
    </script>
 -->
<!-- 
 <script type="text/javascript">

      window.onload=getLocation;
   var x = document.getElementById("demo");

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
    x.innerHTML = "Latitude: " + position.coords.latitude + 
    "<br>Longitude: " + position.coords.longitude;
}
 </script> -->


 <!-- <script type="text/javascript">
   

  window.onload=getMyLocation

var map;

function getMyLocation(){
  if(navigator.geolocation){
    navigator.geolocation.getCurrentPosition(displayLocation);
  }else{
    alert('Nao conseguimos te localizar');
  }

}


function displayLocation(position){
  var latitude=position.coords.latitude;
  var longitude=position.coords.longitude;
  

  var latlong=new google.maps.LatLng(latitude,longitude);
  alert('Ola'+latitude+"  "+longitude);
  
  showMap(latlong);
  createMarker(latlong);
}


function showMap(latlng){
  var mapOptions={
  center:latlng,
  zoom:18,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  map=new google.maps.Map(document.getElementById('map'),mapOptions);
} 

function createMarker(latlng){

  var markerOptions={
    position:latlng,
    map:map,
    animation:google.maps.Animation.DROP,
    clickable:true
  }
  
  var marker=new google.maps.Marker(markerOptions);
}


function addInfoWindow(marker,latlng,content){

  var infoWindowOptions={
    content:content,
    position:latlng
  };

  var infoWindow=new google.maps.InfoWindow(infoWindowOptions);
    google.maps.event.addListener(marker,'click',function(){
    infoWindow.open(map);
  });

}


 </script> -->
<!--   <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDnOio2-38aqc86jOFG4soPgvx6lVDIPRc&callback=showMap">
  </script> -->