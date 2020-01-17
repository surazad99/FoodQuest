<?php
$dbc = mysqli_connect('127.0.0.1','root',null,'food quest')
		or die('Error connecting to MySQL server');

session_start();
$logged_in_user_id =$_SESSION['loggedIn_userId'];
$searchQuery = "SELECT * FROM trust_level WHERE Uploaded_By='$logged_in_user_id'";

class Dish{
	
              public $image;
              public $rating;
              public $name;
              public $foodid;
              public $review;
              public $date;

              function __construct($Name,$Image,$Rating, $Price, $Review) {
                
                $this->name = $Name;
                $this->image = $Image;
                $this->rating = $Rating;
                $this->review = $Review;
                // $this->foodid =$Foodid;
                // $this->date = $Date;
}
}$dishArray=array(50);

$totalFoundNumber=0;

$result=mysqli_query($dbc, $searchQuery);
if(!$result)
    echo"error querying database search";
$numberOfItemsStored=0;
$empty=1;
	
if ( ($result->num_rows) > 0) {

              
              $empty=0;
              while($row = $result->fetch_assoc()) {

              		$Foodid=$row["Food_Id"];
              		$Rating=$row["Rating"];
                    $Review =$row["Review"];

                    // echo"<br> the food id of the Food is:".$Foodid;
              		$searchFoodQuery = "SELECT * FROM food WHERE Food_Id='$Foodid' ";
              		$foodResult=mysqli_query($dbc, $searchFoodQuery);

              		if(!$foodResult)
   						die('error querying database Food id search');
	

					if (($foodResult->num_rows) > 0) {
						$row = $foodResult->fetch_assoc();

						$Description=$row["Food_Description"];
                      	$Image=$row["Food_Image"];
                        // $Rating=$row["Food_Rating"];
                        $Price = $row["Food_Price"];
                        $Foodid=$row["Food_Id"];
                        $foodName=$row["Food_Name"];


                        $totalFoundNumber++;
                    	$disharray[$numberOfItemsStored] = new Dish($foodName,$Image,$Rating, $Price, $Review);

					}

              
				$numberOfItemsStored++;
              }
 }


?>


<html>

<head>
              <meta charset="utf-8">
              <meta name="viewport" content="width=device-width, initial-scale=1">
             <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
              <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
              <script src="showdata1.js"></script>
              <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
              <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
              <!-- // <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
               <!-- // <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
              <style>
                    h3{text-align:center;font-family:Comic Sans MS;font-weight: bold;color:#454977;}

                    hr { 
    display: block;
    margin-top: 0.1em;
    margin-bottom: 0.5em;
    margin-left: 15px;
    margin-right: 20px;
    border-style: inset;
    border-width: 7px;
    background-clip:yellow;

}


              </style>

 	</head>
	<body>


		<nav class="navbar navbar-default" style="opacity:0.7">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li class="active"><a href="home.php">Home</a></li>
      <li><a href="aboutus.html">About US</a></li>
    </ul> 
    <ul class="nav navbar-nav navbar-right">
      <li><a href="login.php"><span class="glyphicon glyphicon-user"></span>Login or Register</a></li>
    </ul>
  </div>
  </nav>

  <div style="background-color:#fffbf2;">
      <strong> <h2 style="font-size:20px;text-align:center"> Your total invovlements...</h2> <h3 style="color:#1B054E; text-align:center; font-size:40px; margin-top:-20px;font-family:Source Sans" ><?=$totalFoundNumber." ";?></h3></strong>
    </div>

 		<div class="container-fluid" style="background-color:#d7eaea;">
            
              <!-- <img src="<?php echo $file_location?>" style="height:300px;width:300px;"> -->
              
              <?php $itemRemaining=$totalFoundNumber;
                
                if ( ($result->num_rows) > 0) {

                  while($itemRemaining>0){
                    $columnCount=1;?>
                  
                  <div class="row" style="margin-left:100px;">
                  <?php while($columnCount>0&& $itemRemaining>0){?>
					<div class="img-thumbnail" style="background-color:#fffbf2;border:2px solid #454977;border-radius:20px; margin-right:20px; margin-left:30px;width:600px;"><h3><?php echo $disharray[$itemRemaining-1]->name; ?></h3> <br>
						<!-- <h4> @ $HotelName;-->
                      <img src = "<?php echo $disharray[$itemRemaining-1]->image ?>"class="img-rounded" style="height:200px;width:320;margin-left:25px;">
                      	<!-- &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp -->
                      <div class="textcenter">
                      	<!-- <h4> Your Rating:-</h4> -->
                      <?php $Rating= $disharray[$itemRemaining-1]->rating;
                      // echo $Rating= $disharray[$itemRemaining-1]->rating;
                      include('starTest.php');?>

                      <h3 style="margin-top:-50px"> Review: <?php echo $disharray[$itemRemaining-1]->review; ?></h3>
                    </div >


                  </div>
                  <?php $itemRemaining--; $columnCount--;}?>
                  <button class="btn btn-primary" >Edit</button>
                  </div>
                  
                  <hr><hr>
            
      
                    <?php
                  }
                }


                  else{
                   // echo $disItem ;
                    $empty=1;

                }

              ?>
              <?php
              if($empty==1)
            { 
            ?>

            <strong>You have not Rated or Reviewed anything yet..<br> </strong>
            <br>
            <!-- <img src="images/empty.jpg" style="height:450px;width:450px;position:center"> -->
            <strong><br>why not rate or review a food right now</strong>

              <?php
            }
            ?>
        </div>
	</body>
</html>