const IT_DEVICES = [
  "Desktop PC",
  "Laptop PC",
  "Keyboard",
  "Mouse",
  "Printer",
  "Other ICT Device"
];

/**
 * HANDLE THE SEARCH
 */
handleSearch();


/**
 * UPDATE STATUS
 */
function updateAsset() {

  // Get the Data
  const data = {
    id: $("#idEdit").val(),
    state: $("#stateEdit").val(),
    location: $("#locationEdit").val(),
    comment: $("#commentEdit").val(),
    staffID: $("#staffIDEdit").val()
  }

  // Send the request
  $.ajax({
    url: "./php/apis/updateAsset.php",
    method: "post",
    data,
    success: (res) => {
      $("#statusRibbon").html(`<div>${res}</div>`);
      toggleBox("editAsset");
      handleSearch();
    },
    error: (err) => {
      alert(err);
      console.log(err);
    }
  });
}

/**
 * GET SEARCH RESULT
 */
function handleSearch() {
  let data = getData();

  // Send the request
  $.ajax({
    url: "./php/apis/getAssetSearchResult.php",
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
  data.state = $("#state").val();
  data.class = $("#class").val();
  data.location = $("#location").val();
  data.search = $("#search").val();
  return data;
}


/**
 * POST AN ASSET
 */
function addAsset() {
  let data = formDataToJSON('#addAssetForm');

  // Send the request
  $.ajax({
    url: "./php/apis/addAsset.php",
    method: "post",
    data,
    success: (res) => {
      $("#statusRibbon").html(`<div>${res}</div>`);
      handleSearch();
      toggleBox("addAsset");
    },
    error: (err) => {
      alert("Error finding result");
      console.log(err);
    }
  });
}

/**
 * EDIT AN ASSET
 */
function editAsset({id, state, location, comment, staffID}) {
  
  // Initialize the Location
  $("#idEdit").val(id);
  $("#stateEdit").val(state);
  $("#locationEdit").val(location);
  $("#commentEdit").val(comment);
  $("#staffIDEdit").val(staffID);

  // Toggle the Box
  toggleBox("editAsset");
}

/**
 * ON CHANGE ASSET CLASS
 */
$("#classField").on("change", function(){
  const display = (IT_DEVICES.indexOf(this.value) !== -1) ? "block" : "none";
  $("#macAddressField").css("display", display);
})

