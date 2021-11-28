<?php
require("./php/components/header.php");
require("./php/handleViewSurveyResults.php");
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
  <link rel="stylesheet" href="./css/viewsurveyresults.css">
  <title><?php echo $surveyedStaff ?> survey result</title>
</head>

<body>
  <?php echo $header ?>
  <h2 class="titleRibbon"> <a href="./suggestionsandsurveys.php"><?php echo $surveyTitle ?></a></h2>

  <div class="sectionContent">
    <div class="surveyDetails">
      <div class="topSection">
        <h2><?php echo $surveyedStaff ?></h2>
        <div class="datePosted"><?php echo $datePosted ?></div>
      </div>
      <p><?php echo $surveyTitle ?></p>
      <div class="highlightedText grey"><?php echo $surveyURL ?></div>
    </div>

    <h3 class='answerHeading'>Staff ratings</h3>
    <div class="answers">
      <?php echo $answers ?>
    </div>
  </div>

  <script src="./jquery.min.js"></script>
  <script src="./js/script.js"></script>
  <script src="./js/mysurvey.js"></script>
</body>

</html>