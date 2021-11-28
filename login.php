<?php
session_start();
require_once('./php/handleLogin.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" href="./images/icon.jpg">
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="css/login.css">
  <title>Montego Staff Pool Car</title>
</head>

<body>
  <div class="form">
    <div class="fields">
      <img src="./images/logo.png" />
      <form action="login.php" class="login" method="post">
        <div class="formField">
          <h4>Email</h4>
          <input type="text" name="email" placeholder="Email" />
        </div>
        <div class="formField">
          <h4>Password</h4>
          <input type="password" name="password" placeholder="Password" />
        </div>
        <input type="submit" name="submit" value="Sign In" />
      </form>
    </div>
  </div>

  <footer>Developed by Kingsley</footer>

  <?php echo $errors ?>
</body>

</html>