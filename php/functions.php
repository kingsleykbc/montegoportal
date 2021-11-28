<?php
  require_once("connect.php");
  
  //
  // GET LOGGED IN USER
  //
  function getLoggedInUser(){
    $dbc=$GLOBALS["dbc"];
    $email = $_SESSION["email"];
    $query = "SELECT fullname FROM staff WHERE email = '$email'";
    $res = mysqli_query($dbc, $query);

    if($res){
      while($row = mysqli_fetch_array($res)){
        return $row["fullname"];
      }
    }
  }

// 
// GET LOGGED IN USER ID
//
function getLoggedInUserID(){
  $dbc=$GLOBALS["dbc"];
  $email = $_SESSION["email"];
  $query = "SELECT id FROM staff WHERE email = '$email'";
  $res = mysqli_query($dbc, $query);

  if ($res) {
    while ($row = mysqli_fetch_array($res)) return $row["id"];
  }
}


//
//  GET STAFF NAME FROM ID
//
function getStaffNameFromID($id)
{
  $dbc = $GLOBALS["dbc"];
  $query = "SELECT fullname FROM staff WHERE id = '$id'";
  $res = mysqli_query($dbc, $query);

  if ($res) while ($row = mysqli_fetch_array($res))  return $row["fullname"];
}

//
//  GET STAFF LIST AS OPTION TAGS
//
function getStaffListAsOptionTags()
{
  $dbc = $GLOBALS["dbc"];
  $query = "SELECT id, fullname FROM staff";
  $res = mysqli_query($dbc, $query);

  if(!$res) return;

  $result = "";
  while ($row = mysqli_fetch_array($res)) {
    $name = $row["fullname"];
    $id = $row["id"];

    $result .= "<option value='$id'>$name</option>";
  }
  return $result;

}

/**
 * GET PERCENTAGE
 */
function getPercentage($val, $total) {
  return round(($val/$total) * 100) . "%";
}


/**
 * GET QUESTION FROM ID
 */
function getQuestionFromID($questionID){
  $dbc = $GLOBALS["dbc"];
  $query = "SELECT question FROM questions WHERE id='$questionID'";
  $res = mysqli_query($dbc, $query);

  while ($row = mysqli_fetch_array($res)) return $row["question"];
}

/**
 * SEND MAIL
 */
function sendMail($to, $subject, $message){
  ini_set('display-errors', 1);
  error_reporting(E_ALL);
  $from = "montegointranet@montego.com";
  $headers = "From:".$from;
  mail($to,$subject, $message, $headers);
}

/**
 * GET STAFF DATA FROM ID
 */
function getStaffDataFromID($staffID) {
  $dbc = $GLOBALS["dbc"];
  $query = "SELECT * FROM staff WHERE id = '$staffID'";
  $res = mysqli_query($dbc, $query);

  if ($res) while ($row = mysqli_fetch_array($res))  return $row;
}