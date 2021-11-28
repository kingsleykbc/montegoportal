<?php
require_once("./php/icons.php");

function successMessage($title = "Success", $message = "Message", $bottomDom = "")
{

?>

  <div id="successMessage" class="successMessage sectionContent">
    <div class="icon"><?php echo $GLOBALS["verifiedIcon"] ?></div>

    <h3><?php echo $title ?></h3>
    <p><?php echo $message ?></p>

    <?php echo $bottomDom ?>
  </div>

<?php
}
?>