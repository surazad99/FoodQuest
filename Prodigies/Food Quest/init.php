<?php

  $db = mysqli_connect('127.0.0.1','root','','project');
  if (mysqli_connect_errno()) {
    echo 'Database connection failed with following errors: '.mysqli_connect_error();
    die();
  }

  session_start();
  require_once $_SERVER['DOCUMENT_ROOT'].'/project/config.php';
  require_once BASEURL.'helpers/helpers.php';

  if (isset($_SESSION['SBUser'])) {
    $userID = $_SESSION['SBUser'];
    $query = $db->query("SELECT * FROM users WHERE id = '$userID'");
    $userData = mysqli_fetch_assoc($query);
    $fn = explode(' ',$userData['full_name']);
    $userData['first'] = $fn[0];
    $userData['last'] = $fn[1];
  }

  if (isset($_SESSION['success_flash'])) {
    echo '<div class="bg-success"><p class="text-success text-center">'.$_SESSION['success_flash'].'</p></div>';
    unset($_SESSION['success_flash']);
  }

  if (isset($_SESSION['error_flash'])) {
    echo '<div class="bg-danger"><p class="text-danger text-center">'.$_SESSION['error_flash'].'</p></div>';
    unset($_SESSION['erros_flash']);
  }

?>
