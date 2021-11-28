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
  <link rel="stylesheet" href="./css/newimprovementcard.css">
  <title>New Improvement Card</title>
</head>

<body>
  <?php echo $header ?>
  <h2 class="titleRibbon"> <a href="./myimprovementcards.php"> Add HSE Improvement Card </a></h2>
  <div id="statusRibbon"></div>

  <!-- STATUS RIBBON -->
  <div id="statusRibbon"></div>

  <!-- CREATE SURVEY FORM -->
  <form action="index.php" class="whiteBoard createSurveyForm" id="newImprovementCard" onsubmit="postImprovementCard()">

    <label class="mainFormField">
      <h3>Detail description of occurence </h3>
      <textarea name="details" required></textarea>
    </label>

    <label class="mainFormField">
      <h3>Immediate actions taken </h3>
      <textarea name="actionsTaken" required></textarea>
    </label>

    <label class="mainFormField">
      <h3>Suggested improvement actions </h3>
      <textarea name="suggestedImprovementActions" required></textarea>
    </label>

    <label class="mainFormField">
      <h3>Location (site) of occurence</h3>
      <input type="text" name="locationOfOccurence" required />
    </label>

    <label class="mainFormField">
      <h3>Actual area on site of occurence</h3>
      <input type="text" name="areaOnSite" required />
    </label>

    <label class="mainFormField">
      <h3>What is the most likely cause?</h3>
      <select name="mostLikelyCause" id="mostLikelyCause" onchange="toggleSpecifyDisplay()" required>
        <option value="">--</option>
        <option>Slippery/uneven surface</option>
        <option>Extreme weather condition</option>
        <option>Poor housekeeping</option>
        <option>Inadequate risk assessment</option>
        <option>Inadequate communication</option>
        <option>Inadequate waste segregation</option>
        <option>Insufficient planning/preparation</option>
        <option>Non-compliance with PPE policy</option>
        <option>Inadequate supervision</option>
        <option>Non-compliance with work procedure</option>
        <option>Defective/Damaged tools/equipment</option>
        <option>Inadequate training</option>
        <option>Inadequate safety signs</option>
        <option>Disregard for HSE etiquette</option>
        <option>Lack of concentration</option>
        <option>Others</option>
      </select>
    </label>

    <label class="mainFormField" id="specifyOthers">
      <h3>Please specify</h3>
      <input type="text" name="othersSpecify" />
    </label>

    <div class="aCenter"> <button>Submit</button> </div>
  </form>


  <br>
  <br>
  <br>
  <br>


  <script src="./jquery.min.js"></script>
  <script src="./js/script.js"></script>
  <script src="./js/newimprovementcard.js"></script>
</body>

</html>