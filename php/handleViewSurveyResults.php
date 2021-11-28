<?php
require_once("functions.php");
require_once("config.php");

$surveyTitle = "";
$description = "";
$datePosted = "";
$surveyURL = "";
$answers = "";
$surveyID = $_GET["surveyid"];
$surveyedStaff = $_GET["surveyedStaff"];

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
  SELECT id, AVG(value) AS avgValue, surveyedStaff, surveyingStaffEmail
  FROM answers
  WHERE surveyID='$surveyID' AND surveyedStaff='$surveyedStaff'
  GROUP BY surveyingStaffEmail
";
$res = mysqli_query($dbc, $query);

if (!$res){
  echo mysqli_error($dbc);
}
else {
  /**
   * GET ALL THE STAFF AND THEIR AVERAGE RARINGS 
   */
  while ($row = mysqli_fetch_array($res)) {  
    $id = $row["id"];
    $surveyingStaffEmail = $row["surveyingStaffEmail"];
    $surveyedStaff = $row["surveyedStaff"];
    $avgValue = getPercentage($row["avgValue"], 5);
    $answersResult = getAnswerResult($surveyID, $surveyingStaffEmail, $surveyedStaff);

    $answers .= "
      <div class='answer'>
        <div class='staffAndPercentage'>
          <div class='staff'>$surveyingStaffEmail</div>
          <div class='percentage'>$avgValue</div>
        </div>
        <div class='categoryBreakdown'> $answersResult </div>
      </div>
    ";
  }
}


/**
 * GET ALL THE THE CATEGORIES OF THIS STAFF'S RATING AND THEIR AVERAGE RATINGS
 */
function getAnswerResult($surveyID, $surveyingStaffEmail, $surveyedStaff){
  $dbc = $GLOBALS["dbc"];
  $categories = "";
  $printedCategories = [];

  $query = "
    SELECT id, questionID, category, AVG(value) AS avgValue
    FROM answers
    WHERE surveyID='$surveyID' AND surveyingStaffEmail='$surveyingStaffEmail' AND surveyedStaff='$surveyedStaff'
    GROUP BY questionID
    ORDER BY category
  ";

  $res = mysqli_query($dbc, $query);

  if (!$res) return "Error getting result" . mysqli_error($dbc);

  while ($row = mysqli_fetch_array($res)) {
    $category = $row["category"];
    $question = getQuestionFromID($row["questionID"]);
    $avgValue = getPercentage($row["avgValue"], 5);

    // New category
    if (!in_array($category, $printedCategories)) {
      array_push($printedCategories, $category);
      $categories .= "<div class='categoryHead'>$category</div>";
    }

    $categories .= "
      <div class='category'>
        <div class='categoryAndPercentage'>
          <div class='categoryName'>$question</div>
          <div class='percentage'>$avgValue</div>
        </div>
      </div>
    ";
  }
  return $categories;
}
