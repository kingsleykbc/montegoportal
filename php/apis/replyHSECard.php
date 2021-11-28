<?php
require('../connect.php');
require('../dashboardFunctions.php');


$id = $_POST["cardID"];
$improvementCategory = htmlspecialchars($_POST["improvementCategory"], ENT_QUOTES, 'UTF-8');
$recommendedActions = htmlspecialchars($_POST["recommendedActions"], ENT_QUOTES, 'UTF-8');
$severity = htmlspecialchars($_POST["severity"], ENT_QUOTES, 'UTF-8');
$comment = htmlspecialchars($_POST["comment"], ENT_QUOTES, 'UTF-8');


$query = "
UPDATE hsecards SET 
  improvementCategory = '$improvementCategory',
  recommendedActions = '$recommendedActions',
  severity = '$severity',
  comment = '$comment'
WHERE id = '$id'
";

$response = mysqli_query($dbc, $query);

if (!$response) echo "Unable to update HSE card :" . mysqli_error($dbc);

else echo "CARD successfully responded to!!";
