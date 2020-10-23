<?php
  session_start();
  if (!isset($_SESSION['valid'])){
    $_SESSION['success'] = "Try again";
    header("location: index.php");
  }
  unset($_SESSION['valid']);

  $_SESSION['success'] = "Log out successfully";
  header("Location: index.php");
?>
