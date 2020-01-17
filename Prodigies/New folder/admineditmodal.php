<?php
		 $u_id=$_POST['id'];
		include'DBconnect/connect.php';
       
       $sql="SELECT * FROM consumer WHERE User_Id='$u_id' ORDER BY First_Name";
$result=mysqli_query($conn, $sql);
        if(!$result)
              echo"error querying database";

          $row = $result->fetch_assoc();
?>
<?php ob_start(); ?>
<head>
<style>
.form-group{margin-top:30px;}

</style>
</head>
<div class="modal fade" id="details-modal" role="dialog">
      <div class="modal-dialog modal-lg">
       <!-- Modal content-->
       <div class="modal-content"style="width:700px;margin:0 auto;">
          <div class="modal-header">
            <h2 class="modal-title" style="text-align:center;font-family:Gabriola">Edit Members:</h4>
          </div>
         <div class="modal-body" style="height:380px;background-size:100% 100%">
          
        	<form class="form-horizontal" action="memberedit.php" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                  <label class="control-label col-sm-2" for="fname">First Name:</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="firstname" value="<?php echo $row['First_Name'];?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="lname">Last Name:</label>
                  <div class="col-sm-8">          
                    <input type="text" class="form-control" name="lastname" value="<?php echo $row['Last_Name'];?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="userid">User Id:</label>
                  <div class="col-sm-8">          
                    <input type="number" class="form-control" name="uid" value="<?php echo $row['User_Id'];?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="username">User Name:</label>
                  <div class="col-sm-8">          
                    <input type="text" class="form-control" name="uname" value="<?php echo $row['User_Name'];?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="usertype">User Type:</label>
                  <div class="col-sm-8">          
                    <input type="text" class="form-control" name="utype" value="<?php echo $row['User_Type'];?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="useremail">Email:</label>
                  <div class="col-sm-8">          
                    <input type="text" class="form-control" name="email" value="<?php echo $row['Email'];?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="userphone">Phone:</label>
                  <div class="col-sm-8">          
                    <input type="number" class="form-control" name="phone" value="<?php echo $row['Phone_Number'];?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="status">Status:</label>
                  <div class="col-sm-8">          
                    <input type="text" class="form-control" name="status" value="<?php echo $row['Status'];?>">
                  </div>
                </div>
                <div class="form-group">        
                  <div class="col-sm-offset-2 col-sm-8">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <button type="button" class="btn btn-danger" onclick="closeModal()">Cancel</button>

                  </div>
                </div>
              </form>
        	<!-- </div> -->
        <!-- </div>	 -->
          </div>
          <div class="modal-footer">
          </div>
         </div>
        <!-- </div>

        
      </div> -->
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
