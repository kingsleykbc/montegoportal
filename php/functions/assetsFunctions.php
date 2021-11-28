<?php
require_once("../connect.php");
require_once("../icons.php");
require_once("../functions.php");

//
// GET THE RESULT
//
function getResult($dbc)
{
  $query = getQuery();
  $response = mysqli_query($dbc, $query);

  if (!$response) return "<h2>Error Finding Result: " . mysqli_error($dbc) . "</h2>";

  $result = "
    <thead>
      <td>#</td>
      <td>Serial No.</td>
      <td>MAC Address</td>
      <td>Classification</td>
      <td>Name</td>
      <td>Model</td>
      <td>Staff</td>
      <td>Location</td>
      <td>Item State</td>
      <td>Price</td>
      <td>Comment</td>
      <td>Date Added</td>
      <td>Last Updated</td>
      <td>Signed</td>
      <td>Update</td>
    </thead>
  ";
  $counter = 1;

  while ($row = mysqli_fetch_array($response)) {
    $editIcon = $GLOBALS["editIcon"];
    $id = $row["id"];
    $name = $row["name"];
    $staff = getStaffNameFromID($row["staffID"]);
    $staffID = $row["staffID"];
    $model = $row["model"];
    $class = $row["class"];
    $serialNo = $row["serialNo"];
    $dateAdded = $row["dateAdded"];
    $lastUpdated = $row["lastUpdated"];
    $macAddress = $row["macAddress"];
    $location = $row["location"];
    $state = $row["state"];
    $price = $row["price"];
    $comment = $row["comment"];
    $isSignedFor = $row["isSignedFor"];

    $editableData = "{
      id: $id,
      state: '$state',
      staffID: $staffID,
      location: '$location',
      comment: '$comment'
    }";

    $result .= "
      <tr>
        <td>$counter</td>
        <td>$serialNo</td>
        <td>$macAddress</td>
        <td>$class</td>
        <td>$name</td>
        <td>$model</td>
        <td>$staff</td>
        <td>$location</td>
        <td>$state</td>
        <td>$price</td>
        <td>$comment</td>
        <td>$dateAdded</td>
        <td>$lastUpdated</td>
        <td>$isSignedFor</td>
        <td>
          <div class='class'>
            <span class='editCV' onclick=\"editAsset($editableData)\">$editIcon</span>
          </div>
        </td>
      </tr>
    ";

    $counter++;
  }

  return $result;
}

//
// GET THE REQUEST QUERY
//
function getQuery()
{
  $selectClause = "SELECT * FROM assets";
  $whereClause = getWhereClause();

  return "$selectClause $whereClause";
}

//
//  GET WHERE CLAUSE
//
function getWhereClause()
{
  $whereClause = "";
  $class = $_GET["class"];
  $state = $_GET["state"];
  $search = $_GET["search"];
  $location = $_GET["location"];


  if ($class) $whereClause .= "class = '$class' AND ";
  if ($state) $whereClause .= "state = '$state' AND ";
  if ($location) $whereClause .= "location = '$location' AND ";
  if ($search) $whereClause .= "( 
      LOWER(name) LIKE LOWER('%$search%') OR
      LOWER(model) LIKE LOWER('%$search%') OR
      LOWER(class) LIKE LOWER('%$search%') OR
      LOWER(serialNo) LIKE LOWER('%$search%')
    ) AND ";

  if ($whereClause) {
    $whereClause = substr_replace($whereClause, "", -4);
    $whereClause = "WHERE $whereClause";
  }
  return $whereClause;
}

//
//  UPDATE ASSET
//
function updateAsset()
{
  $dbc = $GLOBALS["dbc"];
  $id = $_POST["id"];
  $state = $_POST["state"];
  $location = $_POST["location"];
  $comment = $_POST["comment"];
  $staffID = $_POST["staffID"];
   

  $query = "UPDATE `assets` SET `staffID` = '$staffID', `state` = '$state', `location` = '$location', `comment` = '$comment' WHERE `id` = $id; ";
  $response = mysqli_query($dbc, $query);

  if (!$response) return "Unable to update status :" . mysqli_error($dbc);
  return "Status successfully Updated!!";
}

//
//  ADD ASSET
//
function addAsset(){
  $dbc = $GLOBALS["dbc"];
  $name = $_POST["name"];
  $model = (isset($_POST["model"])) ? $_POST["model"] : NULL;
  $class = $_POST["class"];
  $serialNo = $_POST["serialNo"];
  $macAddress = $_POST["macAddress"];
  $staffID = (isset($_POST["staffID"])) ? $_POST["staffID"] : NULL;
  $state = $_POST["state"];
  $price = (isset($_POST["price"])) ? $_POST["price"] : NULL;
  $location = $_POST["location"];
  $comment = $_POST["comment"];

  $query = "INSERT INTO assets ( name, model, class, serialNo, staffID, state, price, location, macAddress, comment ) 
    VALUES ( '$name', '$model', '$class', '$serialNo', $staffID, '$state', '$price', '$location', '$macAddress', '$comment' )
  ";

  $response = mysqli_query($dbc, $query);
  
  if (!$response) echo mysqli_error($dbc); 
  else echo "$name successfully posted";
}
?>