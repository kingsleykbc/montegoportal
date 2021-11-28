<?php
require("./php/components/header.php");
require("./php/components/areYouSureBox.php");
require("./php/components/manageusersComponents/lightBoxes.php");
require_once("./php/validateLogin.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" href="./images/icon.jpg">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="./css/manageusers.css">
  <title>Manage Users</title>
</head>

<body>
  <?php echo $header ?>
  <h2 class='titleRibbon'>Manage Users</h2>

  <!-- STATUS RIBBON -->
  <div id="statusRibbon"></div>

  <!-- USERS LIST -->
  <ul class="usersList" id="usersList"></ul>

  <!-- BOTTOM OPTIONS -->
  <div class="bottomOptions">
    <h3> Options </h3>
    <div class="options">
      <div class="button" onclick="addUser()">+ Add User</div>
    </div>
  </div>

  <!-- LIGHTBOXES -->
  <?php echo $addUserBox ?>
  <?php echo $areYouSureBox ?>

  <script src="./jquery.min.js"></script>
  <script src="./js/script.js"></script>
  <script src="./js/handleManageusers.js"></script>
</body>

</html>