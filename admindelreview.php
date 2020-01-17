<?php 
$reviewid=$_POST['reviewid'];
//echo $reviewid;
include_once'DBconnect/connect.php';
$queryDelete = "DELETE FROM trust_level WHERE Review_Id='$reviewid'";
$resultRead= mysqli_query($conn, $queryDelete)
    or die('Error querying Update database');
    mysqli_close($conn);
 header('location:reviewmanagement.php');

?>