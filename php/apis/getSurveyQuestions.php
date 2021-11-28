<?php
require_once("../connect.php");
require_once("../icons.php");
require_once("../functions.php");


$dbc = $GLOBALS["dbc"];
$surveyID = $_GET["surveyID"];
$query = "SELECT * FROM questions WHERE surveyID='$surveyID'";
$response = mysqli_query($dbc, $query);

$result = "";
while ($row = mysqli_fetch_array($response)) {

  $id = $row["id"];
  $question = $row["question"];
  $category = $row["category"];
  $questionIcon = $GLOBALS['questionIcon'];

  $result .= "
      <div class='question whiteBoard'>
      <div class='icon'>$questionIcon</div>

      <div class='questionContent'>
        <p>$question</p>
        <div class='lightText'>$category</div>
      </div>
      <div class='deleteButton'>
        <div class='button red' onclick='deleteQuestion($id)'>Remove</div>
      </div>
    </div>
  ";
}

echo $result;
