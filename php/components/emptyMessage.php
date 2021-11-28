<?php
require_once("./php/icons.php");

function emptyMessage($title = "No data", $message = "This list is empty", $bottomDom = "")
{
  return "

  <div id='successMessage' class='successMessage emptyMessage sectionContent'>
    <div class='icon'>". $GLOBALS['emptyIcon'] ."</div>

    <h3>". $title ."</h3>
    <p>". $message ."</p>

    ". $bottomDom ."
  </div>
";
}
?>