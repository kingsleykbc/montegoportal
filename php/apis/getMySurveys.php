<?php
require_once("../connect.php");
require_once("../icons.php");
require_once("../config.php");
require_once("../functions.php");


$dbc = $GLOBALS["dbc"];
$staffID = getLoggedInUserID();
$query = "SELECT * FROM surveys WHERE staffID='$staffID'";
$response = mysqli_query($dbc, $query);
$result = "";

while ($row = mysqli_fetch_array($response)) {
  $id = $row["id"];
  $title = $row["title"];
  $description = $row["description"];
  $surveyicon = $GLOBALS['surveyicon'];
  $noResponses = getNoResponses($id);
  $surveyURL = "$domain/takesurvey.php?surveyid=$id";

  $result .= "
    <div class='whiteBoard mysurvey'>
      <div class='info'>
        <div class='icon'>$surveyicon</div>

        <div class='surveyDetails'>
          <h3>$title</h3>
          <div class='lightText'>$description</div>
          <div class='highlightedText small'>$surveyURL</div>
        </div>
      </div>

      <div class='bottomSection'>
        <div class='noResponse'>
          <b>$noResponses</b>
          <span class='lightText'>responses</span>          
        </div>
        <div class='options'>
          <a class='button' href='mysurvey.php?surveyid=$id'>View</a>
          <a class='button' href='createsurvey.php?surveyid=$id'>Edit</a>
          <div class='button red' onclick='toggleAreYouSureBox(\"deleteMySurvey($id)\", \"You are about to premanently delete this survey\")'>
            Delete
          </div>
        </div>
      </div>
    </div>
  ";
}

if (mysqli_num_rows($response) == 0) echo "
  <div id='successMessage' class='successMessage emptyMessage sectionContent'>
    <div class='icon'>" . $GLOBALS['emptyIcon'] . "</div>
    <h3> No surveys </h3>
    <p>You haven't created any surveys</p>
  </div>
";

echo $result;

/**
 * GET THE NUMBER OF RESPONSES TO THIS SURVEY
 */
function getNoResponses($id) {
  $dbc = $GLOBALS["dbc"];
  $query = "SELECT DISTINCT surveySession FROM answers WHERE surveyID='$id'";
  $response = mysqli_query($dbc, $query);

  return mysqli_num_rows($response);
}
