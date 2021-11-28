<?php  

require_once('connect.php');
require_once('functions/cvFormFunctions.php');

/**
 * GET THE VACANT POSITIONS
 */
$vacancies = "";
$noVacancyDivClass;
$query = "SELECT val FROM config WHERE field = 'vacant_positions'";
$res = mysqli_query($dbc, $query);

while ($row = mysqli_fetch_array($res)) {
  if ($row["val"] == "") break;
  $vacancies = explode("|", $row["val"]);
  $vacancies = implode("</option> <option> ", $vacancies);
  $vacancies = "<option>$vacancies</option>";
}

if ($vacancies == "") $noVacancyDivClass = "show";

/**
 * HANDLE FORM SUBMISSION
 */
$response = false;
$postMessage = '';
if (isset($_POST["submit"])){
  $response = uploadStaffData($dbc);
  $postMessage = ($response) ? showSuccessMessage() : showErrorMessage($dbc);
}
