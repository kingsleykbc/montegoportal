<?php
require("./php/components/header.php");
require("./php/components/areYouSureBox.php");
require("./php/components/itrequestsComponents/ressolveLightbox.php");
require("./php/components/itrequestsComponents/addRequestLightbox.php");
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
  <title>My IT Requests</title>
</head>

<body>
  <?php echo $header ?>
  <div class='titleRibbon'>
    <a href="./itsupportmenu.php">
      <h3>My IT Requests</h3>
    </a>
    <div class="showOption">
      <label>
        <input type="checkbox" name="" id="ressolvedToggle">
        <span>Hide ressolved issues</span>
      </label>
    </div>
  </div>

  <!-- STATUS RIBBON -->
  <div id="statusRibbon"></div>

  <!-- MY IT REQUESTS -->
  <div id="myRequests"></div>

  <!-- BOTTOM OPTIONS -->
  <div class="bottomOptions">
    <h3> Options </h3>
    <div class="options">
      <div class="button" onclick="toggleBox('addRequest')">+ New Request</div>
    </div>
  </div>

  <br>
  <br>
  <br>

  <?php echo $addRequestBox ?>
  <?php echo $ressolveBox ?>
  <?php echo $areYouSureBox ?>

  <!-- JS  -->
  <script src="./jquery.min.js"></script>
  <script src="./js/script.js"></script>
  <script src="./js/handleITRequests.js"></script>
</body>

</html>