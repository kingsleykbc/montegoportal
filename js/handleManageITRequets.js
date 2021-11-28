getActiveITRequests();


/**
 * GET THE SUGGESTIONS
 */
function getActiveITRequests() {

  $.ajax({
    url: "./php/apis/getActiveITRequests.php",
    method: "get",
    success: (res) => { $("#activeITRequests").html(res); },
    error: (err) => {
      alert("Error finding result");
      console.log(err);
    }
  });
}


/**
 * POST A SUGGESTION
 */
function replyITRequest(requestID) {
  const response = $(`#responseText${requestID}`).val();
  const data = { requestID, response: response || "Received" };

  // Send the request
  $.ajax({
    url: "./php/apis/replyITRequest.php",
    method: "post",
    data,
    success: (res) => {
      $("#statusRibbon").html(`<div>${res}</div>`);
      getActiveITRequests();
    },
    error: (err) => {
      alert("Error finding result");
      console.log(err);
    }
  });
}
