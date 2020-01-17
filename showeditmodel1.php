<?php
		 $foodid=$_POST['id'];
		include'DBconnect/connect.php';
       
        $sql="SELECT * FROM food WHERE Food_Id='$foodid'";
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
            <h2 class="modal-title" style="text-align:center;font-family:Gabriola">Image</h4>
          </div>
         <div class="modal-body"> 

         <img src="<?php echo $row['Food_Image'];?>" style="max-height: 500px; max-width: 500px;">
          
        	
        	<!-- </div> -->
        <!-- </div>	 -->
          </div>
          <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="closeModal()">Cancel</button>
          </div>
         </div>
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