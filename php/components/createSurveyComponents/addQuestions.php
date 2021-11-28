<?php
require_once("./php/icons.php");
require_once("./php/config.php");
require_once("./php/functions/createSurveyFunctions.php");

$surveyURL = "$domain/takesurvey.php?surveyid=" . $_GET["surveyid"];
?>
<div class="addQuestions sectionContent">
  <h2> Add questions </h2>

  <div class="questionsList" id="questionsList"> </div>
  
  <!-- QUESTION FORM -->
  <form class="questionForm whiteBoard" onsubmit="addQuestion()">
    <div class="mainFormField">
      <h3>Question</h3>
      <input id="question" type="text" required>
    </div>

    <div class="mainFormField">
      <h3>Category</h3>
      <select id="category" required>
        <option value="">--</option>
        <?php echo getSurveyCategories() ?>
      </select>
    </div>

    <div class="aCenter">
      <button>Add</button>
    </div>
  </form>

  <br>

  <h3>Survey URL</h3>
  <a class="link" href="<?php echo $surveyURL ?>" target="blank"><?php echo $surveyURL ?> </a>

  <br>

  <div class="aCenter">
    <a class="button" href="suggestionsandsurveys.php">Finish</a>
  </div>
</div>