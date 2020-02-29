<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">

    <div class="header">
      <h2>Login in</h2>
    </div>

    <form action="login.php" method="POST">
    <?php if(isset($_SESSION['msg']))  : ?>
      <p><?php echo $_SESSION['msg'] ?>
    <?php endif ?>
    <?php include("errors.php") ?>
      <div>
        <label for="username">Username: </label>
        <input type="text" name="username" id="username" required>
      </div>


      <div>
        <label for="password_1">Password: </label>
        <input type="password" name="password_1" id="password_1" required>
      </div>

      <button type="submit" name="login_submit">Log in</button>

      <p>Not a user?  <a href="registration.php"><b> Register</b></a></p>
    </form>
  </div>
</body>
</html>