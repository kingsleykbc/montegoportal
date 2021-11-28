<?php

require_once("../connect.php");
require_once("../icons.php");
require_once("../functions.php");

$dbc = $GLOBALS["dbc"];
$question = htmlspecialchars($_POST["question"], ENT_QUOTES, 'UTF-8');
$category = htmlspecialchars($_POST["category"], ENT_QUOTES, 'UTF-8');
$surveyID = $_POST["surveyID"];

$query = "INSERT INTO questions (question, category, surveyID) VALUES ('$question', '$category', '$surveyID')";
$response = mysqli_query($dbc, $query);

if (!$response) echo mysqli_error($dbc);
echo "Question successfully added";

