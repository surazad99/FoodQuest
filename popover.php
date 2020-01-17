<!-- <html lang="en">
<head>
<meta charset="UTF-8">
<title>Bootstrap Popover with Close Button</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">


$(document).ready(function(){
  placement : 'top',
        html : true,
        title : 'User Info <a href="#" class="close" data-dismiss="alert">&times;</a>',
        content : '<div class="media"><a href="#" class="pull-left"><img src="images/avatar-tiny.jpg" class="media-object" alt="Sample Image"></a><div class="media-body"><h4 class="media-heading">Jhon Carter</h4><p>Excellent Bootstrap popover! I really love it.</p></div></div>'
    });
    $(document).on("click", ".popover .close" , function(){
        $(this).parents(".popover").popover('hide');
    });
});
function callDelete(){
	location.href="delete_member_dish.php";
	//location.href="delete_member_dish.php";
  // var data = {"foodId":foodId};
  // <?php $food_id?>=data;
  //<?php session_start();
    //$_SESSION['food_id']= 
    
  // ?>
}
</script>

</head>
<body>
<div class="bs-example">

    <button type="button" class="btn btn-warning" data-toggle="popover">Delente</button>
    <p> Faster than light</p>
</div>
</body>
</html> -->


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Bootstrap Popover with Close Button</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('[data-toggle="popover"]').popover({
        placement : 'bottom',
        html : true,
        title : 'Are you sure you want to delete',
        content : '<div class="media"><a href="#" class="pull-left"></a><div class="media-body">  <button type="button" class="btn btn-warning">Yes</button><button type="button" style="margin-left:100px;"class="btn btn-primary" >&nbspNo&nbsp</button></div></div>'
    });                                                                                                                                                                               
    $(document).on("click", ".popover .btn-primary" , function(){
        $(this).parents(".popover").popover('hide');
    });
});
</script>
</head>
<body>
<div class="bs-example">
    <button type="button" class="btn btn-danger" data-toggle="popover">Click Me</button>
</div>
</body>
</html>