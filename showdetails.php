<?php
$foodid=$_POST['id'];
// $foodid=46;
include'DBconnect/connect.php';

$sql="SELECT * FROM food WHERE Food_Id='$foodid'";
$result=mysqli_query($conn, $sql);
if(!$result)
  die("error querying food");

$row = $result->fetch_assoc();
$Rating=$row['Food_Rating'];

$uploadedby=$row['Uploaded_By'];
$sql1="SELECT * From consumer WHERE User_Id='$uploadedby'";



$result1=mysqli_query($conn,$sql1);
if(!$result1)
  die("error querying consumer");
$row1 = $result1->fetch_assoc();
$latitude=$row1["Latitude"];
$longitude=$row1["Longitude"];


class RatingAndReview{
  public $rating;
  public $review;
  public $userName;

  function __construct($User_name, $Rating,$RReview) {
  $this->rating= $Rating;
  $this->review= $RReview;
  $this->userName=$User_name;
  }

}$ReviewArray=array(20);
$totalFoundNumber=0;
$numberOfItemsStored=0;
$objectCreationInfo="";


$reviewQuery="SELECT * FROM trust_level WHERE Food_Id='$foodid'";
$reviewResult= $result=mysqli_query($conn, $reviewQuery);
if(!$reviewResult)
  die("error querying while selecting from review table");

 if ( ($reviewResult->num_rows) > 0) {
              // echo"there are more than one row in reviewQuery";
              $totalFoundNumber=0;


              while($tlRow = $reviewResult->fetch_assoc()) {
                $Review=$tlRow["Review"];
                $RRating = $tlRow["Rating"];
                $userId=$tlRow["Uploaded_By"];

                //find the user name of the review uploaded peson
                $userNameQuery="SELECT * From consumer WHERE User_Id='$userId' ";
                $userResult= $result=mysqli_query($conn, $userNameQuery);
                if(!$userResult)
                  die("error querying while selecting the  from id");


              $user_name;
              echo "Creating the object";
              if (($userResult->num_rows) > 0) {
                $userRow = $userResult->fetch_assoc();

                $user_name=$userRow["User_Name"];

                        $totalFoundNumber++;

                      $ReviewArray[$numberOfItemsStored] = new RatingAndReview($user_name,$RRating, $Review);
                      $numberOfItemsStored++;
                      // echo "Storing:-";

                }


              }
}else{
  // echo"There are no rows containing the";
}


 





?>
<?php ob_start(); ?>



<!-- Modal -->
<div class="modal fade" id="details-modal" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn btn-danger" onclick="closeModal()"style="float:right">close</button>
        <h2 class="modal-title" style="text-align:center;font-family:Gabriola">Details Of The Dish</h2>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-4">
            <img src="<?php echo $row['Food_Image']?>" style="height:200px;width:300px">
            <form action="writeReviewAndRating.php" method="POST" style="margin-top:20px">
              <div class="form-group">
                <label>Rate The Food</label>
               
                <input type="number" class="form-control" name="dishrating" placeholder="0-5(also you can give in decimal)">
              
              </div>
              <div class="form-group">
                <label>Comment</label>
                
                <input type="textarea" class="form-control" name="dishcomment" placeholder="give your comment">
                
              </div>
              <div class="form-group">
                <input type="hidden" name="dishid" value="<?php echo $foodid;?>">
                
                <button type="submit" class="btn btn-success">submit</button>
              
              </div>

            </form>
          </div>
          <div class="col-lg-8">
            <table class="table">
              <tr>
                <td>Dish Name</td>
                <td><?php echo $row['Food_Name']?></td>
              </tr>
              <tr>
                <td>Price</td>
                <td><?php echo $row['Food_Price']?></td>
              </tr>
              <tr>
                <td>Rating</td>
                <td><?php include('starTest.php');?></td>
              </tr>
              <tr>
                <td>Description</td>
                <td><?php echo $row['Food_Description']?></td>
              </tr>
              <tr>
                <td>Hotel Name</td>
                <td><?php echo $row1['Hotel_Name']?></td>
              </tr>
              <tr>
                <td>Hotel Address</td>
                <td><?php echo $row1['Hotel_Address']?></td>
              </tr>
              <tr>
                <td>Hotel Phone Number</td>
                <td>0<?php echo $row1['Hotel_Number']?></td>
              </tr>
            </table>

          </div>

        </div>

        <div>
          <hr>
          <h3 style="margin-left:-200px;"> Top Reviews...</h3>
            <?php if ( ($reviewResult->num_rows) > 0) {
              echo"Total reviews:";

                if($totalFoundNumber>5)
                  $totalFoundNumber=5;
                $itemRemaining=$totalFoundNumber;

                 echo $totalFoundNumber;

                  while($itemRemaining>0){?>

                  <div class="row">

                    <div style="margin-top:0px;margin-left:200px;margin-right:400px;background-color:#ebffea;border-top: 3px  solid #ffb182;border-radius:70px;" class="text-left">
                     <strong>&nbsp&nbsp&nbsp&nbsp<?php echo $ReviewArray[$itemRemaining-1]->userName;?></strong>&nbsp&nbspsays...
                      <!-- <div class="text-right" style="margin-left:20px;"> -->
                        <!-- says... -->
                      <!-- </div> -->
                    <!-- <h4>says...</h4> -->
                    </div>
                
                      <div class="text-center" style="margin-left:50px;margin-right:300px;margin-bottom:30px;background-color:#f9efef;;border-bottom: 4px  solid #6a9fd1;border-radius:70px">
                        

                      <?php  echo $ReviewArray[$itemRemaining-1]->review; ?><strong>&nbsp&nbsp Rates:</strong>
                      <?php $Rating= $ReviewArray[$itemRemaining-1]->rating;
                      echo $Rating;                      

				            // include('starTest.php');
				            $itemRemaining--;?>
                    </div >
                      
                  <!-- <="loop ended";?> -->
                  </div>





				  <?php }  


			}else{
        echo"There are no reviews yet";
      }

      ?>
        </div >
        <?php if ($longitude>0&&$latitude>0){
         include('maps/hotelMap.php');
         }else{ ?>
          Sorry...The hotel map is currently unavailable

         <?php
          } 
         ?>
        <!-- div closed -->
      </div>


        
      </div>
      <!-- <div>
        <?php //include('maps/createHtml.html');?>
      </div> -->

     
      <div class="modal-footer">

                  
                    
                  


      </div>
    </div>



  </div>



</div>
<?php
  echo ob_get_clean();
  ?>
<!-- </div> -->

<script>
  function closeModal(){
    jQuery('#details-modal').modal('hide');
    setTimeout(function(){
      jQuery('#details-modal').remove();
      jQuery('modal-backdrop').remove();
    },500);
  }
  </script>


    
  
