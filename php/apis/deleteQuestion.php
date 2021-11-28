<?php
  require('../connect.php');

  $questionID = $_GET["questionID"];

  $query = "DELETE FROM `questions` WHERE `id` = '$questionID'";
  $response = mysqli_query($dbc, $query);

  if (!$response) echo "Unable to delete question :" . mysqli_error($dbc);
  echo "Question Removed";
?>