<?php
require_once('../connect.php'); 
require_once('../functions.php');

/**
 * GET THE SUGGESTIONS AMD MAP TO WIDGETS
 */
function getSuggestions(){
  $dbc = $GLOBALS["dbc"];
  $staffID = getLoggedInUserID();
  $query = "SELECT * FROM suggestions WHERE staffID = '$staffID'";
  $res = mysqli_query($dbc, $query);

  if (!$res || mysqli_num_rows($res) == 0) return "<div class='noData'>No Suggestions</div>";
  
  $result = '';

  while($row = mysqli_fetch_array($res)){
    $comment = $row["comment"];
    $category = $row["category"];
    $title = $row["title"];
    $response = $row["response"];
    $responseStaff = getStaffNameFromID($row["respondingStaffID"]);
    $datePosted = $row["datePosted"];

    $responseMessage = (!$response) ? "" : "
      <div class='response'>
        <h4>$responseStaff:</h4>
        <p>$response</p>
      </div>
    "; 

    $result .= "
      <div class='mySuggestion'>
        <div class='top'>
          <div class='title'>$title</div>
          <div class='date'>$datePosted</div>
        </div>
        <div class='category'> $category </div>
        <p class='content'>$comment</p>
        $responseMessage
      </div>
    ";
  }

  return $result;
}

function addSuggestion(){
  $dbc = $GLOBALS["dbc"];
  $title = $_POST["title"];
  $category = $_POST["category"];
  $comment = htmlspecialchars($_POST["comment"], ENT_QUOTES, 'UTF-8');
  $staffID = getLoggedInUserID();

  $query = "INSERT INTO suggestions ( title, category, comment, staffID) VALUES ( '$title', '$category', '$comment', '$staffID')";
  $response = mysqli_query($dbc, $query);

  if (!$response) return mysqli_error($dbc);
  return "Thanks for your suggestion";
}


?>