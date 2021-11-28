<?php
  require('../connect.php');

  $assetID = $_GET["assetID"];
  
  $query = "UPDATE assets SET isSignedFor = 'yes' WHERE id = '$assetID'";
  $response = mysqli_query($dbc, $query);

  if (!$response) echo "Unable to update".mysqli_error($dbc);
  else echo "Asset successfully Signed!!";
?>