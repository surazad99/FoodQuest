<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Member Management</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
 
  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="home.php" class="logo">
      Food Quest
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
         
          
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">Admin</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-down pull-right"></i>
              </span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                

                <p>
                  ADMIN NAME
                  
                </p>
              </li>
              
             
              <!-- Menu Footer-->
              <li class="user-footer">
                
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat" >Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="foodquest.jpg" class="img-square" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Admin NAME</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">CONTENTS</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>User Management</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="membermanagement.php">Member Management</a></li>
            <li><a href="clientmanagement.php">Client Management</a></li>
          </ul>
        </li>
        <li class="active"><a href="foodmanagement.php"><i class="fa fa-link"></i> <span>Food Management</span></a></li>
        
        <li class="active"><a href="review.php"><i class="fa fa-link"></i> <span>Review Management</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Member list:
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

   <?php 
include('DBconnect/connect.php');

class Dish{
                public $fname;
                public $lname;
                public $uid;
                public $uname;
                public $utype;
                public $uemail;
                public $uphone;

                function __construct($Fname, $Lname, $Uid, $Uname ,$Utype,$Uemail,$Uemail,$Uphone) {
                  
                  $this->$fname = $Fname;
                  //echo "<br>".$name;
                  $this->$lname = $Lname;
                  $this->$uid = $Uname;
                  $this->$uname = $Utype;
                  $this->$utype= $Uemail;
                  $this->$uemail= $Uemail;
                  $this->$uphone= $Uphone;
                }

              } $memarray=array(50);

// session part here

$queryMem="SELECT * FROM consumer WHERE User_Type=1 ORDER BY First_Name";
$result = mysqli_query($conn, $queryMem);
if(!$result)
              echo"error querying database";

$numberOfMemStored = 0;
if ( ($result->num_rows) > 0) {
              //$username=session
                while($row = $result->fetch_assoc()) {
                  $Name = $row["First_Name"];
                  $Description =$row["Last_Name"];
                  $Image = $row["User_Id"];
                  $Rating = $row["User_Name"];
                  $Price = $row["User_Type"];
                  $FoodId = $row["Email"];
                  $FoodId = $row["Phone_Number"];

}
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
          <h2 class="modal-title"style="text-align:center;font-family:Gabriola;color:#00cc88;font-weight:bold">Editing Members</h2>
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
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->




  <!-- Main Footer -->
  <footer class="main-footer" >
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Dev Prodigies
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2017 <a href="#">Food Quest</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    
    
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>