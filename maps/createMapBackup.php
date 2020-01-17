
    <h3>Hotel Location</h3>
    <div id="map"></div>
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

    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBF8l4RdGbjvqDj8HM4iUHBX49fUmjsSWM&callback=initMap">
    </script>
  
