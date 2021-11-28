<?php
  require_once("../connect.php");
  require_once("../icons.php");


  $query = "SELECT * FROM staff";
  $dbc = $GLOBALS["dbc"];
  $editIcon = $GLOBALS["editIcon"];
  $deleteIcon = $GLOBALS["deleteIcon"];
  $response = mysqli_query($dbc, $query);

  if (!$response) return "Users not Found";

  $result = "";
  while ($row = mysqli_fetch_array($response)) {

    $fullname = $row["fullname"];
    $email = $row["email"];
    $department = $row["department"];
    $privileges = $row["privileges"];
    $dateOfBirth = $row["dateOfBirth"];
    $password = $row["password"];
    $userID = $row["id"];
    $privilegesWidget;

    if ($privileges) {
      $privilegesWidget = explode("|", $privileges);
      $privilegesWidget = implode("</span> <span> ", $privilegesWidget);
      $privilegesWidget = "<span>$privilegesWidget</span>";
    } 
    else $privilegesWidget = "<span class='none'> NONE </b>";

    $result .= "
        <li>
          <h2>$fullname</h2>

          <ul class='stats'>
            <li class='stat'>$email</li>
            <li class='department'>$department</li>
            <li class='privilegeSection'>
              <h3>Privileges: </h3>  
              <div class='pList'>$privilegesWidget</div>              
            </li>
          </ul>

          <div class='bottom'>
            <div class='button' onclick='editUser(\"$userID\", \"$fullname\", \"$email\", \"$password\", \"$dateOfBirth\", \"$department\",\"$privileges\")'>
              $editIcon <span>Edit</span> 
            </div>
            <div class='button red' onclick='toggleAreYouSureBox(\"deleteUser($userID)\", \"You are about to delete this record\")'>
              $deleteIcon <span>Delete</span> 
            </div>
          </div>
        </li>
      ";
  }
  echo $result;
?>