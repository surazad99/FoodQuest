<?php
 include_once'DBconnect/connect.php';
 $dish_name = $_POST['dishname'];
  $dish_price= $_POST['dishprice'];
  $dish_description = $_POST['description'];
  $dish_image_location = "images/";
 $food_id=$_POST['dishid'];

 $queryUpdate = "UPDATE food SET Food_Name='$dish_name',Food_Price='$dish_price',Food_Description='$dish_description' WHERE Food_Id='$food_id'";
   $resultRead= mysqli_query($conn, $queryUpdate)
    or die('Error querying Update database');
    mysqli_close($conn);
    include'DBconnect/connect.php';

    $queryRead ="SELECT Uploaded_Time,Food_Image FROM food WHERE Food_Id='$food_id'";
  $resultRead= mysqli_query($conn, $queryRead)
    or die('Error querying Read database');

   if ( ($resultRead->num_rows) > 0) {
          $uploadedTime=0;
          
              while($row = $resultRead->fetch_assoc()) {
                if ($uploadedTime< strtotime($row['Uploaded_Time'])) {
                  $sqlTime =$row['Uploaded_Time'];
                  $dish_image_location=$row['Food_Image'];
                  $uploadedTime=strtotime($row['Uploaded_Time']);
                }


              } 
          }
  //  $food_id=


   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
		  
		  $dish_image_location=$dish_image_location.$dish_name.$uploadedTime.".jpg";
         move_uploaded_file($file_tmp,$dish_image_location);
         echo "Image uploading Success";
		 //echo "the image is stored at:'images/$file_name'";
      }else{
         print_r($errors);
      }
   }

   $queryUpdate = "UPDATE food SET Food_Image='$dish_image_location' WHERE Uploaded_Time='$sqlTime'";
   $resultRead= mysqli_query($conn, $queryUpdate)
    or die('Error querying Update database');

	//echo('Succeded');
	mysqli_close($conn);
  header('location:memberpage.php');
	
 

 



?>
