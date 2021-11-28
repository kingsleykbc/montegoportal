getAssets();

/**
 * GET ASSETS
 */
function getAssets() {
  $.ajax({
    url: "./php/apis/getMyAssets.php",
    method: "get",
    success: (res) => { $("#myassets").html(res); },
    error: (err) => {
      alert("Error finding result");
      console.log(err);
    }
  });
}

/**
 * SIGN FOR ASSETS 
 */
function signForItem(assetID) {
  $.ajax({
    url: "./php/apis/updateAssetSign.php",
    method: "get",
    data: { assetID },
    success: (res) => { 
      $("#statusRibbon").html(`<div>${res}</div>`);
      getAssets() 
    },
    error: (err) => {
      alert("Error finding result");
      console.log(err);
    }
  });
}