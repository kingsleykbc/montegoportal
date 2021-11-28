var counter = 0;
getSurveyQuestions();

/**
 * ADD FIELD
 */
function addCategoryField() {
  counter++;
  $("#categoriesFields").append(`
    <div class="categoryField mainFormField" id="categoryField_${counter}">
      <input placeholder="Category ${counter}" class="categoryFieldInput" required  />
      <div class="button red" onclick="removeField(categoryField_${counter})">Remove</div>
    </div>
  `);
}

/**
 * REMOVE FIELD 
 */
function removeField(id) {
  $(id).remove();
  counter--;
}

/**
 * GET VALUES FOR THE FORM
 */
function getValues() {
  let title = $("#title").val();
  let description = $("#description").val();
  let categories = $(".categoryFieldInput").map(function () { return $(this).val(); }).get().join("|");

  return { title, description, categories };
}

/**
 * HANDLE ADD SURVEY
 */
function addSurvey() {
  const data = getValues();

  // Validate
  if (!data.categories) {
    alert("Please add at least one category");
    return;
  }

  // Send the request
  $.ajax({
    url: "./php/apis/addSurvey.php",
    method: "post",
    data,
    success: (res) => { window.location.href = `createsurvey.php?surveyid=${res.toString().trim()}`; },
    error: (err) => {
      alert("Error adding survey");
      console.log(err);
    }
  });
}

/**
 * GET SURVEY QUESTIONS
 */
function getSurveyQuestions() {
  $.ajax({
    url: "./php/apis/getSurveyQuestions.php",
    method: "get",
    data: { surveyID: getQueryStringVals().surveyid },
    success: (res) => { $("#questionsList").html(res); },
    error: (err) => {
      alert("Error finding result");
      console.log(err);
    }
  });
}

/**
 * ADD QUESTION
 */
function addQuestion() {

  const data = {
    question: $("#question").val(),
    category: $("#category").val(),
    surveyID: getQueryStringVals().surveyid
  }
  $("#question").val("");
  $("#category").val("");

  // Send the request
  $.ajax({
    url: "./php/apis/addQuestion.php",
    method: "post",
    data,
    success: (res) => {
      $("#statusRibbon").html(`<div>${res}</div>`);
      getSurveyQuestions();
    },
    error: (err) => {
      alert("Error adding question");
      console.log(err);
    }
  });
}

/**
 * DELETE QUESTION
 */
function deleteQuestion(questionID) {

  // Send the request
  $.ajax({
    url: "./php/apis/deleteQuestion.php",
    method: "get",
    data: { questionID },
    success: (res) => {
      $("#statusRibbon").html(`<div>${res}</div>`);
      getSurveyQuestions();
    },
    error: (err) => {
      alert(err);
      console.log(err);
    }
  });
}