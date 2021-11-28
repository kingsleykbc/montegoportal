<?php
  require('../connect.php');

  $val = mysqli_real_escape_string($dbc, $_POST["val"]);
  
  $query = "UPDATE config SET val = '$val' WHERE field = 'vacant_positions'";
  $response = mysqli_query($dbc, $query);

  if (!$response) echo "Unable to update".mysqli_error($dbc);
  else echo "Positions successfully Updated!!";
?>