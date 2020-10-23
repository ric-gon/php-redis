<?php

session_start();
require 'config.php';

if (!isset($_SESSION['valid'])){
  $_SESSION['success'] = "Try again";
  header("location: index.php");
}

if(isset($_POST['submit'])){
   $redis->hSet($_GET['id'],name,$_POST['name'],detail,$_POST['detail']);
   $_SESSION['success'] = "Book updated successfully";
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
   <h1>Edit Book</h1>
   <a href="reg.php" class="btn btn-primary">Back</a>

   <form method="POST">
      <div class="form-group">
         <strong>Name:</strong>
         <input type="text" name="name" value="<?php echo $redis->hGet($_GET['id'],'name'); ?>" required="" class="form-control" placeholder="Name">
      </div>
      <div class="form-group">
         <strong>Detail:</strong>
         <textarea class="form-control" name="detail"><?php echo $redis->hGet($_GET['id'],'detail'); ?></textarea>
      </div>
      <div class="form-group">
         <button type="submit" name="submit" class="btn btn-success">Submit</button>
      </div>
   </form>
</div>

</body>
</html>
