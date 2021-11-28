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
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="./css/suggestionbox.css">
  <title>Suggestion Box</title>
</head>

<body>
  <?php echo $header ?>
  <h2 class="titleRibbon"> <a href="./suggestionsandsurveys.php">My suggestions</a> </h2>

  <!-- STATUS RIBBON -->
  <div id="statusRibbon"></div>

  <!-- MY SUGGESTIONS -->
  <div class="mySuggestions" id="mySuggestions">
    <!-- SUGGESTIONS -->
  </div>

  <br>
  <br>
  <br>
  <br>

  <!-- BOTTOM OPTIONS -->
  <div class="bottomOptions">
    <h3> Options </h3>
    <div class="options">
      <a href="viewsuggestions.php" class="button">View staff suggestions</a>
      <div class="button" onclick="toggleBox('addSuggestion')">Add Suggestion</div>
    </div>
  </div>

  <!-- ADD SUGGESTION LIGHTBOX -->
  <div id="addSuggestion" class="lightbox">
    <div id="box">

      <div class='boxTitle'>Add Suggestion</div>

      <form class="form" id="addSuggestionForm" onsubmit="postSuggestion()">
        <div class="fields">

          <!-- TITLE -->
          <div class="formField">
            <h3> Title </h3>
            <input type="text" name="title" id="title" required>
          </div>

          <!-- CATEGORY  -->
          <div class="formField">
            <h3> Category </h3>
            <select name="category" id="category" required>
              <option value="">--</option>
              <option>Health and safety</option>
              <option>Human resources</option>
              <option>Food</option>
              <option>Policy</option>
              <option>IT</option>
              <option>Security</option>
              <option>Other</option>
            </select>
          </div>

          <!-- COMMENT -->
          <div class="formField">
            <h3> Comment </h3>
            <textarea name="comment" id="comment" required></textarea>
          </div>
        </div>

        <div class="aCenter"> <button> Add </button> </div>
      </form>
    </div>
    <div class="back" onclick="toggleBox('addSuggestion')"></div>
  </div>

  <script src="./jquery.min.js"></script>
  <script src="./js/script.js"></script>
  <script src="./js/handlesuggestionbox.js"></script>
</body>

</html>