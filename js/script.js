/**
 * TOGGLE FILTERS
 */
function toggleFilters() {
  let lb = $(".filterSection");
  if (lb.css("display") == "none") {
    display = "block";
    text = "Hide Filters"
  }
  else {
    display = "none";
    text = "Show filters"
  }
  lb.css({ display });
  $("#filterButton b").html(text);
}

/**
* Lightbox Show/hide
*/
function toggleBox(id) {
  let lb = $("#"+id);
  display = lb.css("display") == "none" ? "block" : "none";
  lb.css({ display });

  if (display === "none") $("form").trigger("reset");
}

/**
 * TOGGLE DISPLAY
 */
function toggleDisplay(selector) {
  let lb = $(selector);
  display = lb.css("display") == "none" ? "block" : "none";
  lb.css({ display });
}


/**
 * Toggle 'Are you sure' box
 */ 
function toggleAreYouSureBox(functionName, message) {
  toggleBox("areYouSureBox");
  $("#areYouSureBox #areYouSureMessage").html(message);
  $("#areYouSureBox #yes").html("<div onclick='" + functionName + "()'> Yes </div>");
}

/**
 * Convert Form date to JSON
 */

function formDataToJSON(formSelector) {
  const formSerializeArr = $(formSelector).serializeArray();

  var jsonObj = {};
  jQuery.map(formSerializeArr, function (n, i) {
    jsonObj[n.name] = n.value;
  });

  return jsonObj;
}

/**
 * CLOST STATUS RIBBON
 */
$("#statusRibbon").click(function () {
  $("#statusRibbon").fadeOut("slow", () => $("#statusRibbon").html("") );
  $("#statusRibbon").fadeIn("slow");
});

$("form").submit(function (e) {
  e.preventDefault();
});


/**
 * EXPORT TABLE TO EXCEL
 */
function exportToExcel() {

  // Get the Table from Search
  let table = $("#resultTable").html();

  $.ajax({
    url: "./php/apis/excelExport.php",
    method: "post",
    data: { table },
    success: (res) => { console.log(res) },
    contentType: false,
    processData: false,
    error: (err) => {
      alert("Error finding result");
      console.log(err);
    }
  });
}

/**
 * GET QUERY STRING VALUES
 */
function getQueryStringVals() {
  var vars = [], hash;
  var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
  for (var i = 0; i < hashes.length; i++) {
    hash = hashes[i].split('=');
    vars.push(hash[0]);
    vars[hash[0]] = hash[1];
  }
  return vars;
}