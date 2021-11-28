<?php
  require_once("../connect.php");
  require_once("../icons.php");
  require_once("../functions.php");


  $dbc = $GLOBALS["dbc"];
  $staffID = getLoggedInUserID();
  $query = "SELECT * FROM assets WHERE staffID='$staffID'";
  $response = mysqli_query($dbc, $query);

  if (!$response) echo "Users not Found";

  $result = "";
  while ($row = mysqli_fetch_array($response)) {

    $id = $row["id"];
    $name = $row["name"];
    $model = $row["model"];
    $serialNo = $row["serialNo"];
    $isSignedFor = $row["isSignedFor"];
    $dateAssigned = $row["lastUpdated"];

    $isSignedForWidget = ($isSignedFor == "no") ?
      "<div class='signFor'>
        <p>You haven't signed for this asset</p>
        <div class='button' onclick='signForItem($id)'>Sign</div>
      </div>"
    : "";

    $result .= "
      <div class='myAsset whiteBoard'>
        <h3>$name</h3>
        <div class='assetStats'>
          <div class='assetModel'>$model</div>
          <div class='assetDate'>$dateAssigned</div>
        </div>
        $isSignedForWidget
      </div>
    ";
  }

  echo $result;
