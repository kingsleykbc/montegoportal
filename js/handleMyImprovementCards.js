getImprovementCards();


/**
 * GET THE CARDS
 */
function getImprovementCards() {

  // Send the request
  $.ajax({
    url: "./php/apis/getMyImprovementCards.php",
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
 * DELETE CARD
 */
function deleteImprovementCard(id) {
  toggleBox("areYouSureBox");

  // Send the request
  $.ajax({
    url: "./php/apis/deleteImprovementCard.php",
    method: "get",
    data: { id },
    success: (res) => {
      $("#statusRibbon").html(`<div>${res}</div>`);
      getImprovementCards();
    },
    error: (err) => {
      alert(err);
      console.log(err);
    }
  });
}