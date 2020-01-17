<?php
include('DBconnect/connect.php');
header('Content-Type: text/xml');
echo '<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>';

echo '<response>';
$food = $_GET['food'];

$foodArray=array(50);
$i=0;
$qmem1="SELECT User_Name FROM consumer ";
$result = mysqli_query($conn, $qmem1);
if(!$result){
              echo"error querying database";
            }
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $foodArray[$i] = $row["User_Name"];
    $i+1;
  }
}

if(in_array($food,$foodArray))
    echo 'The username '.$food.' is already in use';
else if(empty($food))
	echo "enter a username";
else
    echo 'Available!';
echo '</response>';
?>