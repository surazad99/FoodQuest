<?php

if(isset($_POST['searchBar'])){
	include'DBconnect/connect.php';
	//echo".";

	$empty=1;
	$toSearch= $_POST["searchBar"];
  $toSearch=strtolower($toSearch);
  $brokenString = explode(" ",$toSearch);
  $size = sizeof($brokenString);
  // echo"<br>total words in ".$toSearch." is:".$size."<br>";

  
	 $queryFood = "SELECT * FROM food";
  
	
	

	class Dish{
              public $name;
              public $image;
              public $rating;
              public $price;
              public $foodid;

              function __construct($Name, $Image, $Rating, $Price,$Foodid) {
                
                $this->name = $Name;
                $this->image = $Image;
                $this->rating = $Rating;
                $this->price = $Price;
                $this->foodid=$Foodid;
              }
          }$dishArray = array(20);

			$result=mysqli_query($conn, $queryFood);
          	if(!$result)
            echo"error querying database";


          $numberOfItemsStored = 0;

          if ( ($result->num_rows) > 0) {
              $totalFoundNumber=0;
              //$empty=0;
              while($row = $result->fetch_assoc()) {
                // echo"Seaching if matched with:";
                $Name = $row["Food_Name"];
                // echo $Name."<br>";
                
// 
                 // echo "Dish Name=" . $row["Food_Name"]. " <br> Description=: " . $row["Food_Description"]."<br><br><br>";
                // echo"The size of the search string is:".$size;
                $tempSize=$size;
                while($tempSize>0){
                  $part=$brokenString[$tempSize-1];
                  // echo"Seaching if ".$part." matched with:   ";
                  $loweredName =strtolower($Name);
                  // echo $loweredName."<br>";
                  // echo "size of ".$part." is:".sizeof($part,1)."<br>";

                  if(strlen($part)>1 && strpos($loweredName,$part)>-1){
                    $empty=0;
                      //echo "<br>".$part." has been found in ".$loweredName."<br>";
                      $Description =$row["Food_Description"];
                      $Image = $row["Food_Image"];
                        $Rating = $row["Food_Rating"];
                        $Price = $row["Food_Price"];
                        $Foodid=$row["Food_Id"];


                        $totalFoundNumber++;
                
                    $disharray[$numberOfItemsStored] = new Dish($Name, $Image, $Rating, $Price, $Foodid);
                    $numberOfItemsStored++;
                    break;
                    }else{
                     // echo"............".$part." is absent in ".$loweredName."<br>";

                    }


                  $tempSize--;
                }
                                 //   echo "<br><br>";

                //$file_location = $row["Food_Image"];
          //    echo readfile("$file_location");
              }
          } else {
              //echo "<br><br><br>0 results";
              $disItem = "There are no items yet...";
              $empty=1;
              
              // echo $disItem;
          }
           //echo"Total dishes found is:".$totalFoundNumber;

    }else{
      Header('location:home.php');
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

  <div>
      <strong> <h2 style="font-size:20px;text-align:center"> dishes found...</h2> <h3 style="color:#1B054E; text-align:center; font-size:40px; margin-top:-20px;font-family:Source Sans" ><?=$totalFoundNumber." ";?></h3></strong>
    </div>

 		<div class="container-fluid">
            
              <!-- <img src="<?php echo $file_location?>" style="height:300px;width:300px;"> -->
              
              <?php $itemRemaining=$numberOfItemsStored;
                
                if ( ($result->num_rows) > 0) {

                  while($itemRemaining>0){
                    $columnCount=3;?>
                  
                  <div class="row">
                  <?php while($columnCount>0&& $itemRemaining>0){?>
<div class="img-thumbnail" style="background-color:#fffbf2;border:4px solid #454977;border-radius: 70px; margin-right:20px; margin-left:30px">                      <h3><?php echo $disharray[$itemRemaining-1]->name; ?></h3> <br> 
                      <img src = "<?php echo $disharray[$itemRemaining-1]->image ?>"class="img-rounded" style="height:200px;width:320;margin-left:25px;">

                      <div class="text-center">
                      <?php $Rating= $disharray[$itemRemaining-1]->rating;
                      include('starTest.php');?>

                      <h3 style="margin-top:-50px"> Price : Rs <?php echo $disharray[$itemRemaining-1]->price; ?> /-</h3>
                    </div >
                      <hr>
                      
                      <!-- <button type="button" class="btn btn-warning" style="float:left;margin-left:110px"onclick="edit()" onclick="detailsmodal(<?=[$itemRemaining-1]?>)"&nbsp&nbspEdit&nbsp&nbsp</button> -->
                      <div class="text-center">
                      <button type="button" class="btn btn-primary"  onclick="showdetails(<?php echo $disharray[$itemRemaining-1]->foodid; ?>)">Details</button>
                  		</div>
                  </div>
                  <?php $itemRemaining--; $columnCount--;}?>
                  </div>
                  <br><br><br>
            
      
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

            <strong> Oops...Couldn't find any '<?php echo $toSearch."'"?>.<br> </strong>
            <br>
            <img src="images/empty.jpg" style="height:450px;width:450px;position:center">
            <strong><br>please try with some other words for <?php echo "'".$toSearch."'"?></strong>

              <?php
            }
            ?>
        </div>

<script>
  function showdetails(id)
  {
    
    var data = {"id":id};
    jQuery.ajax({
      url: 'showdetails.php',
      method: "post",
      data: data,
      success: function(data){
        jQuery('body').append(data);
        jQuery('#details-modal').modal('toggle');
      },
      error: function(){
        alert("Something went wrong.");
      }
    });
  }
  </script>
 	</body>