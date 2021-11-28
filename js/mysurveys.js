getMySurveys();

/**
 * GET MY SURVEYS
 */
function getMySurveys() {
  $.ajax({
    url: "./php/apis/getMySurveys.php",
    method: "get",
    success: (res) => { $("#mySurveys").html(res); },
    error: (err) => {
      alert("Error finding result");
      console.log(err);
    }
  });
}

/**
 * DELETE MY SURVEYS
 */
function deleteMySurvey(surveyID) {
  toggleBox("areYouSureBox");

  // Send the request
  $.ajax({
    url: "./php/apis/deleteMySurvey.php",
    method: "get",
    data: { surveyID },
    success: (res) => {
      $("#statusRibbon").html(`<div>${res}</div>`);
      getMySurveys();
    },
    error: (err) => {
      alert(err);
      console.log(err);
    }
  });
}
