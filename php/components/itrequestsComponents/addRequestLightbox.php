<?php

$addRequestBox = "
  <div id='addRequest' class='lightbox'>
    <div id='box'>
      <div class='boxTitle'>Add Request</div>
      <form class='form' id='addRequestForm' onsubmit='postRequest()'>
        <div class='fields'>

          <!-- CATEGORY  -->
          <div class='formField'>
            <h3> Category </h3>
            <select name='category' id='category' required>
              <option value=''> -- </option>
              <option> System </option>
              <option> Email </option>
              <option> Network </option>
              <option> Printing </option>
              <option> Microsoft Office </option>
              <option> Other </option>
            </select>
          </div>

          <!-- URGENCY  -->
          <div class='formField'>
            <h3> Urgency </h3>
            <select name='urgency' id='urgency' required>
              <option value=''>-- </option>
              <option> Very urgent </option>
              <option> Urgent </option>
              <option> Normal </option>
              <option> Minor </option>
              <option> Very Minor </option>
            </select>
          </div>

          <!-- COMMENT -->
          <div class='formField'>
            <h3> Comment </h3>
            <textarea name='comment' id='comment' required></textarea>
          </div>
        </div>

        <div class='aCenter'> <button> Add </button> </div>
      </form>
    </div>
    <div class='back' onclick=\"toggleBox('addRequest')\"></div>
  </div>
";

