<?php
require("../icons.php");

//
//  UPLOAD STAFF DATA
//
function uploadStaffData($dbc)
{
  $firstname = $_POST["firstname"];
  $middlename = $_POST["middlename"];
  $lastname = $_POST["lastname"];
  $gender = $_POST["gender"];
  $maritalStatus = isset($_POST["maritalStatus"]) ? $_POST["maritalStatus"] : NULL;
  $address = htmlspecialchars($_POST["address"], ENT_QUOTES, 'UTF-8');
  $state = $_POST["state"];
  $nationality = $_POST["nationality"];
  $expYears = $_POST["expYears"];
  $skills = htmlspecialchars($_POST["skills"], ENT_QUOTES, 'UTF-8');
  $educationLevel = htmlspecialchars($_POST["educationLevel"], ENT_QUOTES, 'UTF-8');
  $course = htmlspecialchars($_POST["course"], ENT_QUOTES, 'UTF-8');
  $fieldOfInterest = $_POST["fieldOfInterest"];
  $position = htmlspecialchars($_POST["position"], ENT_QUOTES, 'UTF-8');
  $phoneNumber = $_POST["phoneNumber"];
  $email = $_POST["email"];
  $dateOfBirth = $_POST["dateOfBirth"];
  $cv = uploadCV();

  $query = "INSERT INTO pendingstaff 
    (
      firstname, middlename, lastname, gender, maritalStatus, address, state, nationality, expYears, 
      skills, educationLevel, course, fieldOfInterest, position, phoneNumber, email, dateOfBirth, cv
    ) 
    VALUES 
    (
      '$firstname', '$middlename', '$lastname','$gender', '$maritalStatus', '$address', '$state', '$nationality', '$expYears', 
      '$skills', '$educationLevel', '$course', '$fieldOfInterest', '$position', '$phoneNumber', '$email', '$dateOfBirth', '$cv'
    )";
  $response = mysqli_query($dbc, $query); 

  if (!$response) return false;
  else return true;
}

//
//  GET FILE
//
function uploadCV()
{
  $firstname = $_POST["firstname"];
  $lastname = $_POST["lastname"];
  $file = $_FILES["cv"];
  $filename = time() . "-$firstname-$lastname";
  $tmpname = $file["tmp_name"];
  $dir = "D:/Apps/xamp/htdocs/cvdatabase/uploads";
  $filePath = $dir . "/" . $filename;
  move_uploaded_file($tmpname, $filePath);
  return $filename;
}

//
//  SHOW SUCCESS MESSAGE
//
function showSuccessMessage()
{
  $verifiedIcon = $GLOBALS["verifiedIcon"];

  return "
    <div class='lightbox successMessage' style='display:block'>
      <div id='box'> 
        $verifiedIcon
        <h2> Data Successfully Posted </h2>
      </div>
      <div class='back'></div>
    </div>
  ";
}

//
//  SHOW SUCCESS MESSAGE
//
function showErrorMessage($dbc)
{
  $errMessage = mysqli_error($dbc);

  return "
    <div class='lightbox successMessage' style='display:block'>
      <div id='box'> 
        $errMessage
        <h2> Unable to Post Data </h2>
      </div>
      <div class='back'></div>
    </div>
  ";
}
