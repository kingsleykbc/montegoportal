<?php
  require('../connect.php');

  $id = $_GET["id"];

  $query = "DELETE FROM `staff` WHERE `id` = $id";
  $response = mysqli_query($dbc, $query);

  if (!$response) echo "Unable to delete record :" . mysqli_error($dbc);
  echo "Staff deleted";
?>