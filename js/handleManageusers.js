getUsers();

/**
 * GET THE USERS
 */
function getUsers() {
  $.ajax({
    url: "./php/apis/getUsers.php",
    method: "get",
    success: (res) => { $("#usersList").html(res); },
    error: (err) => {
      alert("Error finding result");
      console.log(err);
    }
  });
}

function getFormData() {
  let data = formDataToJSON('#addUserForm');
  data.privileges = $("#privileges:checked").map(function () { return $(this).val(); }).get().join("|");
  return data;
}

/**
 * UPDATE USER
 */
function updateUser() {
  let data = getFormData();
  data.id = $("#editUserID").val();

  // Send the request
  $.ajax({
    url: "./php/apis/updateUser.php",
    method: "post",
    data,
    success: (res) => {
      $("#statusRibbon").html(`<div>${res}</div>`);
      getUsers();

      toggleBox("addUserBox");
      clearForm();
    },
    error: (err) => {
      alert("Error finding result");
      console.log(err);
    }
  });
}


/**
 * REMOVE DOM UPDATES
 */
function toggleDom(isUpdate) {
  if (isUpdate){
    $("#box h2").html("Edit User");
    $("#submitUserHeader").html("Update user");
    $("#submitUserButton").html("Update User");
    $("#addUserForm").attr("onSubmit", "updateUser()");
  }
  else {
    $("#box h2").html("Add new User");
    $("#submitUserHeader").html("Add user");
    $("#submitUserButton").html("Add User");
    $("#addUserForm").attr("onSubmit", "addnewUser()");
  }
}

/**
 * ADD NEW USER
 */
function addnewUser() {
  let data = getFormData();

  // Send the request
  $.ajax({
    url: "./php/apis/addUser.php",
    method: "post",
    data,
    success: (res) => {
      $("#statusRibbon").html(`<div>${res}</div>`);
      getUsers();
      toggleBox("addUserBox");
      clearForm();
    },
    error: (err) => {
      alert("Error finding result");
      console.log(err);
    }
  });
}


/**
 * DELETE CV RECORD
 */
function deleteUser(id) {
  toggleBox("areYouSureBox");

  // Send the request
  $.ajax({
    url: "./php/apis/deleteUser.php",
    method: "get",
    data: { id },
    success: (res) => {
      getUsers();
      alert(res);
    },
    error: (err) => {
      alert(err);
      console.log(err);
    }
  });
  alert(recordID)
}

/**
 * CLEAR THE USER INPUT FORM
 */
function clearForm() {
  $("#privileges").prop("checked", false);
  $("#fullName").val("");
  $("#email").val("");
  $("#password").val("");
  $("#dateOfBirth").val("");
  $("#department").val("");
}


/**
 * EDIT A USER
 */
function editUser(userID, fullname, email, password, dateOfBirth, department, privileges) {
  toggleBox("addUserBox");
  toggleDom(true);
  prefillFields(userID, fullname, email, password, dateOfBirth, department, privileges);

}

/**
 * PRE-FILL THE FIELDS
 */
function prefillFields(userID, fullname, email, password, dateOfBirth, department, privileges) {
  const day = new Date(dateOfBirth);
  const date = day.getFullYear() + '-' + ('0' + (day.getMonth() + 1)).slice(-2) + '-' + ('0' + day.getDate()).slice(-2);

  // Prefill the data 
  $("#editUserID").val(userID);
  $("#fullName").val(fullname);
  $("#email").val(email);
  $("#password").val(password);
  $("#dateOfBirth").val(date);
  $("#department").val(department);

  privileges = privileges.split("|");

  $("#privileges").each(
    function () {
      if (privileges.indexOf($(this).val()) != -1) $(this).prop("checked", true);
    }
  )
}

/**
 * ADD A USER
 */
function addUser() {
  toggleBox("addUserBox");
  toggleDom(false);
}