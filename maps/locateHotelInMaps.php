<?php
    ?>

    <html>
    <head>
    	<style>
                    h3{text-align:center;font-family:Comic Sans MS;font-weight: bold;color:#454977;}
                    #map {height: 400px;width: 100%;}
              </style>
    </head>


    <body>


    <h3>Hotel Location</h3>
    <div id="map">
        map area
    </div>

    <form method="POST">
    <div >
        <!-- <button id="lgt">HAHA</button> -->
        Latitude:<input id="lati" label="Latitude">&nbsp&nbsp&nbsp
        <button class="btn btn-primary" id="button">Finalize</button>&nbsp&nbsp&nbsp
        Longitude:<input id="longi" label="Longitude">
    </div>
  </form>

	</body>


    <script>

      function initMap() {
        var prevClicked=false;
        var marker;
        var log;
        var tinkune ={lat:27.68501 , lng:85.348863 };

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 14,
          center: tinkune
        });

        google.maps.event.addListener(map,'click', function(event) {

          var latt=event.latLng.lat();
          var longg=event.latLng.lng();

          var target ={lat:latt , lng:longg};
          var myLatlng = new google.maps.LatLng(latt,longg);
        if(!prevClicked){
          marker = new google.maps.Marker({
          map: map
          });
        }

        marker.setPosition(myLatlng);
        

          document.getElementById("lati").value=latt;
          document.getElementById("longi").value=longg;

          prevClicked=true;
          ;});
        
      }
    </script>

    <script async defer
     src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBF8l4RdGbjvqDj8HM4iUHBX49fUmjsSWM&callback=initMap">
    </script>



    </html>
  


