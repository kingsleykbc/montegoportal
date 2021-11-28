<?php

require('../connect.php');
require_once("../functions.php");

//
// GET THE RESULT
//
$query = getQuery();
$res = mysqli_query($dbc, $query);

if (!$res) echo "<h2>Error Finding Result: " . mysqli_error($dbc) . "</h2>";
else {
  $result = "
    <thead>
      <td>#</td>
      <td>Staff</td>
      <td>Time Added</td>
      <td>Category</td>
      <td>Comment</td>
      <td>Urgency</td>
      <td>Status</td>
      <td>Responing Staff</td>
      <td>Response</td>
      <td>Rating</td>
      <td>Review</td>
      <td>Time Ressolved</td>
    </thead>
    ";

  $counter = 1;
  
  while ($row = mysqli_fetch_array($res)) {
    $id = $row["id"];
    $staff = getStaffNameFromID($row["staffID"]);
    $timeAdded = date('M j Y g:i A', strtotime($row["datePosted"]));
    $category = $row["category"];
    $comment = $row["comment"];
    $urgency = $row["urgency"];
    $status = $row["status"];
    $respondingStaff = getStaffNameFromID($row["itStaffID"]);
    $response = $row["response"];
    $rating = $row["rating"];
    $review = $row["review"];
    $timeRessolved = date('M j Y g:i A', strtotime($row["dateRessolved"]));
  
  
    $result .= "
      <tr>
        <td>$counter</td>
        <td>$staff</td>
        <td>$timeAdded</td>
        <td>$category</td>
        <td>$comment</td>
        <td>$urgency</td>
        <td>$status</td>
        <td>$respondingStaff</td>
        <td>$response</td>
        <td>$rating</td>
        <td>$review</td>
        <td>$timeRessolved</td>
      </tr>
    ";

    $counter++;
  }
  
  echo $result;

}  

//
// GET THE REQUEST QUERY
//
function getQuery()
{
  $selectClause = "SELECT * FROM itrequests";
  $whereClause = getWhereClause();
  return "$selectClause $whereClause  ORDER BY datePosted ASC";
}

//
//  GET WHERE CLAUSE
//
function getWhereClause()
{
  $whereClause = "";
  $dateFrom = $_GET["dateFrom"];
  $dateTo = $_GET["dateTo"];

  if ($dateFrom) $whereClause .= "datePosted >= '$dateFrom' AND ";
  if ($dateTo) $whereClause .= "datePosted < '$dateTo'+ INTERVAL 1 DAY AND ";

  if ($whereClause) {
    $whereClause = substr_replace($whereClause, "", -4);
    $whereClause = "WHERE $whereClause";
  }
  return $whereClause;
}
