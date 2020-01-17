<?php
$foodid=$_POST['id'];
include'DBconnect/connect.php';

$sql="SELECT * FROM food WHERE Food_Id='$foodid'";
$result=mysqli_query($conn, $sql);
if(!$result)
  echo"error querying food";

$row = $result->fetch_assoc();
$Rating=$row['Food_Rating'];

$uploadedby=$row['Uploaded_By'];
$sql1="SELECT * From consumer WHERE User_Id='$uploadedby'";
$result1=mysqli_query($conn,$sql1);
if(!$result1)
  echo "error querying consumer";

$row1 = $result1->fetch_assoc();
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
        
      </div>
      <div class="modal-footer">

      </div>
    </div>

  </div>
  <script>
  function closeModal(){
    jQuery('#details-modal').modal('hide');
    setTimeout(function(){
      jQuery('#details-modal').remove();
      jQuery('modal-backdrop').remove();
    },500);
  }
  </script>
  <?php
  echo ob_get_clean();
  ?>
