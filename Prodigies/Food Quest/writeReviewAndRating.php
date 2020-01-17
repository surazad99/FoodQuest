<?php
$dbc = mysqli_connect('127.0.0.1','root',null,'food quest')
		or die('Error connecting to MySQL server');


 $logged_in_user_id = 2;//$_POST["dishid"];
$foodId=$_POST['dishid'];

$searchQuery = "SELECT * FROM trust_level WHERE Uploaded_By='$logged_in_user_id' AND Food_Id='$foodId'";
																																						
$result = mysqli_query($dbc, $searchQuery)
		or die('Error querying database while searching');


$row = $result->fetch_assoc();
if(!empty($row)){
			   	  // $foodId = $row["Food_Id"];

				echo "There is already a rating on this Hence editing the review and ratings";
                  $rating = $row["Rating"];
                  $review = $row["Review"];

                  $deleteQuery="DELETE FROM trust_level WHERE Uploaded_By='$logged_in_user_id' AND Food_Id='$foodId'" ;
                  $deleteResult= mysqli_query($dbc,$deleteQuery)
						or die('Error querying database while Deleting');

}else{
	echo" trying Adding new review to this food";
}
echo"<br>";
$rating=$_POST['dishrating'];
$review=$_POST['dishcomment'];

// $insertQuery ="INSERT INTO trust_level Food_Id='$foodId', Rating='$rating', Review='$review', Uploaded_By='$logged_in_user_id' ";
$insertQuery ="INSERT INTO `food quest`.`trust_level` (`Review`, `Rating`, `Uploaded_By`,`Food_Id`)".
	" VALUES ('$review','$rating','$logged_in_user_id','$foodId')";

$insertResult= mysqli_query($dbc,$insertQuery)
	or die('Error querying database while Inserting');
echo"<br> Writing SUcceded";

	mysqli_close($dbc);
?>