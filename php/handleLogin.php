<?php
  require_once("connect.php");
  
  if (session_status() == PHP_SESSION_NONE) session_start();

  $_SESSION['email'] = ""; // Initialize Session    
  $errors = ""; // Initialize Error Message

  // if email is Set
  if (isset($_POST['email'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']); 

    // Search the DB for User with $name and $password
    $query = "
      SELECT * FROM staff 
      WHERE email='$email' 
      AND password='$password' 
      AND INSTR(`privileges`, 'ACCESS_SYSTEM') > 0
    ";
    $valid = mysqli_query($dbc, $query);

    // If User exists
    if ($valid) {
      if (mysqli_num_rows($valid) > 0) {
        $_SESSION['email'] = $email;
        header("Location: index.php");
      }
      else  $errors = "<div id='errors'> Invalid Credentials </div>";
    }
  }
?>