<?php

session_start();

if (!isset($_SESSION['valid'])){
  $_SESSION['success'] = "Try again";
  header("location: index.php");
}

if(isset($_POST['submit'])){

   require 'config.php';
   $redis->hSet($_POST['key'],name,$_POST['name'],detail,$_POST['detail']);

   $_SESSION['success'] = "Book created successfully";
   header("Location: reg.php");
}
?>

<!DOCTYPE html>
<html>
<head>
   <title>PHP & Redis</title>
   <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>

<div class="container">

   <h1>Create Book</h1>
   <a href="reg.php" class="btn btn-primary">Back</a>

   <form method="POST">
     <div class="form-group">
        <strong>Key:</strong>
        <input type="text" name="key" required="" class="form-control" placeholder="Key">
     </div>
      <div class="form-group">
         <strong>Name:</strong>
         <input type="text" name="name" required="" class="form-control" placeholder="Name">
      </div>
      <div class="form-group">
         <strong>Detail:</strong>
         <textarea class="form-control" name="detail" placeholder="Detail" placeholder="Detail"></textarea>
      </div>
      <div class="form-group">
         <button type="submit" name="submit" class="btn btn-success">Submit</button>
      </div>
   </form>
</div>

</body>
</html>
