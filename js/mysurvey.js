/**
 * HANDLE ACCORDION
 */
$(".answer").bind("click", function(e){
  const cName = e.target.className;
  if (
    cName === "categoryAndPercentage" 
    || cName === "questionAndPercentage"
    || cName === "categoryName" 
    || cName === "questionName"
  ) return;

  let lb = $(this).find(".categoryBreakdown");
  display = lb.css("display") == "none" ? "block" : "none";
  lb.css({ display });
});


$(".category").bind("click", function (e) {
  const cName = e.target.className;
  if (
    cName === "questionAndPercentage"
    || cName === "questionAndPercentage" 
    || cName === "questionName"
  ) return;

  let lb = $(this).find(".answersBreakdown");
  display = lb.css("display") == "none" ? "block" : "none";
  lb.css({ display });
});