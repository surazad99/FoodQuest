<?php 
include('DBconnect/connect.php');
$sql="SELECT First_Name,Last_Name,User_Id,User_Name,Email,User_Type,Phone_Number FROM consumer WHERE User_Type IN (0,2) ORDER BY First_Name";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo'<style>
table, th, td {
    padding: 15px;
}
</style>';
    echo '<table style="width:100%" class="table table-hover";>
  <col width="80">
  <col width="80">
    <col width="80">
  <col width="80">
    <col width="80">
  <col width="50">
    <col width="50">
  <col width="50">
    <tr>
      <th>First Name</th>
      <th>Last Name</th>
      <th>User Id</th>
      <th>User Name</th>
      <th>User Type</th>
      <th width="10%">User Email</th>
      <th>Phone number</th>
     </tr>';
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["First_Name"]."</td><td>".$row["Last_Name"]." <td>".$row["User_Id"]."</td><td>".$row["User_Name"]."</td><td>".$row["User_Type"]."</td><td>".$row["Email"]."</td><td>".$row["Phone_Number"]."</td><td ><button type='button' class='btn btn-info' data-toggle='modal' data-target='#editModal' style='float:left;margin-left:50px;'' name='signup'>Edit</button></td><td><button type='button' class='btn btn-danger' data-toggle='modal' data-target='#delModal' style='float:left;margin-left:10px;'' name='signup'>Delete</button></td><tr>";
    }
    
        
    echo "</table>";
} else {
    echo "0 results";
}
?>
<!-- Modal -->
  <div id="editModal" class="modal fade" role="dialog">
    <div class="modal-dialog ">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 class="modal-title"style="text-align:center;font-family:Gabriola;color:#00cc88;font-weight:bold">Editing Clients</h2>
        </div>
        <div class="modal-body">
          <form class="form-horizontal"method="POST" action = "write_dish_info.php" enctype="multipart/form-data">
              <div class="form-group">
                  <label class="control-label col-sm-2" for="foodname">First name:</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="firstname" placeholder="Enter first name">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="foodname">Last name:</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="lastname" placeholder="Enter first name">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="price">User id:</label>
                  <div class="col-sm-8">          
                    <input type="number" class="form-control" name="userid" id="dishprice"placeholder="Enter User id">
                  </div>
                </div>
              <div class="form-group">
                  <label class="control-label col-sm-2" for="foodname">User name:</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="username" placeholder="Enter User name">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="price">User type</label>
                  <div class="col-sm-8">          
                    <input type="number" class="form-control" name="usertype" min="0" max="2" id="dishprice"placeholder="Enter user type">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="foodname">User Email</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="useremail" placeholder="Enter user email">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="price">Phone:</label>
                  <div class="col-sm-8">          
                    <input type="number" class="form-control" name="phone" id="dishprice"placeholder="Enter phone">
                  </div>
                </div>
                <div class="form-group">        
                  <div class="col-sm-offset-2 col-sm-8">
                    <button type="submit" class="btn btn-success">Submit</button>
                  </div>
                </div>
              </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>