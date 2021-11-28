getSuggestions();


/**
 * GET THE SUGGESTIONS
 */
function getSuggestions() {

  // Send the request
  $.ajax({
    url: "./php/apis/getAllSuggestions.php",
    method: "get",
    success: (res) => {
      $("#allSuggestions").html(res);
    },
    error: (err) => {
      alert("Error finding result");
      console.log(err);
    }
  });
}

/**
 * TOGGLE "VIEW ONLY HSE SUGGESTIONS"
 */
function hseToggle() {  
  $(".mySuggestion").toggle();
  $(".isHSE").toggle();
}

/**
 * POST A SUGGESTION
 */
function replySuggestion(suggestionID, responderID) {
  const response = $(`#postResponse${suggestionID}`).val();
  const data = { suggestionID, responderID, response };

  // Send the request
  $.ajax({
    url: "./php/apis/replySuggestion.php",
    method: "post",
    data,
    success: (res) => {
      $("#statusRibbon").html(`<div>${res}</div>`);
      getSuggestions();
    },
    error: (err) => {
      alert("Error finding result"); 
      console.log(err);
    }
  });
}
