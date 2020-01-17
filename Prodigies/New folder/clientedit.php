<?php
 include_once'DBconnect/connect.php';
 $f_name = $_POST['firstname'];
  $l_name = $_POST['lastname'];
  $u_id = $_POST['uid'];
  $user_name = $_POST['uname'];
  $user_type = $_POST['utype'];
  $u_email = $_POST['email'];
  $phone_num = $_POST['phone'];


 $queryUpdate = "UPDATE consumer SET First_Name='$f_name',Last_Name='$l_name',User_Name='$user_name',User_Type='$user_type'
 ,Email='$u_email',Phone_Number='$phone_num' WHERE User_Id='$u_id'";
   $resultRead= mysqli_query($conn, $queryUpdate)
    or die('Error querying Update database...correct error from page memberedit.php');
    
	//echo('Succeded');
	mysqli_close($conn);
  header('location:clientmanagement.php');
	
 

  



?>
