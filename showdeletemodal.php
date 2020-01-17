<?php 
$foodid=$_POST['id'];
?>
<?php ob_start(); ?>
 <!-- Modal -->
  <div class="modal fade" id="delete-modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" style="text-align:center;font-family:gabriola">Are you sure you want to delete this item</h2>
        </div>
        <div class="modal-body">
          <form action="deletedata.php" method="POST">
          	<input type="hidden" name="dishid" value="<?php echo $foodid?>">
          	<button type="submit" class="btn btn-warning"style="margin-left:100px">Yes</button>
          	<button type="button" class="btn btn-danger" style="float:right;margin-right:100px" data-dismiss="modal">No</button>
          </form>
        </div>
        
      </div>
      
    </div>
  </div>