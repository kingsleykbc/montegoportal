<?php
require_once("../connect.php");
require_once("../icons.php");
require_once("../functions.php");

//
// GET THE IT REQUESTS
// 
$dbc = $GLOBALS["dbc"];
$staffID = getLoggedInUserID();
$query = "SELECT * FROM itrequests WHERE staffID = '$staffID'";
$res = mysqli_query($dbc, $query);

if (!$res) echo mysqli_error($dbc);
else {
  $data = "";
  while ($row = mysqli_fetch_array($res)) {
    $id = $row["id"];
    $comment = $row["comment"];
    $datePosted = date('M j Y g:i A', strtotime($row["datePosted"]));
    $dateRessolved = date('M j Y g:i A', strtotime($row["dateRessolved"]));
    $urgency = $row["urgency"];
    $response = $row["response"];
    $comment = $row["comment"];
    $status = $row["status"];
    $category = $row["category"];

    $responseWidget = "";
    $bottomOptionsWidget = "";
    
    if ($response) {
      $response = $row["response"];
      $responderName = getStaffNameFromID($row["itStaffID"]);
      $responseWidget = "
        <div class='response'>
          <b>$responderName: </b> $response
        </div>
      ";
    }

    if ($status != "Ressolved") {
      $bottomOptionsWidget = "
        <div class='requestBottom aCenter'>
          <div class='button' onClick='showMarkAssRessolved($id)'> Mark as Ressolved </div>
          <div class='button red' onclick='toggleAreYouSureBox(\"deleteRequest($id)\", \"You are about to remove this request\")'>
            Cancel Request 
          </div>
        </div>
      ";
    }
    else {
      $review = $row["review"];
      $rating = $row["rating"];

      $bottomOptionsWidget = "
        <div class='requestBottom'>
          <div class='response'>
            <b> Review </b>
            <p>$review - <b>$rating</b></p>
            <hr class='med'/>
            <p class='lightText smallText'>Ressolved $dateRessolved</p>
          </div>
        </div>
      ";
    }

    //
    //  UI
    //
    $data .= "
      <div class='myRequest $status'>
        <p class='complain'> $comment </p>
        <div class='complainStats'>
          <div class='flex responsive'>
            <div class='item'>$datePosted</div>
            <div class='item second'>$urgency</div>
            <div class='item second'>$category</div>
          </div>
          <div class='highlightedText'>$status</div>
        </div>
        $responseWidget
        $bottomOptionsWidget
      </div>
    ";
  }
  $data = !$data ? "<div class='noData paged'> No Requests </div>" : $data; 
}

echo $data;