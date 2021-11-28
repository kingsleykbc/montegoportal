<?php
$ressolveBox = "
  <div id='ressolveBox' class='lightbox'>
    <div id='box'>
      <div class='boxTitle'> Mark as Ressolved </div>
      <form id='ressolveBoxForm' onsubmit='markAsRessolved()'>
        <input class='dontShow' type='text' id='requestID'/>        
        <div class='fields'> 
          <div class='formField'>
            <h3>Review (optional)</h3>
            <textarea name='review' id='review' placeholder='Brief feedback on the resolution.'></textarea>
          </div>
          <div class='formField'>
            <h3>Rating</h3>
            <select name='rating' id='rating' required>
              <option value=''>--</option>
              <option>Very good</option>
              <option>Good</option>
              <option>Fair</option>
              <option>Poor</option>
              <option>Very Poor</option>
            <select>
          </div>
        </div>
        <div class='aCenter'>
          <button> Mark as ressolved </button>
        </div>
      </form>
    </div>
    <div class='back' onclick=\"toggleBox('ressolveBox')\"></div>
  </div>
";
?>

