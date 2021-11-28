<?php
require_once("../connect.php");
require_once("../icons.php");
require_once("../functions.php");


$dbc = $GLOBALS["dbc"];
$staffID = getLoggedInUserID();
$query = "SELECT * FROM hsecards WHERE staffID='$staffID'";
$response = mysqli_query($dbc, $query);

if (!$response) echo "Users not Found";

$counter = 1;
$result = "";
while ($row = mysqli_fetch_array($response)) {

  $datePosted = date('M j Y g:i A', strtotime($row["datePosted"]));
  $staffName = $row["staffName"];
  $details = $row["details"];
  $actionsTaken = $row["actionsTaken"];
  $suggestedImprovementActions = $row["suggestedImprovementActions"];
  $locationOfOccurence = $row["locationOfOccurence"];
  $areaOnSite = $row["areaOnSite"];
  $mostLikelyCause = $row["mostLikelyCause"];
  $improvementCategory = $row["improvementCategory"];
  $recommendedActions = $row["recommendedActions"];
  $severity = $row["severity"];
  $comment = $row["comment"];
  $id = $row["id"];


  $result .= "
    <tr>
      <td>$counter</td>
      <td>$datePosted</td>
      ".
      //<td>$staffName</td>
      " <td>$details</td>
      <td>$actionsTaken</td>
      <td>$suggestedImprovementActions</td>
      <td>$locationOfOccurence</td>
      <td>$areaOnSite</td>
      <td>$mostLikelyCause</td>
      <td>$improvementCategory</td>
      <td>$recommendedActions</td>
      <td>$severity</td>
      <td>$comment</td>
      <td><button onclick='toggleAreYouSureBox(\"deleteImprovementCard($id)\", \"You are about to remove this HSE card\")'>Delete</button></td>
    </tr>
  ";

  $counter++;
}

echo $result;
