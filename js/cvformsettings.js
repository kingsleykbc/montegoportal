let openPositions = "";
getAndDisplayVacantPositions();


/**
 * GET AND DISPLAY THE VACANT POSITIONS FROM THE DB
 */
function getAndDisplayVacantPositions(){
  $.ajax({
    url: "./php/apis/getVacantPositions.php",
    method: "get",
    success: (res) => {
      openPositions = (res.trim()) ? "|"+res.trim() : "";
      displayVacantPositions();
    },
    error: (err) => {
      $("#statusRibbon").html(`<div class="error">${err.responseText}</div>`);
      console.log(err);
    }
  });
}

/**
 * UPDATE THE VACENT POSITIONS
 */
function updateVacantPositions(){
  data = { val : openPositions.substring(1)};

  $.ajax({
    url: "./php/apis/updateVacantPositions.php",
    method: "post",
    data,
    success: (res) => {
      $("#statusRibbon").html(`<div> ${res} </div>`);
      getAndDisplayVacantPositions();
    },
    error: (err) => {
      alert("Error finding result");
      console.log(err);
    }
  });
}


/**
 * SHOW VACANT POSITIONS IN #positionsList DIV
 */
function displayVacantPositions(){
  
  let positions = "<div class='noData'>No vacant positions</div>";
  
  if (!openPositions.trim()) {
    $("#positionsList").html(positions);
    return
  };

  const positionArray = openPositions.substring(1).split("|");
  
  if (positionArray.length > 0){
    positions = positionArray.map(i => `
      <div class='positionItem'>
        <div class='word'>${i}</div>
        <button class='remove' onclick='removePosition("`+ escape(i) + `")'> Remove </button>
      </div>
    `);
  }

  $("#positionsList").html(positions);
}

/**
 * ADD A VACANT POSITION
 */
function addPosition() {
  let word = $("#position").val().trim();
  if (word == "") return;
  
  openPositions += `|${word}`;
  $("#position").val("");
  updateVacantPositions();
}

/**
 * REMOVE A POSITOON
 */
function removePosition(position) {
  position = decodeURI(position);
  openPositions = openPositions.replace(`|${position}`,"");

  updateVacantPositions();
} 