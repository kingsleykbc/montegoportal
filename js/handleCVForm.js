/**
 * SHOW STATE OF ORIGIN IF COUNTRY IS NIGERIA
 */
function toggleStateOfOrigin() {
  let display = $("#nationality").val() === "Nigeria" ? "block" : "none";
  $("#stateOfOrigin").css({display});
}

