<?php
$staffForm = "
  <div class='formField'>
    <h3>Full Name</h3>
    <input type='text' name='fullName' class='fullName'  id='fullName' required>
  </div>

  <div class='formField'>
    <h3>Email</h3>
    <input type='email' name='email' class='email' id='email' required>
  </div>

  <div class='formField'>
    <h3>Date of Birth</h3>
    <input type='date' name='dateOfBirth' class='dateOfBirth' id='dateOfBirth' required>
  </div>

  <div class='formField'>
    <h3>Password</h3>
    <input type='text' name='password' class='password' id='password' required>
  </div>

  <div class='formField'>
    <h3>Department</h3>
    <select class='department' name='department' id='department' required>
      <option value=''>--</option>
      <option> Corporate Services</option>
      <option> ICT </option>
      <option> BDU </option>
      <option> Internal Control </option>
      <option> Project and Technical Support</option>
      <option> Engineering </option>
      <option> Operations </option>
    </select>
  </div>

  <div class='formField'>
    <h3>Privileges</h3>
    <div class='privilegesList'>
      <label>
        <input type='checkbox' name='privileges' id='privileges' class='privileges' value='ACCESS_SYSTEM'>
        <span>ACCESS_SYSTEM</span>
      </label>

      <label>
        <input type='checkbox' name='privileges' id='privileges' class='privileges' value='MASTER_CONTROL'>
        <span>MASTER_CONTROL</span>
      </label>

      <label>
        <input type='checkbox' name='privileges' id='privileges' class='privileges' value='VIEW_USERS'>
        <span>VIEW_USERS</span>
      </label>

      <label>
        <input type='checkbox' name='privileges' id='privileges' class='privileges' value='MANAGE_USERS'>
        <span>MANAGE_USERS</span>
      </label>

      <label>
        <input type='checkbox' name='privileges' id='privileges' class='privileges' value='VIEW_CV_DATABASE'>
        <span>VIEW_CV_DATABASE</span>
      </label>

      <label>
        <input type='checkbox' name='privileges' id='privileges' class='privileges' value='EDIT_CV_DATABASE'>
        <span>EDIT_CV_DATABASE</span>
      </label>

      <label>
        <input type='checkbox' name='privileges' id='privileges' class='privileges' value='VIEW_ASSET_LIST'>
        <span>VIEW_ASSET_LIST</span>
      </label>

      <label>
        <input type='checkbox' name='privileges' id='privileges' class='privileges' value='EDIT_ASSET_LIST'>
        <span>EDIT_ASSET_LIST</span>
      </label>
    </div>
  </div>
";

//
// THE BOX
// 
$addUserBox = "
  <div id='addUserBox' class='lightbox'>
    <div id='box'>
      <div class='boxTitle' id='submitUserHeader'> Add New User </div>
      <form id='addUserForm' onsubmit='addnewUser()'>
        <input type='text' id='editUserID'/>
        <div class='fields'> $staffForm </div>
        <button id='submitUserButton'> Add User </button>
      </form>
    </div>
    <div class='back' onclick=\"toggleBox('addUserBox')\"></div>
  </div>
";
