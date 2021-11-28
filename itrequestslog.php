<?php
require("./php/components/header.php");
require_once("./php/validateLogin.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" href="./images/icon.jpg">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="./css/dashboard.css">
  <link rel="stylesheet" href="./css/itrequestslog.css">
  <title>IT Reuqsts logs</title>
</head>

<body>
  <?php echo $header ?>
  <a href="./itsupportmenu.php">
    <h2 class='titleRibbon'>Requests Log</h2>
  </a>

  <!-- STATUS RIBBON -->
  <div id="statusRibbon"></div>

  <!-- FILTER RIBBON -->
  <div class="filter">
    <form id="assetFilter" class="sectionContent filterSection">
      <h2>Filters</h2>

      <!-- FILTER MENU -->
      <div class="filterMenu">

        <!-- FROM DATE -->
        <label class="filterField">
          <p>From</p>
          <input type="date" name="dateFrom" id="dateFrom">
        </label>

        <!-- TO DATE -->
        <label class="filterField">
          <p>To</p>
          <input type="date" name="dateTo" id="dateTo">
        </label>
      </div>

      <div className="filterButtons">
        <button value="ds" class="resultButton" id="resultButton" onclick="handleSearch()">
          Search
        </button>
        <input type="reset" value="Reset">
      </div>
    </form>

    <div id="filterButton" onclick="toggleFilters()">
      <b> Hide Filters </b>
    </div>
  </div>

  <!-- FILTER RESULT -->
  <div class="result">
    <div class="resultTable" id="resultTable">
      <table id="searchResult">
        <!-- Serch Result -->
      </table>
    </div>
  </div>

  <!-- BOTTOM OPTIONS -->
  <div class="bottomOptions">
    <h3> Options </h3>
    <div class="options">
      <div class="button green"> Export to Excel </div>
    </div>
  </div>

  <!-- JS  -->
  <script src="./jquery.min.js"></script>
  <script src="./js/script.js"></script>
  <script src="./js/handleITRequestsLog.js"></script>
</body>

</html>