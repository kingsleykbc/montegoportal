<?php
  require_once('../connect.php');
  require_once('../functions.php');
 
  header("Content-Type: application/xls");
  header("Content-Disposition: attachment; filename=assetsExport.xls");
  header("Pragma: no-cache");
  header("Expires: 0");

  $result = '<table border="1">';
  $result .= '<tr> 
    <th>S/N </th>
    <th>Serial No.</th>
    <th>MAC Address(s)</th>
    <th>Classification</th>
    <th>Name</th>
    <th>Model</th>
    <th>Staff</th>
    <th>Location</th>
    <th>Item State</th>
    <th>Price</th>
    <th>Comment</th>
    <th>Date Added</th>
    <th>Last Updated</th>
  </tr>';

  /**
   * Fetch all the available Cars
   **/
  $query = "SELECT * FROM assets";
  $response = @mysqli_query($dbc, $query);
  $counter = 1;

  if ($response) {    
    while ($row = mysqli_fetch_assoc($response)) {
      $serialNo = $row["serialNo"];
      $macAddress = $row["macAddress"];
      $class = $row["class"];
      $name = $row["name"];
      $model = $row["model"];
      $staff = getStaffNameFromID($row["staffID"]);
      $location = $row["location"];
      $state = $row["state"];
      $price = $row["price"];
      $comment = $row["comment"];
      $dateAdded = $row["dateAdded"];
      $lastUpdated = $row["lastUpdated"];

      $result .= "<tr>
        <td>$counter</td>
        <td>$serialNo</td>
        <td>$class</td>
        <td>$macAddress</td>
        <td>$name</td>
        <td>$model</td>
        <td>$staff</td>
        <td>$location</td>
        <td>$state</td>
        <td>$price</td>
        <td>$comment</td>
        <td>$dateAdded</td>
        <td>$lastUpdated</td>
      </tr>";

      $counter++;
    }
  }
  $result .= '</table>';

  echo $result;
?>