<?php
  require_once("icons.php");
  
  //
  // GET THE RESULT
  // 
  function getResult($dbc){
    $query = getQuery();
    $response = mysqli_query($dbc, $query);

    if(!$response) return "<h2>Error Finding Result: ".mysqli_error($dbc)."</h2>";
    
    $showFilters = $_GET["showFilters"]; 
    $result = getColumnHeads();
    $counter = 1;

    while($row = mysqli_fetch_array($response)){
      $cvStatus = $row["cvStatus"];
      $editIcon = $GLOBALS["editIcon"];
      $deleteIcon = $GLOBALS["deleteIcon"];
      $fileIcon = $GLOBALS["fileIcon"];
      $staffID = $row["id"];
      $cv = $row["cv"];
      $result .= "<tr><td>$counter</td>";

      foreach ($showFilters as $e) $result .= "<td>" . $row[$e] . "</td>";
      $result .= "
        <td>
          <div class='cvStatus'>
            <span>$cvStatus</span>
            <span class='editCV' onclick=\" editCVStatus($staffID, '$cvStatus')\">$editIcon</span>
          </div>
        </td>
        <td>
          <span class='editCV' onclick='toggleAreYouSureBox(\"deleteRecord($staffID)\", \"You are about to delete this record\")'>$deleteIcon</span>
        </td>
        <td>
          <a class='cvDownloadbutton button' href='uploads/$cv' target='_blank'>
            <span>Download CV</span>
            <span>$fileIcon</span>
          </a>
        </td>
      ";
      $result .= "</tr>";
      $counter++;
    } 
    return $result;
  }

  //
  // GET THE REQUEST QUERY
  //
  function getQuery(){
    $showFilters = $_GET["showFilters"];    
    $selectClause = "SELECT ".implode(", ", $showFilters). ", cvStatus, cv FROM pendingstaff";
    $whereClause = getWhereClause();

    return "$selectClause $whereClause";
  }

  //
  //  GET WHERE CLAUSE
  //
  function getWhereClause(){
    $whereClause = "";
    $cvStatus = $_GET["cvStatus"];
    $educationLevel = $_GET["educationLevel"];
    $fieldOfInterest = $_GET["fieldOfInterest"];
    $expYears = $_GET["expYears"];
    $search = $_GET["search"];

    if ($cvStatus) $whereClause .= "cvStatus = '$cvStatus' AND ";
    if ($educationLevel) $whereClause .= "educationLevel = '$educationLevel' AND ";
    if ($fieldOfInterest) $whereClause .= "fieldOfInterest = '$fieldOfInterest' AND ";
    if ($expYears) $whereClause .= "expYears ='$expYears' AND ";
    if ($search) $whereClause .= "( 
      LOWER(firstname) LIKE LOWER('%$search%') OR
      LOWER(middlename) LIKE LOWER('%$search%') OR
      LOWER(lastname) LIKE LOWER('%$search%') OR
      LOWER(CONCAT_WS(' ',firstname,middlename,lastname)) LIKE LOWER('%$search%')
    ) AND ";

    if ($whereClause) {
      $whereClause = substr_replace($whereClause, "", -4);
      $whereClause = "WHERE $whereClause";
    }
    return $whereClause;
  }

  //
  //  GET TABLE HEADERS FOR THE COLUMNS
  //
  function getColumnHeads(){
    $showFilters = $_GET["showFilters"]; 
    $result = "<thead><td>#</td>";

    foreach ($showFilters as $e) {
      $result .= "<td>$e</td>";
    }
    $result .="<td> Edit CV Status</td>";
    $result .= "<td> Delete </td>";
    $result .="<td> Download CV </td>";
    $result .="</thead>";

    return $result;
  } 

  //
  //  UPDATE CV STATUS
  // 
  function updateCVStatus($dbc){
    $newStatus = $_POST["cvStatus"]; 
    $staffID = $_POST["staffID"];

    $query = "UPDATE pendingstaff SET cvStatus = '$newStatus' WHERE id = '$staffID'";
    $response = mysqli_query($dbc, $query);

    if(!$response) return "Unable to update status $newStatus $staffID :".mysqli_error($dbc);
    return "Status successfully Updated!!";
  }

  //
  //  DELETE CV RECORD
  //
  function deleteCVRecord(){
    $dbc = $GLOBALS["dbc"];
    $id = $_GET["id"];

    $query = "DELETE FROM `pendingstaff` WHERE `id` = $id";

    /**
     * TODO: Delete the file here
     */
    
    $response = mysqli_query($dbc, $query);

    if (!$response) return "Unable to delete record :" . mysqli_error($dbc);
    return "Record deleted";
  }
?>
