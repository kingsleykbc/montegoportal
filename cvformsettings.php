<?php
require_once("./php/handleViewSuggestions.php");
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
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="./css/cvformsettings.css">
  <title>CV form settings</title>
</head>

<body>
  <?php echo $header ?>
  <h3 class='titleRibbon'><a href="./dashboard.php"> Staff CV Dashboard</a></h3>

  <!-- STATUS RIBBON -->
  <div id="statusRibbon"></div>

  <!-- VIEW EXISTING SUGGESTIONS -->
  <div class="sectionContent">
    <h1>Form Settings</h1>
    <p>Edit the form to be filled by prospective job applicants.</p>

    <div class="form">
      <h3>Vacant Positions</h3>
      <div id="positionsList"></div>

      <div class="positionInput">
        <input type="text" placeholder="Enter text here" id="position">
        <button onclick="addPosition()">Add Position</button>
      </div>
    </div>
  </div>

  <br>
  <br>

  <script src="./jquery.min.js"></script>
  <script src="./js/script.js"></script>
  <script src="./js/cvformsettings.js"></script>
</body>

</html>