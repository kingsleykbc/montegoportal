<?php
require('../connect.php');
require_once("../functions.php");

$staffID = getLoggedInUserID();
$staffName = getStaffNameFromID($staffID);
$details = htmlspecialchars($_POST["details"], ENT_QUOTES, 'UTF-8');
$actionsTaken = htmlspecialchars($_POST["actionsTaken"], ENT_QUOTES, 'UTF-8');
$suggestedImprovementActions = htmlspecialchars($_POST["suggestedImprovementActions"], ENT_QUOTES, 'UTF-8');
$locationOfOccurence = htmlspecialchars($_POST["locationOfOccurence"], ENT_QUOTES, 'UTF-8');
$areaOnSite = htmlspecialchars($_POST["areaOnSite"], ENT_QUOTES, 'UTF-8');
$mostLikelyCause = $_POST["mostLikelyCause"];


// Add user
$query = "
  INSERT INTO hsecards (staffID, staffName, details, actionsTaken, suggestedImprovementActions, locationOfOccurence, areaOnSite, mostLikelyCause) 
  VALUES ('$staffID', '$staffName', '$details', '$actionsTaken', '$suggestedImprovementActions', '$locationOfOccurence', '$areaOnSite', '$mostLikelyCause')
";
$response = mysqli_query($dbc, $query);

if ($response) echo "$fullname successfully added.";
else echo "Error adding user: " . mysqli_error($dbc);
