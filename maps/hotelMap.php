<?php

// $longitude=85.339899;

// $latitude=27.670659;

// session_start();
// $memberId=$_SESSION["member_id"];


// $addressQuery="SELECT  From consumer WHERE User_Id='$memberId'";
// $addressResult=mysqli_query($conn,$addressQuery);
// if(!$addressResult)
//   die("error querying consumer");
// $row = $addressResult->fetch_assoc();

// $latitude=$row1["Latitude"];
// $longitude=$row1["Longitude"];

$place='{lat:'.$latitude.',lng:'.$longitude.' };';
// echo $place;

$modalPart=" $('#details-modal').on('shown.bs.modal', function () {google.maps.event.trigger(map,'resize');})";


// var tinkune =".$place."
$hotelMap="<html>
		<head>
			<style>
				h3{text-align:center;font-family:Comic Sans MS;font-weight: bold;color:#454977;}#map {height: 400px;width: 100%;}
			</style>
			</head>
"."
			<body>
".'			<h3>Hotel Location</h3>
			<div id="map">
				map area
			</div>
			</body>
'."
			<script>
      	function initMap() {
".            $modalPart
."
        var tinkune =".$place."
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 16,
          center: tinkune
        });
        var marker = new google.maps.Marker({
          position: tinkune,
          map: map
        });
      }
    </script>


		</html>
".'
	 <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBF8l4RdGbjvqDj8HM4iUHBX49fUmjsSWM&callback=initMap">
    </script>
';

echo $hotelMap;

?>