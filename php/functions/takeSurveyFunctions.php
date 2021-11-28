<?php

function getStaffNamesAsOptions() {
  $staffs = "";

  // GET ALL THE STAFFS FROM THE DB LATER

  foreach($GLOBALS["allStaff"] as $staff)  $staffs .= "<option>$staff</option>";

  return $staffs;
}

/**
 * GET THE SURVEY QUESTIONS 
 */
function getSurveyQuestions() {
  $surveyID = $_GET["surveyid"];
  $dbc = $GLOBALS["dbc"];
  $query = "SELECT * FROM questions WHERE surveyID='$surveyID' ORDER BY category";
  $res = mysqli_query($dbc, $query);
  $printedCategories = [];
  $questions = "";

  while ($row = mysqli_fetch_array($res)) {
    $id = $row['id'];
    $question = $row["question"];
    $category = $row["category"];

    // New category
    if (!in_array($category, $printedCategories)) {
      array_push($printedCategories, $category);
      $questions .= "<div class='categoryHead highlightedText'>$category</div>";
    }

    $questions .= "
    <div class='question'>
      <div class='questionContent'>$question</div>
      <div class='ratingSection'>
        <label>
          <input required class='answerInput' name='$id' id='$category' type='radio' value='5'/> 
          Excellent
        </label>

        <label>
          <input required class='answerInput' name='$id' id='$category' type='radio' value='4'/> 
          Good
        </label>

        <label>
          <input required class='answerInput' name='$id' id='$category' type='radio' value='3'/> 
          Fair
        </label>

        <label>
          <input required class='answerInput' name='$id' id='$category' type='radio' value='2'/> 
          Poor
        </label>

        <label>  
          <input required class='answerInput' name='$id' id='$category' type='radio' value='1'/> 
          Very Poor
        </label>
      </div>
    </div>
  ";
  }

  
  return $questions;
}