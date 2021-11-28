<?php
require_once('../connect.php');
require_once('../functions.php');

/**
 * GET THE SUGGESTIONS AMD MAP TO WIDGETS
 */
function getAllSuggestions()
{
  $dbc = $GLOBALS["dbc"];
  $staffID = getLoggedInUserID();
  $query = "SELECT * FROM suggestions";
  $res = mysqli_query($dbc, $query);

  if (!$res || mysqli_num_rows($res) == 0) {
    return "<div class='noData'>No Suggestions</div>";
  }
  $result = '';
  while ($row = mysqli_fetch_array($res)) {
    $id = $row["id"];
    $comment = $row["comment"];
    $category = $row["category"];
    $title = $row["title"];
    $response = $row["response"];
    $staff = getStaffNameFromID($row["staffID"]);
    $responseStaff = getStaffNameFromID($row["respondingStaffID"]);
    $datePosted = $row["datePosted"];
    $userID = getLoggedInUserID();

    // Show response / Post response 
    $responseMessage = ($response) ? "
      <div class='response'>
        <h4>$responseStaff:</h4>
        <p>$response</p>
      </div>
    "
    : " 
      <div class='postResponse'>
        <h3>Reply this suggestion</h3>
        <textarea placeholder='Enter reply here...' id='postResponse$id'></textarea>
        <div class='aRight'>
          <div class='button' onClick='replySuggestion($id,\"$userID\")'>Reply Suggestion</div>
        </div>
      </div>
    ";

    $posterDetails = $isHSE = ""; 
    if ($category == "Health and safety"){
      $posterDetails = "<div class='suggestionPoster'>H.S.E suggestion by $staff</div>";
      $isHSE = "isHSE";
    }
    
    $result .= "
      <div class='mySuggestion $isHSE'>
        $posterDetails
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

/**
 * REPLY SUGGESTIONS
 */
function replySuggestion (){
  $dbc = $GLOBALS["dbc"];
  $suggestionID = $_POST["suggestionID"];
  $respondingStaffID = $_POST["responderID"];
  $response = $_POST["response"];

  $query = "UPDATE `suggestions` SET `response` = '$response', `respondingStaffID` = '$respondingStaffID' WHERE `id` = $suggestionID; ";
  $response = mysqli_query($dbc, $query);

  if (!$response) return "Unable to reply :" . mysqli_error($dbc);
  return "Suggestion replied";
}
?>