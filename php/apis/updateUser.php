<?php
  require('../connect.php');

  $id = $_POST["id"];
  $fullname = $_POST["fullName"];
  $dateOfBirth = $_POST["dateOfBirth"];
  $department = $_POST["department"];
  $password = $_POST["password"];
  $privileges = $_POST["privileges"];

  $query = "UPDATE staff SET 
    fullname = '$fullname',
    dateOfBirth = '$dateOfBirth',
    department = '$department',
    password = '$password',
    privileges = '$privileges'  
  WHERE id = '$id'";

  $response = mysqli_query($dbc, $query);

  if (!$response) echo "Unable to update staff data :" . mysqli_error($dbc);
  echo "$fullname successfully Updated!!";
