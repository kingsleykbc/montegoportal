<?php

require_once("../connect.php");
require_once("../icons.php");
require_once("../functions.php");

$dbc = $GLOBALS["dbc"];
$surveyID = $_POST["surveyID"];
$surveyedStaff = $_POST["surveyedStaff"];
$surveyingStaffEmail  = $_POST["surveyingStaffEmail"];
$answers = $_POST["answers"];

/**
 * GET THE SURVEY SESSION ID
 */
$query = "SELECT id FROM ANSWERS";
$response = mysqli_query($dbc, $query);
$surveySession = mysqli_num_rows($response);

/**
 * CHECK IF THIS SURVEY HAS ALREADY BEEN TAKEN
 */
$query =  "SELECT * FROM answers WHERE surveyID='$surveyID' AND surveyingStaffEmail='$surveyingStaffEmail' AND surveyedStaff='$surveyedStaff'"; 
$response = mysqli_query($dbc, $query);

if (mysqli_num_rows($response) > 0) {
  echo "This survey has already been taken by you!";
}
else {
  /**
   * LOOP THROUGH ALL THE ANSWERS AND ADD THEM
   */
  foreach ($answers as $questionID => $valAndCategory) {
    $valAndCategory = explode("|", $valAndCategory);
    $value = $valAndCategory[0];
    $category = $valAndCategory[1];

    $query = "
      INSERT INTO answers (value, category, surveyingStaffEmail, surveyedStaff, surveyID, questionID, surveySession) 
      VALUES ('$value', '$category', '$surveyingStaffEmail', '$surveyedStaff', '$surveyID', '$questionID', '$surveySession')
    ";
    $response = mysqli_query($dbc, $query);
    
    if (!$response) break;
  }

  if (!$response) echo mysqli_error($dbc);
  else echo "Survey successfully submitted";
}