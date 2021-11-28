<?php
  require('../connect.php');

  $surveyID = $_GET["surveyID"];

  // Delete Questions 
  $query = "DELETE FROM `questions` WHERE `surveyID` = '$surveyID'";
  $response = mysqli_query($dbc, $query);

  // Delete Responses 
  $query = "DELETE FROM `answers` WHERE `surveyID` = '$surveyID'";
  $response = mysqli_query($dbc, $query);

  // Delete the survey
  $query = "DELETE FROM `surveys` WHERE `id` = '$surveyID'";
  $response = mysqli_query($dbc, $query);

  if (!$response) echo "Unable to delete survey" . mysqli_error($dbc);
  echo "Survey deleted";
?>