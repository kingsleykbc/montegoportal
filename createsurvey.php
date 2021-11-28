<?php
require("./php/components/header.php");
require_once("./php/validateLogin.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="./images/icon.jpg">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="./css/createsurvey.css">
  <title>Create survey</title>
</head>

<body>
  <?php echo $header ?>
  <h2 class="titleRibbon"> <a href="./suggestionsandsurveys.php"> Create new survey </a></h2>
  <div id="statusRibbon"></div>

  <!-- STATUS RIBBON -->
  <div id="statusRibbon"></div>

  <!-- CREATE SURVEY FORM -->
  <div class="mySuggestions" id="allSuggestions">
    <?php
    if (isset($_GET["surveyid"]))
      require("./php/components/createSurveyComponents/addQuestions.php");
    else
      require("./php/components/createSurveyComponents/createSurveyForm.php");
    ?>
  </div>

  <!-- BOTTOM OPTIONS -->
  <div class="bottomOptions">
    <h3> Options </h3>
    <div class="options">
      <a href="mysurveys.php" class="button">View my surveys</a>
    </div>
  </div>

  <br>
  <br>
  <br>

  <script src="./jquery.min.js"></script>
  <script src="./js/script.js"></script>
  <script src="./js/createsurvey.js"></script>
</body>

</html>