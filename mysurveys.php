<?php
require("./php/components/header.php");
require_once("./php/validateLogin.php");
require("./php/components/areYouSureBox.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" href="./images/icon.jpg">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="./css/mysurveys.css">
  <title>My surveys</title>
</head>

<body>
  <?php echo $header ?>
  <h2 class="titleRibbon"> <a href="./suggestionsandsurveys.php">My Surveys</a></h2>
  <div id="statusRibbon"></div>

  <!-- EXISTING SURVEYS -->
  <div class="mySurveys sectionContent blank" id="mySurveys"></div>

  <!-- BOTTOM OPTIONS -->
  <div class="bottomOptions">
    <h3> Options </h3>
    <div class="options">
      <a class="button" href="createsurvey.php">+ New Survey</a>
    </div>
  </div>

  <br>
  <br>
  <br>
  <br>
  
  <?php echo $areYouSureBox ?>

  <script src="./jquery.min.js"></script>
  <script src="./js/script.js"></script>
  <script src="./js/mysurveys.js"></script>
</body>

</html>