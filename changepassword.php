<?php
$errorMessage="";
session_start();
$user_name= $_SESSION['loggedIn_userName'];
$user_id= $_SESSION['loggedIn_userId'];
include('DBconnect/connect.php');
if(isset($_POST['oldpassword']))
{
	$old_password=$_POST['oldpassword'];
	$new_password=$_POST['newpassword'];
	
	$queryFood = "SELECT * FROM consumer WHERE User_Name='$user_name'";
            
            $result=mysqli_query($conn, $queryFood)
            or die('error querying database');
          $row = $result->fetch_assoc();
          if($old_password==$row['Password'])
          {
          	$queryUpdate = "UPDATE consumer SET Password='$new_password' WHERE User_Id='$user_id'";
          	$result1=mysqli_query($conn, $queryUpdate)
           or die('error querying update database');

          	echo "<script>alert('password changed successfully');</script>";

          }
          else
          {
          	$errorMessage="incorrect old password";
          }
}




?>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-default" style="opacity:0.7">
		<ul class="nav navbar-nav">
      <li class="active"><a href="home.php">Home</a></li>
      <li><a href="aboutus.html">About US</a></li>
		</ul>	
		<div class="dropdown" style="float:right">
                      <button class="btn btn-success dropdown-toggle " type="button" data-toggle="dropdown" style="margin-top:7px;margin-right:70px"><?php echo $user_name; ?>
                      <span class="caret"></span></button>
                      <ul class="dropdown-menu">
                      <li><a href="logout.php">Logout</a></li>
                      <li class="divider"></li>
                      <li><a href="changepassword.php">Change password</a></li>
                      </ul>
                </div>
	</nav>
<div class="container">
<div class="row" style="margin-top:50px">
	<div class="col-sm-3"></div>
	<div class="col-sm-6" style="background-color:teal;opacity:0.8;border-radius:8px">
		<h3 style="text-align:center;color:red"><?php echo $errorMessage; ?></h3>
									<form action="changepassword.php" method = "POST">
										<div class="form-group">
											<label>Old password :</label>
											<input type="text" class="form-control"name="oldpassword" placeholder="Enter Your Old password" required>
										</div>
										<div class="form-group">
											<label>New Password:</label>
											<input type="Password" class="form-control" name="newpassword" placeholder="Enter Your new password" required>
										</div>
										<div class="form-group">
											<button class="btn btn-success"name="login">Submit</button>
										</div>
										<div class="col-sm-3"></div>
									</form>


	</div>
</div>
</body>
</html>
