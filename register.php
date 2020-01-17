
		<?php
		include ('DBconnect/connect.php');
		$errorMessage="";

		if(isset($_POST['login_username'])&&  isset($_POST['login_password'])){
			$user=$_POST['login_username'];
			$pwd=$_POST['login_password'];

			if(empty($user) || empty($pwd))
			{
				$errorMessage = "Enter both username and Password.";

			}

			else{

				$sql = "SELECT User_Name,Password,First_Name,Last_Name,User_Id,User_Type,Status FROM consumer WHERE User_Name='$user' AND Password='$pwd'";
				$result = $conn->query($sql);
				$flag=0;
				$row = $result->fetch_assoc();
				// $alert="<script> alert('Opening the memberpage.php');</script>";
				// 		echo $alert;
				if(!empty($row))
				{
					if($row["User_Type"]==1){
						if($row["Status"]==1){
						// echo"attempting user panel";
						session_start();
						$_SESSION['loggedIn_memberId']=$row["User_Id"];
						$_SESSION['loggedIn_memberName']=$row["User_Name"];

						header('location:memberpage.php');
						exit();
							}else{
								$alert="<script> alert('Sorry! Your account is pending for Verification. Please check some time later');</script>";
								echo $alert;

							}	
					}
					else if($row["User_Type"]==0){
						session_start();
						$_SESSION['loggedIn_userId']=$row["User_Id"];
						$_SESSION['loggedIn_userName']=$row["User_Name"];
						header('location:userPanel.php');
						// echo $row["User_Name"];
					}
					else{
						header('location:admin.php');
					}


				}else{
					$errorMessage="Invalid Login Details";
				}

				$conn->close();	
			}
		}



		?>
		<?php
			include('dbconnect/connect.php');

			
				if(isset($_POST['usersubmit'])){


			
			$first_name = $_POST['signup_firstname'];
			$last_name = $_POST['signup_lastname'];
			$user_name = $_POST['signup_username'];
			$email = $_POST['signup_email'];
			$password = $_POST['signup_password'];
			$retypepassword = $_POST['signup_retypepassword'];
			$phone_number = $_POST['signup_phonenumber'];
			//$radioClicked = $_POST['optradio'];
	
			if($password==$retypepassword)
			{
						$userType=0;

								//User starts with vowel 'u' and 0 looks like vowel 'o'
								$query1 = "INSERT INTO `food quest`.`consumer` (`First_Name`, `Last_Name`, `User_Name`,`Email`,`Password`,`Phone_Number`,`User_Type`,`Status`)".
							" VALUES ('$first_name','$last_name','$user_name','$email','$password','$phone_number','$userType',1)";
							
									$message = "Account Created succesfully";
									echo "<script type='text/javascript'>alert('$message');</script>";
									$result = mysqli_query($conn, $query1)
									or die('Error querying database');
									mysqli_close($conn);
									

			}
			else
			{
				echo "<script type='text/javascript'>alert('password mismatched');</script>";
			}

		}
			elseif(isset($_POST['membersubmit']))
			{		
					
			$first_name = $_POST['signup_firstname'];
			$last_name = $_POST['signup_lastname'];
			$user_name = $_POST['signup_username'];
			$email = $_POST['signup_email'];
			$password = $_POST['signup_password'];
			$retypepassword = $_POST['signup_retypepassword'];
			$phone_number = $_POST['signup_phonenumber'];

			//$radioClicked = $_POST['optradio'];
			$hotel_name = $_POST['signup_hotelname'];
			$hotel_address = $_POST['signup_hoteladdress'];
			$hotel_number = $_POST['signup_hotelnumber'];
			$hotel_latitude = $_POST['signup_hotellatitude'];
			$hotel_longitude = $_POST['signup_hotellongitude'];
						
				if($password==$retypepassword)
				{
						$userType=1;
							
							$query1 = "INSERT INTO `food quest`.`consumer` (`First_Name`, `Last_Name`, `User_Name`,`Email`,`Password`,`Phone_Number`,`User_Type`,`Hotel_Name`,`Hotel_Address`,`Hotel_Number`,`Longitude`,`Latitude`,`Status`)".
							" VALUES ('$first_name','$last_name','$user_name','$email','$password','$phone_number','$userType','$hotel_name','$hotel_address','$hotel_number','$hotel_longitude','$hotel_latitude',0)";
						

							$message = "Account Created succesfully. Please Wait for Account Verification";
									echo "<script type='text/javascript'>alert('$message');</script>";
							$result = mysqli_query($conn, $query1)
							or die('Error querying database');
							mysqli_close($conn);
				}
				else
				{
					echo "<script type='text/javascript'>alert('password mismatched');</script>";
				}
			}

		 

					?>

		

					<html lang="en">
					<head>
						<title>Register</title>
						<meta charset="utf-8">
						<meta name="viewport" content="width=device-width, initial-scale=1">
						<link rel="stylesheet" href="css/bootstrap.css">
						<script src="js/jquery.min.js"></script>
						<script src="js/bootstrap.min.js" ></script>
						<script type="text/javascript" src="foodstore.js"></script>
						<style>
						label{color:teal;font-family:Gabriola;font-size:20px;}
						 #map {height: 400px;width: 100%;}
						</style>
					</head>

					<nav class="navbar navbar-default" style="opacity:0.7">
						<div class="container-fluid">
							<ul class="nav navbar-nav">
								<li><a href="home.php">Home</a></li>
								<li><a href="aboutus.html">About US</a></li>
							</ul>	
							<ul class="nav navbar-nav navbar-right">
								<li class="active"><a href="register.html"><span class="glyphicon glyphicon-user"></span>Login or Register</a></li>
							</ul>
						</div>
					</nav>
					<body onload="process()" style="background-image:url(images/background.jpg);background-size:cover;background-width:100%;background-repeat:no-repeat"  class="img-responsive">
						<div class="container">
							<h1 style="color:blue;text-align:center;margin-top:30px;font-family:Gabriola">please Login for more...</h1>
							<div class="row" style="margin-top:50px;">
								<div class="col-sm-3"></div>
								<div class="col-sm-6" style="background-color:black;opacity:0.8;border-radius:8px">
									<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal" style="float:right;margin-top:10px;" name="signup">Sign Up </button><br><br>
									<h3 style="text-align:center;color:red"><?php echo $errorMessage; ?></h3>
									<form action="register.php" method = "POST">
										<div class="form-group">
											<label>Username :</label>
											<input type="text" class="form-control"name="login_username" placeholder="Enter Your Username">
										</div>
										<div class="form-group">
											<label>Password:</label>
											<input type="Password" class="form-control"name="login_password" placeholder="Enter Your Password">
										</div>
										<div class="form-group">
											<button class="btn btn-success"name="login">Log in</button>
										</div>
									</form>
								</div>	    

								<!-- Modal -->
								<div class="modal fade" id="myModal" role="dialog">
									<div class="modal-dialog modal-lg">

										<!-- Modal content-->
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="btn btn-danger" data-dismiss="modal" style="float:right" name="cancel">Cancel</button>
												<h1 class="modal-title"style="text-align:center;font-family:Gabriola;">You can register Here</h1>
											</div>
											<div class="modal-body">
												
													
													<label>User Type :</label> <br>
													<div class="radio-inline">
														<label><input type="radio" name="optradio" value="radioUser">User OR</label>
													</div>
													<div class="radio-inline">
														<label><input type="radio" name="optradio" value="radioMember">Member</label>
													</div>

							<div id="memberdiv">
											<form action="register.php" method="POST">
														<div class="form-group">
															<label>Hotel Name :</label>	
															<input type="text" class="form-control" name="signup_hotelname" placeholder="Enter Hotel Name" required>
														</div>
														<div class="form-group">
															<label>Hotel Address :</label>	
															<input type="text" class="form-control" name="signup_hoteladdress" placeholder="Enter Hotel Address" required>
															<br>			
															<div id="mapdiv">
																			<div id="map"></div>
															</div>              
															<a class="btn btn-Info" name = "mapButton" id="map_Button" >locate in google maps</a>
              </div>
															<label>Longitude</label>
															<input type="number" step="0.000000000000001" class="form-control" name="signup_hotellongitude" placeholder="Enter longitude" id="longi">
															<label>Latitude</label>
															<input type="number" step="0.000000000000001" class="form-control" name="signup_hotellatitude" placeholder="Enter latitude" id="lati">
														
														<div class="form-group">
															<label>Hotel Phone Number :</label>	
															<input type="number" class="form-control" name="signup_hotelnumber" placeholder="Enter Hotel Phone number" required>
														</div>

														<div class="form-group">
													<label>First Name :</label>	
													<input type="text" class="form-control" name="signup_firstname" placeholder="Enter First Name" required>
												</div>
												<div class="form-group">
													<label>Last Name :</label>
													<input type="text" class="form-control" name="signup_lastname" placeholder="Enter last name" required>
												</div>
												<div class="form-group">
													<label>Username :</label>
													<input type="text" class="form-control" name="signup_username" placeholder="Enter user name" required>
												</div>
												<div class="form-group">
													<label>Email :</label>
													<input type="text" class="form-control" name="signup_email" placeholder="Enter your Email" required>
												</div>
												
												<div class="form-group">
													<label>Password :</label>
													<input type="password" class="form-control" name="signup_password" placeholder="New Password" id="pass1" required>
												</div>
												<div class="form-group">
													<label>Retype Password :</label><p id="message1" style="color:red"></p>
													<input type="password" class="form-control" name="signup_retypepassword" placeholder="Retype password" id="repass1" required>
												</div>
												<div class="form-group">
													<label>Phone Number :</label>
													<input type="text" class="form-control" name="signup_phonenumber" placeholder="Enter Phone Number (optional)">
												</div>




														<div class="form-group">
																	<input type="submit" name="membersubmit" class="btn btn-success" value="Sign Up" id="user">
													</div>

													</form>
								</div>

							<div id="userdiv">
											<form action="register.php" method="POST">
												<div class="form-group">
													<label>First Name :</label>	
													<input type="text" class="form-control" name="signup_firstname" placeholder="Enter First Name" required>
												</div>
												<div class="form-group">
													<label>Last Name :</label>
													<input type="text" class="form-control" name="signup_lastname" placeholder="Enter last name" required>
												</div>
												<div class="form-group">
													<label>Username :</label>
													<input type="text" class="form-control" name="signup_username" placeholder="Enter user name" required>
												</div>
												<div class="form-group">
													<label>Email :</label>
													<input type="text" class="form-control" name="signup_email" placeholder="Enter your Email" required>
												</div>
												
												<div class="form-group">
													<label>Password :</label>
													<input type="password" class="form-control" name="signup_password" placeholder="New Password" id="pass1" required>
												</div>
												<div class="form-group">
													<label>Retype Password :</label><p id="message1" style="color:red"></p>
													<input type="password" class="form-control" name="signup_retypepassword" placeholder="Retype password" id="repass1" required>
												</div>
												<div class="form-group">
													<label>Phone Number :</label>
													<input type="text" class="form-control" name="signup_phonenumber" placeholder="Enter Phone Number (optional)">
												</div>
												<div class="form-group">
													<input type="submit" name="usersubmit" class="btn btn-success" value="Sign Up" id="user">
												</div>
									</form>
					</div>
										</div>
									</div>
								</div>

								<div class="col-sm-3"></div>

							</div>
						</div>
						<script>

						$('#map_Button').click(function(){
     //alert("OK");

     			$('#map_Button').hide();	
				$('#mapdiv').show();


		  initMap();
  });	


							$(document).ready(function() {
   								 $("#memberdiv").hide();
   								 $('#mapdiv').hide()
   								 $("input[name$='optradio']").click(function() {

        							var test = $(this).val();
        							if(test=="radioMember"){
        								$("#memberdiv").show();
       								 	$("#userdiv").hide();
       								 }
        							else if(test=="radioUser"){
        								$("#userdiv").show();
        								$("#memberdiv").hide();
       								 }
    							});
							});

							$('#pass, #repass').change(function(){
  								if($('#pass').val()==$('#repass').val()) {
  									 document.getElementById("message").innerHTML="password matched";
  								}else{
   									 document.getElementById("message").innerHTML="password mismatched";
  								}
							});
							$('#pass1, #repass1').change(function(){
  								if($('#pass1').val()==$('#repass1').val()) {
  									 document.getElementById("message1").innerHTML="password matched";
  								}else{
   									 document.getElementById("message1").innerHTML="password mismatched";
  								}
							});



			
						</script>


						<script async defer
     src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBF8l4RdGbjvqDj8HM4iUHBX49fUmjsSWM&callback=initMap">
</script>
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

		$('#map_Button').click(function(){
     //alert("OK");
				$('#div').show();								
		  initMap();
  });	


	// 	$(document).ready(function() {
	// 		 // $('#mapdiv').hide()
			

 //  //  $("input[name$='optradio']").click(function() {
	// 	// 	var test = $(this).val();
	// 	// 	if(test=="radioMember"){
	// 	// 		$("#flash").show();
	// 	// 		 }
	// 	// 	else{
	// 	// 		$("#flash").hide();
	// 	// 		 }
	// 	// });
	// });

	</script>
					</body>
					</html>