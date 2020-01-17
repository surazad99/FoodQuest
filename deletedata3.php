<?php 
$usid=$_POST['userid'];
//echo $foodid;
include_once'DBconnect/connect.php';
$queryDelete = "DELETE FROM consumer WHERE User_Id='$usid'";
$resultRead= mysqli_query($conn, $queryDelete)
    or die('Error querying Update database');
    mysqli_close($conn);
 header('location:clientmanagement.php');

?>