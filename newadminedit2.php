<?php 
include('DBconnect/connect.php');

class cMem{
                public $fname;
                public $lname;
                public $userid;
                public $uname;
                public $utype;
                public $uemail;
                public $uphone;

                function __construct($Fname, $Lname, $userid, $Uname ,$Utype,$Uemail,$Uphone) {
                  
                  $this->fname = $Fname;
                  //echo "<br>".$name;
                  $this->lname = $Lname;
                  $this->userid = $userid;
                  $this->uname = $Uname;
                  $this->utype= $Utype;
                  $this->uemail= $Uemail;
                  $this->uphone= $Uphone;
                }

              } $memarray=array(50);

// session part here

$qmem="SELECT * FROM consumer WHERE User_Type in (0) ORDER BY First_Name";
$result = mysqli_query($conn, $qmem);
if(!$result)
              echo"error querying database";

$numberOfMemStored = 0;

if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {
                  $Fname = $row["First_Name"];
                  $Lname =$row["Last_Name"];
                  $userid = $row["User_Id"];
                  $Uname = $row["User_Name"];
                  $Utype = $row["User_Type"];
                  $Uemail = $row["Email"];
                  $Uphone = $row["Phone_Number"];

                  $memarray[$numberOfMemStored] = new cMem($Fname, $Lname, $userid, $Uname ,$Utype,$Uemail,$Uphone);
                    $numberOfMemStored++;
            }
          }
          $conn->close();
            ?>
            <html>

            <head>
            </head>
            <body>
            <style>
table, th, td {
    padding: 15px;}
</style>
    <table style="width:100%" class="table table-hover">
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
      
      <th width="10%">User Email</th>
      <th>Phone number</th>
      <th>Options</th>
     </tr>
    <?php  $memRemaining=$numberOfMemStored-1; ?>
    <?php
          if ( ($result->num_rows) > 0) 
            echo' <div class="row">';
             while($memRemaining>0){
            echo "<tr>
            <td>".$memarray[$memRemaining]->fname."</td>
            <td>".$memarray[$memRemaining]->lname."</td>
            <td>".$memarray[$memRemaining]->userid."</td>
            <td>".$memarray[$memRemaining]->uname."</td>
            
            <td>".$memarray[$memRemaining]->uemail."</td>
            <td>".$memarray[$memRemaining]->uphone."</td>";
                      
              
                   echo"</td>";   ?>

            <td><button type="button" class="btn btn-info"onclick = "calledit(<?= ($memarray[$memRemaining]->userid); ?>)">&nbsp&nbspEdit&nbsp&nbsp</button>
</td>
            <td><button type="button" class="btn btn-danger" onclick="callDel(<?= ($memarray[$memRemaining]->userid); ?>)">Delete </button></td>
            <?php
echo"</tr>";        $memRemaining=$memRemaining-1; }  

      ?>
        
   
    </table>
  
 </body>
  <script>
  function calledit(id)
  {
    
    var data = {"id":id};
    jQuery.ajax({
      url: 'admineditmodal2.php',
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

  function callDel(id)
  {
    var data = {"id":id};
    jQuery.ajax({
      url: 'admindelmodal2.php',
      method: "post",
      data: data, 
      success: function(data){
        jQuery('body').append(data);
        jQuery('#delete-modal').modal('toggle');
        //alert("succeded");
      },
      error: function(){
        alert("Something went wrong.");
      }
    });
  }
  
</script>                        
            
            </html>