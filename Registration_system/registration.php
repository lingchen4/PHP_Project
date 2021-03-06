<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registation</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">

    <div class="header">
      <h2>Register</h2>
    </div>

    <form action="registration.php" method="POST">

      <?php include("errors.php") ?>

      <div>
        <label for="username">Username: </label>
        <input type="text" name="username" id="username" required>
      </div>

      <div>
        <label for="email">Email: </label>
        <input type="email" name="email" id='email' required>
      </div>

      <div>
        <label for="password_1">Password: </label>
        <input type="password" name="password_1" id="password_1" required>
      </div>

      <div>
        <label for="password_2">Confirm Password: </label>
        <input type="password" name="password_2" id="password_2" required>
      </div>

      <button type="submit" name="submit">Submit</button>

      <p>Already a user?  <a href="login.php"><b> Log in</b></a></p>
    </form>
  </div>
</body>
</html>