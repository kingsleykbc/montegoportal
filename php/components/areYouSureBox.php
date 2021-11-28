<?php
  $areYouSureBox = "
    <div id='areYouSureBox' class='lightbox'>
      <div id='box'>
        <h2>Are you sure?</h2>
        <div id='areYouSureMessage'> This is my message</div>
        <div class='areYouSureOptions'> 
          <div id='yes' class='areYouSureOption'> <div> Yes </div> </div>
          <div id='no' class='areYouSureOption'>
            <div onclick=\"toggleBox('areYouSureBox')\">  No </div>
          </div>
        </div>
      </div>
      <div class='back' onclick=\"toggleBox('areYouSureBox')\"></div>
    </div>
  ";
?>