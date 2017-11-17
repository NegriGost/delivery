<?php

  $geocode = file_get_contents("https://maps.googleapis.com/maps/api/place/autocomplete/json?input=Vict&types=(cities)&language=pt_BR&key=AIzaSyD4OvakaqKbVP-4N10Tr0L70PFhQS1oR2k");

   $output= json_decode($geocode);

  echo $output;

?>