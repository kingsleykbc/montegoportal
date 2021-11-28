getSuggestions();


/**
 * GET THE SUGGESTIONS
 */
function getSuggestions() {

  // Send the request
  $.ajax({
    url: "./php/apis/getSuggestions.php",
    method: "get",
    success: (res) => {
      $("#mySuggestions").html(res);
    },
    error: (err) => {
      alert("Error finding result");
      console.log(err);
    }
  });
}

/**
 * POST A SUGGESTION
 */
function postSuggestion() {
  let data = formDataToJSON('#addSuggestionForm');

  // Send the request
  $.ajax({
    url: "./php/apis/addSuggestion.php",
    method: "post",
    data,
    success: (res) => {
      $("#statusRibbon").html(`<div>${res}</div>`);
      getSuggestions();
      toggleBox("addSuggestion");
    },
    error: (err) => {
      alert("Error finding result");
      console.log(err);
    }
  });
}
