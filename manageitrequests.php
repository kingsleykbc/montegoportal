<?php
require("./php/components/header.php");
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
  <link rel="stylesheet" href="./css/itrequests.css">
  <link rel="stylesheet" href="./css/manageitrequests.css">
  <title>Manage IT Requests</title>
</head>

<body>
  <?php echo $header ?>

  <a href="./itsupportmenu.php">
    <h2 class='titleRibbon'>Manage IT Requests</h2>
  </a>

  <!-- STATUS RIBBON -->
  <div id="statusRibbon"></div>

  <div class="sectionContent blank">
    <div id="activeITRequests"></div>
  </div>

  <!-- JS  -->
  <script src="./jquery.min.js"></script>
  <script src="./js/script.js"></script>
  <script src="./js/handleManageITRequets.js"></script>
</body>

</html>