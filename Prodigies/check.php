<?php
include'DBconnect/connect.php';

class revidAndReview{
  public $foodid;
  public $review;
  public $userid;

  function __construct($FoodId,$UserId,$Review)  {
  $this->foodid= $FoodId;
  $this->review= $Review;
  $this->userid=$UserId;
  }

}$ReviewArray=array(20);
$totalFoundNumber=0;
$numberOfItemsStored=0;
$objectCreationInfo="";


$reviewQuery="SELECT * FROM trust_level";
$reviewResult=mysqli_query($conn, $reviewQuery);
if(!$reviewResult)
  die("error querying while selecting from review table");
            $numberOfItemsStored=0;


 if ( ($reviewResult->num_rows) > 0) {
   while($tlRow = $reviewResult->fetch_assoc()) {
      $Review=$tlRow["Review"];
      $UserId=$tlRow["Uploaded_By"];
      $FoodId=$tlRow["Food_Id"];
      $disharray[$numberOfItemsStored] = new revidAndReview($FoodId,$UserId,$Review) ;
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
      <th width="40%">Food name</th>
      <th></th>
     </tr>

              <?php  $itemRemaining=$numberOfItemsStored-1; ?>
                  
               <?php
                if ( ($reviewResult->num_rows) > 0)                  
             echo' <div class="row">';
           while($itemRemaining>0){
            echo "<tr>
            <td>".$disharray[$itemRemaining]->foodid."</td>";
            
              
                      echo"</td>";?>

            <td><button id='demo' type='button' class='btn btn-info' name='signup' onclick = 'detailsmodal(<?php echo  ($disharray[$itemRemaining]->foodid); ?>)'> View Reviews </button></td>
            </tr>
            <?php
          $itemRemaining=$itemRemaining-1; } ?>
            

      
        
    </table>
    <script>
  function detailsmodal(id)
  {
    
    var data = {"id":id};
    jQuery.ajax({
      url: 'showeditmodel1.php',
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