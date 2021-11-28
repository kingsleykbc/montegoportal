<?php
require_once("./php/handleTakeSurvey.php");
require_once("./php/components/successMessage.php");
?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="./images/icon.jpg">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/takesurvey.css">
  <title>Survey Staff</title>
</head>

<body>
  <form class="sectionContent" id="submitSurvey" onsubmit="submitSurvey()">

    <!-- TOP SECTION -->
    <div class="topSection">

      <!-- TITLE AND LOGO -->
      <div class="title">
        <div class="logoSection">
          <img src="./images/icon.jpg" />
          <span class="responsiveHide">Montego staff survey</span>
        </div>
        <span class="surveyTitle"><?php echo $title ?></span>
      </div>

      <!-- DESCRIPTION -->
      <div class="description">
        <?php echo $description ?>
      </div>

      <!-- HEADER FORM -->
      <div class="headerForm">
        <div class="mainFormField">
          <h3>Email</h3>
          <input type="email" name="surveyingStaffEmail" id="surveyingStaffEmail" required>
        </div>

        <div class="mainFormField">
          <h3>Staff being surveyed</h3>
          <select type="text" name="surveyedStaff" id="surveyedStaff" required>
            <option value="">--</option>
            <?php echo $staffNames ?>
          </select>
        </div>
      </div>
    </div>

    <!-- QUESTIONS -->
    <div class="questions">
      <?php echo $questions ?>
    </div>

    <!-- SUBMIT BUTTON -->
    <div class="aCenter">
      <button> Submit </button>
    </div>
  </form>

  <?php successMessage("Survey submitted", "Thank you for taking the survey! you can close the tab now.") ?>

  <script src="./jquery.min.js"></script>
  <script src="./js/script.js"></script>
  <script src="./js/takesurvey.js"></script>
</body>

</html>