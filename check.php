<?php

echo"inside the check.php";
include'DBconnect/connect.php';

class revidAndReview{
  public $foodid;
  public $review;
  public $username;
  public $reviewid;
  public $foodname;

  function __construct($FoodId,$username,$Review,$Foodname,$Reviewid)  {
  $this->foodid= $FoodId;
  $this->review= $Review;
  $this->reviewid= $Reviewid;
  $this->username=$username;
  $this->foodname=$Foodname;
  }

}$ReviewArray=array(20);
$totalFoundNumber=0;
$numberOfItemsStored=0;
$objectCreationInfo="";


$reviewQuery="SELECT * FROM trust_level ";
$reviewResult=mysqli_query($conn, $reviewQuery);
if(!$reviewResult)
  die("error querying while selecting from review table");
            $numberOfItemsStored=0;


 if ( ($reviewResult->num_rows) > 0) {
   while($tlRow = $reviewResult->fetch_assoc()) {
      $Review=$tlRow["Review"];
      $username=$tlRow["User_Name"];
      $Foodname=$tlRow["Food_Name"];
      $FoodId=$tlRow["Food_Id"];
      $Reviewid=$tlRow["Review_Id"];
      $disharray[$numberOfItemsStored] = new revidAndReview($FoodId,$username,$Review,$Foodname,$Reviewid) ;
        $numberOfItemsStored++;

    }
}
else {
  echo "There are no items yet...";
  }
  ?>

  <html lang="en">

            <head>
  


            </head>
            <body>
                           <style>
table, th, td {
    padding: 15px;
}
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
      <th width="20%">Food name</th>
      <th width="20%">User Name</th>
      <th width="20%">Reviews</th>
      <th></th>
     </tr>

              <?php  $itemRemaining=$numberOfItemsStored-1; ?>
                  
               <?php
                if ( ($reviewResult->num_rows) > 0)                  
             echo' <div class="row">';
           while($itemRemaining>0){
              echo "<tr>
            <td>".$disharray[$itemRemaining]->foodname."</td>
            <td>".$disharray[$itemRemaining]->username."</td>
            <td>".$disharray[$itemRemaining]->review;
                      
              
                      echo"</td>";?>

            <td><button id='demo' type='button' class='btn btn-danger' name='signup' onclick = 'delreview(<?php echo  ($disharray[$itemRemaining]->reviewid); ?>)'> Delete Review </button></td>
            <?php echo'</tr>'; ?>
            <?php
          $itemRemaining=$itemRemaining-1; } ?>
            

      
        
    </table>
    <script>
  function delreview(id)
  {
var data = {"id":id};
    jQuery.ajax({
      url: 'showreviewdelmodal.php',
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