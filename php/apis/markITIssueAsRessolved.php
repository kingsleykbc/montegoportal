<?php
  require('../connect.php');

  $id = $_POST["id"];
  $review = htmlspecialchars($_POST["review"], ENT_QUOTES, 'UTF-8');
  $rating = $_POST["rating"];
  $dateRessolved = date('Y-m-d H:i:s');

  $query = "UPDATE itrequests SET 
    review = '$review', 
    rating = '$rating',
    status = 'Ressolved',
    dateRessolved = '$dateRessolved'
  WHERE id = '$id'";

  $response = mysqli_query($dbc, $query);

  if (!$response) echo "Unable to update data :" . mysqli_error($dbc);
  echo "Request Updated";
