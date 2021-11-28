/**
 * SHOW "SPECIFY" IS LIKELY CAUSE IS "others"
 */
function toggleSpecifyDisplay() {
  let display = $("#mostLikelyCause").val() === "Others" ? "block" : "none";
  $("#specifyOthers").css({ display });
}



/**
 * POST A SUGGESTION
 */
function postImprovementCard() {
  let data = formDataToJSON('#newImprovementCard');
  if (data.mostLikelyCause === "Others") data.mostLikelyCause = data.othersSpecify;

  // Send the request
  $.ajax({
    url: "./php/apis/addImprovementCard.php",
    method: "post",
    data,
    success: (res) => { window.location.href = "myimprovementcards.php"; },
    error: (err) => {
      alert("Error finding result");
      console.log(err);
    }
  });
}
