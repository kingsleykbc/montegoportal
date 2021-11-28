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
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="./css/dashboard.css">
  <link rel="stylesheet" href="./css/viewstaffimprovementcards.css">
  <title>My Improvement Cards</title>
</head>

<body>
  <?php echo $header ?>
  <h2 class="titleRibbon"> <a href="./hse.php">My improvement cards</a> </h2>

  <div id="statusRibbon"></div>

  <div class="result">
    <div class="resultTable" id="resultTable">
      <table>
        <thead>
          <td>#</td>
          <td>Date Posted</td>
          <td>Reported by</td>
          <td>Department</td>
          <td>Details</td>
          <td>Actions taken</td>
          <td>Suggested Improvement Actions</td>
          <td>Location of Occurence</td>
          <td>Area on Site</td>
          <td>Most Likely Cause</td>
          <td>Improvement Category</td>
          <td>Recommended Actions</td>
          <td>Severity</td>
          <td>Comment</td>
          <td>Respond</td>
        </thead>
        <tbody id="myImprovementCards">
          <!-- Serch Result -->
        </tbody>
      </table>
    </div>
  </div>

  <br>
  <br>
  <br>
  <br>

  <!-- BOTTOM OPTIONS -->
  <!-- <div class="bottomOptions">
    <h3> Options </h3>
    <div class="options">
      <a href="newimprovementcard.php" class="button">Submit new card</a>
    </div>
  </div> -->

  <?php echo $areYouSureBox ?>
  <?php require("./php/components/viewstaffimprovementcardsComponents/respondBox.php"); ?>

  <script src="./jquery.min.js"></script>
  <script src="./js/script.js"></script>
  <script src="./js/viewStaffImprovementCards.js"></script>
</body>

</html>