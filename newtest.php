 <?php 
 $empty = "";
           
              $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "food quest";
              $conn = new mysqli($servername, $username, $password, $dbname);
              if ($conn->connect_error)
                die("Connection failed: " . $conn->connect_error);
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

              }
 $disharray=array(50);
$queryFood = "SELECT * FROM food ";
 $result=mysqli_query($conn, $queryFood);
            if(!$result)
              echo"error querying database";


            $numberOfItemsStored = 0;

            if ( ($result->num_rows) > 0) {
            
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

                  $file_location = $row["Food_Image"];
            //    echo readfile("$file_location");
                }
            } else {
                //echo "<br><br><br>0 results";
               echo "There are no items yet...";
                
                //echo $disItem;
            }

    
            $conn->close();
            ?>
               <!DOCTYPE html>
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
      <th>Food name</th>
      <th>Food Price</th>
      <th>Food rating</th>
      <th>Images</th>
      <th>Delete or edit</th>
     </tr>

              <?php  $itemRemaining=$numberOfItemsStored-1; ?>
                  
               <?php
                if ( ($result->num_rows) > 0)                  
             echo' <div class="row">';
           while($itemRemaining>0){
            echo "<tr>
            <td>".$disharray[$itemRemaining]->name."</td>
            <td>".$disharray[$itemRemaining]->price."</td>
            <td>";$Rating= $disharray[$itemRemaining]->rating;
                      include('starTest.php');
              
                      echo"</td>";?>

            <td><button id='demo' type='button' class='btn btn-info' name='signup' onclick = 'detailsmodal(<?php echo  ($disharray[$itemRemaining]->foodid); ?>)'> Preview </button></td>
            <td><button type='button' class='btn btn-danger' onclick="callDel(<?= ($disharray[$itemRemaining]->foodid); ?>)">Delete </button></td>
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

  function callDel(id)
  {
    var data = {"id":id};
    jQuery.ajax({
      url: 'showdeletemodal1.php',
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
</script>

                        
            </body>
            </html>
