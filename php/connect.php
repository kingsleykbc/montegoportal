<?php
  $dbc = @mysqli_connect("localhost:3306", "root", "", "montegoportal","3306") or die(mysqli_connect_error() . ' Cannot connect to Database ');
  $GLOBALS["dbc"] = $dbc;
  
  if (session_status() == PHP_SESSION_NONE) session_start();

  date_default_timezone_set("Africa/Lagos");
?> 