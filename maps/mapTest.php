<?php

   $modalPart=" $('#details-modal').on('shown.bs.modal', function () {google.maps.event.trigger(map,'resize');})";
  // $MapPart='<html><head><style>
  //                   h3{text-align:center;font-family:Comic Sans MS;font-weight:bold;color:#454977;}#map {height: 400px;width: 100%;}</style></head><body><h3>Hotel Location</h3><div id="map" class="text-center"></div></body><script>function initMap() {'.'window.alert("Inside the mapInit function");'."var uluru = {lat: 27.686596, lng: 85.342252};var map = new google.maps.Map(document.getElementById('map'), {zoom: 14,center:uluru,});var marker = new google.maps.Marker({position: uluru,map:map});}</script><script async defer".'src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBF8l4RdGbjvqDj8HM4iUHBX49fUmjsSWM&callback=initMap"></script></html>';
  //   echo $MapPart;

    ?>

    <?php

    $mVar="<html><head><style>h3{text-align:center;font-family:Comic Sans MS;font-weight: bold;color:#454977;}#map {height: 400px;width: 100%;}</style></head>

    <body>


    <h3>Hotel Location</h3>"
    .'<div id="map"></div>'
	."</body>


    <script>
      function initMap() {

        // 27.685010, 85.348863
        var tinkune = {lat: 27.685010, lng: 85.348863};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 14,
          center: tinkune
        });
        var marker = new google.maps.Marker({
          position: tinkune,
          map: map
        });
      }
    </script>

    <script async defer.
    src="htts://maps.googleapis.com/maps/api/js?key=AIzaSyBF8l4RdGbjvqDj8HM4iUHBX49fUmjsSWM&callback=initMap">
    </script>

    </html>';

    echo $mVar;

    ?>
  


