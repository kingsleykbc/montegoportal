getMyITRequests();

/**
 * TOGGLE SHOE RESSOLVED REQUESTS
 */
$("#ressolvedToggle").change(function(e){
  $(".Ressolved").toggle();
});

/**
 * GET THE SUGGESTIONS
 */
function getMyITRequests() {

  $.ajax({
    url: "./php/apis/getMyITRequests.php",
    method: "get",
    success: (res) => { $("#myRequests").html(res); },
    error: (err) => {
      alert("Error finding result");
      console.log(err);
    }
  });
}

/**
 * POST A SUGGESTION
 */
function postRequest() {
  let data = formDataToJSON('#addRequestForm');

  // Send the request
  $.ajax({
    url: "./php/apis/addITRequest.php",
    method: "post",
    data,
    success: (res) => {
      $("#statusRibbon").html(`<div>${res}</div>`);
      getMyITRequests();
      toggleBox("addRequest");
    },
    error: (err) => {
      alert("Error finding result");
      console.log(err);
    }
  });
}

/**
 * DELETE IT REQUEST
 */
function deleteRequest(id) {
  toggleBox("areYouSureBox");

  // Send the request
  $.ajax({
    url: "./php/apis/deleteITRequest.php",
    method: "get",
    data: { id },
    success: (res) => {
      $("#statusRibbon").html(`<div>${res}</div>`);
      getMyITRequests();
    },
    error: (err) => {
      alert(err);
      console.log(err);
    }
  });
}

/**
 * OPEN RESSOLVE LIGHTBOX AND INITIALIZE THE ID
 */
function showMarkAssRessolved(requestID) {
  $("#requestID").val(requestID)
  toggleBox("ressolveBox");
}

/**
 * MARK AS RESSOLVED
 */
function markAsRessolved() {
  let data = formDataToJSON('#ressolveBoxForm');
  data.id = $("#requestID").val();
  toggleBox("ressolveBox");
  
  // Send the request
  $.ajax({
    url: "./php/apis/markITIssueAsRessolved.php",
    method: "post",
    data: data,
    success: (res) => {
      $("#statusRibbon").html(`<div>${res}</div>`);
      getMyITRequests();
    },
    error: (err) => {
      alert(err);
      console.log(err);
    }
  });
}