<?php
require("./php/components/header.php");
require("./php/handleMySurvey.php");
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
  <link rel="stylesheet" href="./css/mysurvey.css">
  <title><?php echo $surveyTitle ?></title>
</head>

<body>
  <?php echo $header ?>
  <h2 class="titleRibbon"> <a href="./suggestionsandsurveys.php"><?php echo $surveyTitle ?></a></h2>

  <div class="sectionContent">
    <div class="surveyDetails">
      <div class="topSection">
        <h2><?php echo $surveyTitle ?></h2>
        <div class="datePosted"><?php echo $datePosted ?></div>
      </div>
      <p><?php echo $description ?></p>
      <div class="highlightedText grey"><?php echo $surveyURL ?></div>
    </div>

    <h3 class='answerHeading'>Results</h3>
    <div class="answers">
      <?php echo $answers ?>
    </div>
  </div>

  <script src="./jquery.min.js"></script>
  <script src="./js/script.js"></script>
  <script src="./js/mysurvey.js"></script>
</body>

</html>