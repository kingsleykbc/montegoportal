<?php
require_once("../connect.php");
require_once("../icons.php");
require_once("../functions.php");

//
// GET THE IT REQUESTS
// 
$dbc = $GLOBALS["dbc"];
$staffID = getLoggedInUserID();
$query = "SELECT * FROM itrequests WHERE staffID = '$staffID' AND status <> 'Ressolved'";
$res = mysqli_query($dbc, $query);

if (!$res)  echo mysqli_error($dbc);

else {
  $data = "";
  
  while ($row = mysqli_fetch_array($res)) {
    $id = $row["id"];
    $comment = $row["comment"];
    $datePosted = date('M j Y g:i A', strtotime($row["datePosted"]));
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

    if ($status === "Pending") {
      $bottomOptionsWidget = "
        <div class='requestBottom responseForm'>
          <div class='formField'>
            <textarea 
              onkeypress=\"if(event.keyCode == 13) replyITRequest($id)\"
              placeholder='Response Message (optional)' class='form' id='responseText$id'></textarea>
          </div>
          <div class='aCenter'>
            <div class='button' onClick='replyITRequest($id)'> Respond </div>
          </div>
        </div>
      ";
    }

    //
    //  UI
    //
    $data .= "
      <div class='myRequest'>
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
