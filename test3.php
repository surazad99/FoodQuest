<?php 


$FOODIMAGE=array(100);
$i=0;
include('DBconnect/connect.php');
$sql="SELECT Food_Name,Food_Price,Food_Rating,Food_Image FROM food";
$result = $conn->query($sql);

class Dish{
                public $name;
                public $image;
                public $rating;
                public $price;
                public $foodid;

                function __construct($Name, $Image, $Rating, $Price ,$FoodId) {
                  
                  $this->name = $Name;
                  //echo "<br>".$name;
                  $this->image = $Image;
                  $this->rating = $Rating;
                  $this->price = $Price;
                  $this->foodid= $FoodId;
                }

              } $disharray=array(50);

if ($result->num_rows > 0) {
    echo '<table style="width:70%">
  <col width="80">
  <col width="80">
    <col width="80">
  <col width="80">
    <col width="80">
  <col width="10">
    <col width="10">
  <col width="10">
    <tr>
      <th>Food name</th>
      <th>Food price</th>
      <th>Food Rating</th>
      <th>Images</th>
     </tr>';
    // output data of each row
    while($row = $result->fetch_assoc()) {

      $Name = $row["Food_Name"];
                  $Description =$row["Food_Description"];
                  $Image = $row["Food_Image"];
                  $Rating = $row["Food_Rating"];
                  $Price = $row["Food_Price"];
                  $FoodId = $row["Food_Id"];

                    //echo "Dish Name=" . $row["Food_Name"]. " <br> Description=: " . $row["Food_Description"]."<br><br><br>";
                  
                    $disharray[$numberOfItemsStored] = new Dish($Name, $Image, $Rating, $Price, $FoodId);
                    $numberOfItemsStored++;
     
       //





        echo "<tr><td>".$row["Food_Name"]."</td><td>".$row["Food_Price"]." <td>".$row["Food_Rating"]."</td><td><button type='button' class='btn btn-info' data-toggle='modal' data-target='#myModal' style='float:left;margin-top:10px;'' name='signup'   >aPreview </button></td><tr>";
         $FOODIMAGE[$i]=$row["Food_Image"];
        $i=$i+1;

    }
    echo "</table>";
} else {
    echo "0 results";
}
?>
<html>
<body>
   <!-- Modal -->
                          <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog modal-lg">
                          
                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="btn btn-danger" data-dismiss="modal" style="float:right" name="cancel">Cancel</button>
                              <h1 class="modal-title"style="text-align:center;font-family:Gabriola;">Image</h1>
                            </div>
                            <div class="modal-body">
                        <img src = "<?php echo  $FOODIMAGE[$i];?>" class="img-rounded" style="height:200px;width:320;margin-left:25px;">
                        <?php echo  $i;?>
                        <!-- skdfjsldjsd fkjsd flskdjf lsdkjf sdlkf sdlkf lkj -->
                            


                              
                              
                              </div>
                              
                              
                            </div>
                          </div>
                            </div>
                          </div>

                        </body>

                        <script>
  function detailsmodal(id)
  {
    
    var data = {"id":id};
    jQuery.ajax({
      url: 'showeditmodel.php',
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
</html>