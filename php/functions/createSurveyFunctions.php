<?php

function getSurveyCategories() {
  $surveyID = $_GET["surveyid"];
  $dbc = $GLOBALS["dbc"];
  $query = "SELECT * FROM surveys WHERE id='$surveyID'";
  $response = mysqli_query($dbc, $query);

  while ($row = mysqli_fetch_array($response)) {
    $categories = explode("|",$row["categories"]);
    $categories = implode("</option><option>", $categories);
    return "<option>$categories</option>";
  }
}