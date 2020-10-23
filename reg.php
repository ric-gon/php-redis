<?php
  session_start();
   if (!isset($_SESSION['valid'])){
     $_SESSION['success'] = "Try again";
     header("location: index.php");
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
    <h1>PHP & Redis</h1>

    <a href="create.php" class="btn btn-success">Add Book</a>

    <?php
       if(isset($_SESSION['success'])){
          echo "<div class='alert alert-success'>".$_SESSION['success']."</div>";
       }
    ?>

    <table class="table table-borderd">
       <tr>
          <th>Key</th>
          <th>Name</th>
          <th>Details</th>
          <th>Action</th>
       </tr>
       <?php
          require 'config.php';
          $keys = $redis -> keys('*');
          foreach($keys as $key) {
             echo "<tr>";
             echo "<td>".$key."</td>";
             echo "<td>".$redis -> hGet($key,'name')."</td>";
             echo "<td>".$redis -> hGet($key,'detail')."</td>";
             echo "<td>";
             echo "<a href='edit.php?id=".$key."' class='btn btn-primary'>Edit</a>";
             echo "<a href='delete.php?id=".$key."' class='btn btn-danger'>Delete</a>";
             echo "</td>";
             echo "</tr>";
          };
       ?>
    </table>
    <a href="logout.php" class="btn btn-success">Log out</a>
    </div>

  </body>
</html>
