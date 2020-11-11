<?php
  require 'config.php';
  if(isset($_POST['key'])){
    header("Location: list.php?key=".$_POST['find_s']."");
  }
  if(isset($_POST['name'])){
    header("Location: list.php?name=".$_POST['find_s']."");
  }
  if(isset($_POST['detail'])){
    header("Location: list.php?detail=".$_POST['find_s']."");
  }
  $keys = $redis -> keys('*');
?>
<!DOCTYPE html>
<html>
  <head>
     <title>PHP & MongoDB</title>
     <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  </head>
  <body>

    <div class="container">
    <h1>PHP & MongoDB</h1>

    <form method="POST">
       <div class="form-group">
          <input type="text" name="find_s" required="" class="form-control">
       </div>
       <div class="form-group">
          <button type="submit" name="key" class="btn btn-success">Key</button>
          <button type="submit" name="name" class="btn btn-success">Name</button>
          <button type="submit" name="detail" class="btn btn-success">Detail</button>
       </div>
    </form>

    <table class="table table-borderd">
       <tr>
          <th>Key</th>
          <th>Name</th>
          <th>Details</th>
       </tr>
       <?php
         foreach($keys as $key) {
           if($_GET['name']!=NULL){
             if ($_GET['name']==$redis -> hGet($key,'name')){
               echo "<tr>";
               echo "<td>".$key."</td>";
               echo "<td>".$redis -> hGet($key,'name')."</td>";
               echo "<td>".$redis -> hGet($key,'detail')."</td>";
               echo "</tr>";
             }
           }
           if($_GET['detail']!=NULL){
             if ($_GET['detail']==$redis -> hGet($key,'detail')){
               echo "<tr>";
               echo "<td>".$key."</td>";
               echo "<td>".$redis -> hGet($key,'name')."</td>";
               echo "<td>".$redis -> hGet($key,'detail')."</td>";
               echo "</tr>";
             }
           }
           if($_GET['key']!=NULL){
             if ($_GET['key']==$key){
               echo "<tr>";
               echo "<td>".$key."</td>";
               echo "<td>".$redis -> hGet($key,'name')."</td>";
               echo "<td>".$redis -> hGet($key,'detail')."</td>";
               echo "</tr>";
             }
           }
         };
       ?>

    </table>
    <a href="index.php" class="btn btn-primary">Back</a>
    </div>

  </body>
</html>
