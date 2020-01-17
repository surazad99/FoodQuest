 <?php
    header('Content-Type: text/xml');
    echo'<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>';
    echo '<response>';
    $food=$_GET['food'];
      if(($food=="member"))
      {
     //echo'Enter addditional details:<input type="text" name="optional">';
     }

      else 
      {
      echo "aint got ".$food;
      }
     echo'</response>';
    ?>