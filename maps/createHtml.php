<?php

  $modalPart=" $('#details-modal').on('shown.bs.modal', function () {google.maps.event.trigger(map, 'resize');})";
  $MapPart='<h3>Hotel Location</h3><div id="map" class="text-center"></div><script>function initMap() {'.$modalPart.'window.alert("Inside the mapInit function");'."var uluru = {lat: 27.686596, lng: 85.342252};var map = new google.maps.Map(document.getElementById('map'), {zoom: 14,center:uluru,});var marker = new google.maps.Marker({position: uluru,map:map});}</script><script async defer".'src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBF8l4RdGbjvqDj8HM4iUHBX49fUmjsSWM&callback=initMap"></script>';
    echo $MapPart;

    ?>

