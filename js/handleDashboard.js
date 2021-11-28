handleSearch();

/**
 * EDIT CV STATUS
 */
function editCVStatus(staffID, initialValue) {
  $("#cvStatusEdit").val(initialValue);
  $("#staffID").html(staffID);
  toggleBox('areYouSure');
}

/**
 * TOGGLE FILTERS
 */
function toggleFilters() {
  let lb = $("#filterContent");
  if (lb.css("display") == "none") {
    display = "block";
    text = "Hide Filters"
  }
  else {
    display = "none";
    text = "Show filters"
  }
  lb.css({ display });
  $("#filterButton b").html(text);
}


/**
 * UPDATE STATUS
 */
function updateCVStatus() {
  let cvStatus = $("#cvStatusEdit").val();
  let staffID = $("#staffID").html();

  // Send the request
  $.ajax({
    url: "./php/apis/updateCVStatus.php",
    method: "post",
    data: { cvStatus, staffID },
    success: (res) => {
      handleSearch();
      alert(res);
    },
    error: (err) => {
      alert(err);
      console.log(err);
    }
  });
  toggleBox('areYouSure');
}

$("form").submit(function (e) {
  e.preventDefault();
});



/**
 * GET SEARCH RESULT
 */
function handleSearch() {

  let data = getData();

  // Send the request
  $.ajax({
    url: "./php/apis/getSearchResult.php",
    method: "get",
    data,
    success: (res) => {
      $("#searchResult").html(res);
    },
    error: (err) => {
      alert("Error finding result");
      console.log(err);
    }
  });
}

/**
 * GET THE SHOW FILTERS
 */
function getData() {
  let data = {};
  data.cvStatus = $("#cvStatusFilter").val();
  data.educationLevel = $("#educationLevel").val();
  data.fieldOfInterest = $("#fieldOfInterest").val();
  data.expYears = $("#expYears").val();
  data.search = $("#search").val();
  data.showFilters = [
    'id', 'firstname', 'middlename', 'lastname', 'expYears', 'educationLevel', 'fieldOfInterest', 'position', 'course', 'phoneNumber', 'email'
  ];

  $(".showFilter:checked").each(function () {
    data.showFilters.push($(this).val());
  });
  return data;
}

/**
 * DELETE CV RECORD
 */
function deleteRecord(id) {
  toggleBox("areYouSureBox");

  // Send the request
  $.ajax({
    url: "./php/apis/deleteCVRecord.php",
    method: "get",
    data: { id },
    success: (res) => {
      handleSearch();
      alert(res);
    },
    error: (err) => {
      alert(err);
      console.log(err);
    }
  });
  alert(recordID)
}