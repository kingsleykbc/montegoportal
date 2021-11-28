<?php
require_once("functions.php");
require_once("config.php");
require_once("components/emptyMessage.php");

$surveyTitle = "";
$description = "";
$datePosted = "";
$surveyURL = "";
$answers = "";
$surveyID = $_GET["surveyid"];

/**
 * SURVEY DATA
 */
$query = "SELECT * FROM surveys WHERE id='$surveyID'";
$res = mysqli_query($dbc, $query);

while ($row = mysqli_fetch_array($res)) {
  $surveyTitle = $row["title"];
  $id = $row["id"];
  $description = $row["description"];
  $datePosted = $row["datePosted"];
  $surveyURL = "$domain/takesurvey.php?surveyid=$id";
}

/**
 * GET THE RESPONSE DATA 
 */
$query = "
  SELECT id, AVG(value) AS avgValue, surveyedStaff
  FROM answers
  WHERE surveyID='$surveyID'
  GROUP BY surveyedStaff
";
$res = mysqli_query($dbc, $query);

if (!$res){
  echo mysqli_error($dbc);
}
else {
  if (mysqli_num_rows($res) == 0) $answers = emptyMessage("No response yet", "Survey hasn't been taken by anyone yet");

  /**
   * GET ALL THE STAFF AND THEIR AVERAGE RARINGS 
   */
  while ($row = mysqli_fetch_array($res)) {  
    $id = $row["id"];
    $surveyedStaff = $row["surveyedStaff"];
    $avgValue = getPercentage($row["avgValue"], 5);
    $categoryBreakdown = getCategoryRatings($surveyID, $surveyedStaff);

    $answers .= "
      <div class='answer'>
        <div class='staffAndPercentage'>
          <div class='staff'>$surveyedStaff</div>
          <div class='percentage'>$avgValue</div>
        </div>
        <div class='categoryBreakdown'> $categoryBreakdown </div>
        <div class='option'>
          <a class='button' href='viewsurveyresults.php?surveyid=$surveyID&surveyedStaff=$surveyedStaff'>View all answers</a>
        </div>
      </div>
    ";
  }
}

/**
 * GET ALL THE THE CATEGORIES OF THIS STAFF'S RATING AND THEIR AVERAGE RATINGS
 */
function getCategoryRatings($surveyID, $surveyedStaff){

  $dbc = $GLOBALS["dbc"];
  $categories = "";

  $query = "
    SELECT id, category, AVG(value) AS avgValue
    FROM answers
    WHERE surveyID='$surveyID' AND surveyedStaff='$surveyedStaff'
    GROUP BY category
  ";

  $res = mysqli_query($dbc, $query);

  if (!$res) return mysqli_error($dbc);
 
  while ($row = mysqli_fetch_array($res)) {  
    $category = $row["category"];
    $avgValue = getPercentage($row["avgValue"], 5);
    $answersBreakdown = getQuestionsRating($surveyID, $surveyedStaff, $category);

    $categories .= "
      <div class='category'>
        <div class='categoryAndPercentage'>
          <div class='categoryName'>$category</div>
          <div class='percentage'>$avgValue</div>
        </div>
        <div class='answersBreakdown'>$answersBreakdown</div>
      </div>
    ";
  }
  return $categories;
}


/**
 * GET ALL THE THE CATEGORIES OF THIS STAFF'S RATING AND THEIR AVERAGE RATINGS
 */
function getQuestionsRating($surveyID, $surveyedStaff, $category){

  $dbc = $GLOBALS["dbc"];
  $questions = "";

  $query = "
    SELECT id, questionID, AVG(value) AS avgValue
    FROM answers
    WHERE surveyID='$surveyID' AND surveyedStaff='$surveyedStaff' AND category='$category' 
    GROUP BY questionID
  ";

  $res = mysqli_query($dbc, $query);

  if (!$res) return mysqli_error($dbc);

  while ($row = mysqli_fetch_array($res)) {
    $question = getQuestionFromID($row["questionID"]);
    $avgValue = getPercentage($row["avgValue"], 5);

    $questions .= "
      <div class='question'>
        <div class='questionAndPercentage'>
          <div class='questionName'>$question</div>
          <div class='percentage'>$avgValue</div>
        </div>
      </div>
    ";
  }
  return $questions;
}
