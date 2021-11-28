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
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="./css/suggestionbox.css">
  <title>View suggestions</title>
</head>

<body>
  <?php echo $header ?>
  <h2 class="titleRibbon"> <a href="./suggestionsandsurveys.php">View and respond to staff suggestions</a></h2>

  <!-- STATUS RIBBON -->
  <div id="statusRibbon"></div>

  <!-- VIEW EXISTING SUGGESTIONS -->
  <div class="mySuggestions" id="allSuggestions"></div>

  <!-- BOTTOM OPTIONS -->
  <div class="bottomOptions">
    <h3> Options </h3>
    <div class="options">
      <label class="hseToggle">
        <input type="checkbox" onchange="hseToggle()" id="">
        <span>Show only HSE suggestions</span>
      </label>
    </div>
  </div>

  <br>
  <br>
  <br>

  <script src="./jquery.min.js"></script>
  <script src="./js/script.js"></script>
  <script src="./js/handleViewSuggestion.js"></script>
</body>

</html>