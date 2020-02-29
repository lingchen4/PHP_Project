<?php 

session_start();

if(!isset($_SESSION["username"])){
  $_SESSION['msg'] = "You must log in to view this page";
  header('location: login.php');
}

if(isset($_GET['logout'])){
  session_destroy();
  unset($_SESSION['username']);
  header('location: login.php');
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Homepage</title>
</head>
<body>
  <h1>This is the Home Page</h1>
  <?php 
  if(isset($_SESSION['success'])) : ?>

  <div>
    <h3>
      <?php 
      echo $_SESSION['success'];
      unset($_SESSION['success']);

      ?>
    </h3>
  </div>

    <?php endif ?>



  <?php if(isset($_SESSION['username'])) : ?>
    <h3>Welcome <strong><?php echo $_SESSION['username'] ?></strong></h3>
    <button><a href="index.php?logout='1'">logout</a></button>
  <?php endif ?>
</body>
</html>