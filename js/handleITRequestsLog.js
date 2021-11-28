handleSearch();

/**
 * GET SEARCH RESULT
 */
function handleSearch() {
  let data = getData();

  // Send the request
  $.ajax({
    url: "./php/apis/getITRequestsLogResults.php",
    method: "get",
    data,
    success: (res) => {
      $("#searchResult").html(res);
    },
    error: (err) => {
      alert("Error finding result");
      console.log(err);
    }
  });
}

/**
 * GET THE SHOW FILTERS
 */
function getData() {
  let data = {};
  data.dateFrom = $("#dateFrom").val();
  data.dateTo = $("#dateTo").val();
  
  return data;
}