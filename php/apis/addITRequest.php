<?php

require_once("../connect.php");
require_once("../icons.php");
require_once("../functions.php");

$dbc = $GLOBALS["dbc"];
$category = $_POST["category"];
$urgency = $_POST["urgency"];
$comment = htmlspecialchars($_POST["comment"], ENT_QUOTES, 'UTF-8');
$staffID = getLoggedInUserID();

$query = "INSERT INTO itrequests (urgency, category, comment, staffID) VALUES ('$urgency', '$category', '$comment', '$staffID')";
$response = mysqli_query($dbc, $query);

if (!$response) echo mysqli_error($dbc);
echo "Thanks for your suggestion";
