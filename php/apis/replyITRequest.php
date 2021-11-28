<?php
require_once('../connect.php');
require_once('../functions.php');

$dbc = $GLOBALS["dbc"];
$requestID = $_POST["requestID"];
$itStaffID = getLoggedInUserID();
$response = htmlspecialchars($_POST["response"], ENT_QUOTES, 'UTF-8');

$query = "UPDATE `itrequests` SET `response` = '$response', status = 'Received', `itStaffID` = '$itStaffID' WHERE `id` = $requestID";
$response = mysqli_query($dbc, $query);

if (!$response) echo "Unable to reply :" . mysqli_error($dbc);
echo "Reply sent";
