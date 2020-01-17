<?php 
$foodid=$_POST['dishid'];
//echo $foodid;
include_once'DBconnect/connect.php';
$queryDelete = "DELETE FROM food WHERE Food_Id='$foodid'";
$resultRead= mysqli_query($conn, $queryDelete)
    or die('Error querying Update database');
    mysqli_close($conn);
 header('location:memberpage.php');

?>