<?php
  header("Content-Type: application/xls");    
  header("Content-Disposition: attachment; filename=tripsExport.xls");  
  header("Pragma: no-cache"); 
  header("Expires: 0");

  echo $_POST["table"]; 
?> 