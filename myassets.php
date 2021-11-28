<?php
require_once("./php/handleAssets.php");
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
  <link rel="stylesheet" href="./css/dashboard.css">
  <link rel="stylesheet" href="./css/myassets.css">
  <title>My Assets</title>
</head>

<body>
  <?php echo $header ?>

  <!-- SECONDARY HERDER -->
  <h2 class="titleRibbon"> <a href="./assetsmenu.php">Asset List</a> </h2>

  <!-- STATUS RIBBON -->
  <div id="statusRibbon"></div>

  <!-- FILTER RESULT -->
  <div class="sectionContent">
    <h2>My Assets</h2>
    <div id="myassets"></div>
  </div>

  <script src="./jquery.min.js"></script>
  <script src="./js/script.js"></script>
  <script src="./js/handleMyAssets.js"></script>
</body>

</html>