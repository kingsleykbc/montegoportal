getImprovementCards();


/**
 * GET THE CARDS
 */
function getImprovementCards() {

  // Send the request
  $.ajax({
    url: "./php/apis/getStaffImprovementCards.php",
    method: "get",
    success: (res) => {
      $("#myImprovementCards").html(res);
    },
    error: (err) => {
      alert("Error finding result");
      console.log(err);
    }
  });
}


/**
 * SHOW RESPONSE BOX
 */
function respondToCard(cardID) {
  $("#cardID").html(cardID);
  toggleBox('respondBox');
}

/**
 * REPLY TO HSE CARD
 */
function updateCVStatus() {
  let data = formDataToJSON('#responseForm');
  let cardID = $("#cardID").html();
  toggleBox('respondBox');


  // Send the request
  $.ajax({
    url: "./php/apis/replyHSECard.php",
    method: "post",
    data: { ...data, cardID },
    success: (res) => {
      getImprovementCards();
      $("#statusRibbon").html(`<div>${res}</div>`);
    },
    error: (err) => {
      alert(err);
      console.log(err);
    }
  });
  toggleBox('areYouSure');
}
