<?php
  require('../connect.php');

  $fullname = htmlspecialchars($_POST["fullName"], ENT_QUOTES, 'UTF-8');
  $email = htmlspecialchars($_POST["email"], ENT_QUOTES, 'UTF-8'); 
  $dateOfBirth = htmlspecialchars($_POST["dateOfBirth"], ENT_QUOTES, 'UTF-8');
  $department = htmlspecialchars($_POST["department"], ENT_QUOTES, 'UTF-8');
  $password = $_POST["password"];
  $privileges = $_POST["privileges"];

  // Add user
  $query = "
    INSERT INTO staff (fullname, email, dateOfBirth, department, password, privileges) 
    VALUES ('$fullname', '$email', '$dateOfBirth', '$department', '$password', '$privileges')
  ";
  $response = mysqli_query($dbc, $query);

  if ($response) echo "$fullname successfully added.";
  else echo "Error adding user: ".mysqli_error($dbc);
?>