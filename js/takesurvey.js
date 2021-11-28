toggleDisplay("#successMessage");

/**
 * SUBMIT A SURVEY 
 */
function submitSurvey() {  
  const data = {
    surveyedStaff: $("#surveyedStaff").val(),
    surveyingStaffEmail: $("#surveyingStaffEmail").val(),
    surveyID: getQueryStringVals().surveyid,
    answers: getAnswers()
  }

  // Send the request
  $.ajax({
    url: "./php/apis/addAnswer.php",
    method: "post",
    data,
    success: (res) => {
      $("#successMessage h3").html(res);
      toggleDisplay("#submitSurvey");
      toggleDisplay("#successMessage");
    },
    error: (err) => {
      alert("Error adding survey");
      console.log(err);
    }
  });
}

/**
 * GET ANSWERS
 */
function getAnswers() {
  const answers = {};
  
  $("#submitSurvey input[type=radio]:checked").each(function () {
    answers[$(this).attr("name")] = `${$(this).val()}|${$(this).attr("id")}`;
  });

  return answers;
}