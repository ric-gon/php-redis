<?php

session_start();
if (!isset($_SESSION['valid'])){
  $_SESSION['success'] = "Try again";
  header("location: index.php");
}
require 'config.php';

$redis -> del($_GET['id']);

$_SESSION['success'] = "Book deleted successfully";
header("Location: reg.php");

?>
