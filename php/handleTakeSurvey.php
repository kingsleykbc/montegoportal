<?php
require_once("connect.php");
require_once("config.php");
require_once("functions/takeSurveyFunctions.php");

/**
 * GET SURVEY TITLE AND DESCRIPTION
 */
$title = "";
$description = "";
$surveyID = $_GET["surveyid"];
$query = "SELECT title, description FROM surveys WHERE id='$surveyID'";
$res = mysqli_query($dbc, $query);

while ($row = mysqli_fetch_array($res)) {
  $title = $row["title"];
  $description = $row["description"];
}

$questions = getSurveyQuestions();
$staffNames = getStaffNamesAsOptions();

