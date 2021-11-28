<?php

require_once("../connect.php");
require_once("../icons.php");
require_once("../functions.php");

$dbc = $GLOBALS["dbc"];
$title = $_POST["title"];
$categories = htmlspecialchars($_POST["categories"], ENT_QUOTES, 'UTF-8');
$description = htmlspecialchars($_POST["description"], ENT_QUOTES, 'UTF-8');
$staffID = getLoggedInUserID();

$query = "INSERT INTO surveys (title, description, categories, staffID) VALUES ('$title', '$description', '$categories', '$staffID')";
$response = mysqli_query($dbc, $query);


if (!$response) echo mysqli_error($dbc);
echo $dbc->insert_id;
