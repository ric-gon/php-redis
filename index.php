<?php
  session_start();

   if(isset($_POST['login'])){

     if($_POST['user'] == 'usuario' && $_POST['password'] == 'clave'){
       $_SESSION['valid'] = true;
       $_SESSION['success'] = "login successful";
       header("Location: reg.php");
     } else {
       $_SESSION['success'] = "Try again";
       header("Location: index.php");
     }
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
       </tr>
       <?php
          require 'config.php';
          $keys = $redis -> keys('*');
          foreach($keys as $key) {
             echo "<tr>";
             echo "<td>".$key."</td>";
             echo "<td>".$redis -> hGet($key,'name')."</td>";
             echo "<td>".$redis -> hGet($key,'detail')."</td>";
             echo "</tr>";
          };
       ?>

    </table>

    <form method="POST">
       <div class="form-group">
          <strong>User:</strong>
          <input type="text" name="user" required="" class="form-control" placeholder="User">
       </div>
       <div class="form-group">
          <strong>Password:</strong>
          <input type="text" name="password" required="" class="form-control" placeholder="Password">
       </div>
       <div class="form-group">
          <button type="submit" name="login" class="btn btn-success">Login</button>
       </div>
    </form>
    </div>

  </body>
</html>
