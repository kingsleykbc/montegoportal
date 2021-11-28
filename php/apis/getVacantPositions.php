<?php
require('../connect.php');

  //
  // GET THE RESULT
  // 
  $query = "SELECT val FROM config WHERE field = 'vacant_positions'";
  $response = mysqli_query($dbc, $query);

  if (!$response){
    echo "Couldn't find config";
    http_response_code(404);
  }
  
  while ($row = mysqli_fetch_array($response)) echo $row["val"];
?>