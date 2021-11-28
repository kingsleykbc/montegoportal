<?php
require_once("./php/handleAssets.php");
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
  <link rel="stylesheet" href="./css/assets.css">

  <title>CV Database Dashboard</title>
</head>

<body>
  <?php echo $header ?>

  <!-- SECONDARY HERDER -->
  <h2 class="titleRibbon"> Asset List </h2>

  <!-- STATUS RIBBON -->
  <div id="statusRibbon"></div>

  <!-- FILTER RIBBON -->
  <div class="filter">
    <form id="assetFilter" class="sectionContent filterSection">
      <h2>Filters</h2>

      <!-- SEARCH BAR -->
      <div class="filterMenu">
        <label class="filterField">
          <input type="text" name="search" id="search" placeholder="Search Name">
        </label>
      </div>

      <!-- FILTER MENU -->
      <div class="filterMenu">

        <!-- ITEM CLASS -->
        <label class="filterField">
          <p>Item Classification</p>
          <select name="class" id="class">
            <option value="">All</option>
            <optgroup label="ICT Devices">
              <option>Desktop PC</option>
              <option>Laptop PC</option>
              <option>Keyboard</option>
              <option>Mouse</option>
              <option>Printer</option>
              <option>Other ICT Device</option>
            </optgroup>
            <optgroup label="Furniture">
              <option>Desk</option>
              <option>Chair</option>
              <option>Drawer</option>
              <option>Plant</option>
              <option>Couch</option>
              <option>Other Furniture</option>
            </optgroup>
            <optgroup label="Other Assets">
              <option>Fire Extinguisher</option>
              <option>Air conditioner</option>
              <option>Water Cooler</option>
              <option>All Other</option>
            </optgroup>
          </select>
        </label>

        <!-- ITEM STATE -->
        <label class="filterField">
          <p>Item State</p>
          <select name="state" id="state">
            <option value="">All</option>
            <option>Good</option>
            <option>Faulty</option>
            <option>Damaged</option>
            <option>In Repair</option>
            <option>Stolen / Misplaced</option>
          </select>
        </label>

        <!-- ITEM LOCATION -->
        <label class="filterField">
          <p>Item Location</p>
          <select name="location" id="location">
            <option value="">All</option>
            <option>Conference Room</option>
            <option>Top Floor Office</option>
            <option>Server Room</option>
            <option>Top Floor Bathroom</option>
            <option>CEO Office</option>
            <option>CEO Reception</option>
            <option>CEO Kitchen</option>
            <option>CEO Bathroom</option>
            <option>Reception</option>
            <option>Lounge</option>
            <option>Waiting Room</option>
            <option>Admin/HR Office</option>
            <option>Admin/HR Bathroom</option>
            <option>Engineering Office</option>
            <option>Engineering Bathroom</option>
            <option>Engineering Meeting Room</option>
            <option>Finance Office</option>
            <option>Finance Bathroom</option>
            <option>Other Area</option>
          </select>
        </label>
      </div>

      <div className="filterButtons">
        <button value="ds" class="resultButton" id="resultButton" onclick="handleSearch()">Search</button>
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
    <h3>Options</h3>
    <div class="optionButtons">
      <a class="button" href="./myassets.php">My Items</a>
      <a class="button" href="./php/exportScripts/exportAssetsList.php">Export .xlsv</a>
      <div class="button" onclick="toggleBox('addAsset')"> + Add Item </div>
    </div>
  </div>


  <!--EDIT LIGHTBOX -->
  <div class="lightbox" id="editAsset">
    <div id="box">
      <h2>Edit Asset</h2>
      <div class="fields">
        <!-- ID -->
        <div class="dontShow"><input name="idEdit" id="idEdit" /></div>

        <!-- STATE -->
        <div class="formField">
          <h3> Item State </h3>
          <select name="stateEdit" id="stateEdit" required>
            <option value="">--</option>
            <option>Good</option>
            <option>Faulty</option>
            <option>Damaged</option>
            <option>In Repair</option>
            <option>Stolen / Misplaced</option>
          </select>
        </div>

        <!-- STAFF ID -->
        <div class="formField">
          <h3> Staff (If allocated) </h3>
          <select name="staffIDEdit" id="staffIDEdit">
            <option value="">None</option>
            <?php echo $staffList ?>
          </select>
        </div>


        <!-- ITEM LOCATION -->
        <div class="formField">
          <h3>Item Location</h3>
          <select name="locationEdit" id="locationEdit" required>
            <option value="">--</option>
            <option>Conference Room</option>
            <option>Top Floor Office</option>
            <option>Server Room</option>
            <option>Top Floor Bathroom</option>
            <option>CEO Office</option>
            <option>CEO Reception</option>
            <option>CEO Kitchen</option>
            <option>CEO Bathroom</option>
            <option>Reception</option>
            <option>Lounge</option>
            <option>Waiting Room</option>
            <option>Admin/HR Office</option>
            <option>Admin/HR Bathroom</option>
            <option>Engineering Office</option>
            <option>Engineering Bathroom</option>
            <option>Engineering Meeting Room</option>
            <option>Finance Office</option>
            <option>Finance Bathroom</option>
            <option>Other Area</option>
          </select>
        </div>

        <!-- COMMENT -->
        <div class="formField">
          <h3> Comment (Optional) </h3>
          <input type="text" name="commentEdit" id="commentEdit">
        </div>
      </div>

      <!-- UODATE BUTTON -->
      <div class="aCenter"> <button onclick="updateAsset()">Update Record</button> </div>

    </div>
    <div class="back" onclick="toggleBox('editAsset')"></div>
  </div>



  <!-- ADD LIGHTBOX -->
  <div id="addAsset" class="lightbox">
    <div id="box">
      <h2>Add Asset</h2>
      <form class="form" id="addAssetForm" onsubmit="addAsset()">
        <div class="fields">

          <!-- NAME -->
          <div class="formField">
            <h3> Name </h3>
            <input type="text" name="name" id="name" required>
          </div>

          <!-- S/N -->
          <div class="formField">
            <h3> Seriel No. </h3>
            <input type="text" name="serialNo" id="serialNo" required>
          </div>

          <!-- MODEL -->
          <div class="formField">
            <h3> Model (Optional) </h3>
            <input type="text" name="model" id="model">
          </div>

          <!-- CLASSIFICATION  -->
          <div class="formField">
            <h3> Classification </h3>
            <select name="class" id="classField" required>
              <option value="">--</option>
              <optgroup label="ICT Devices">
                <option>Desktop PC</option>
                <option>Laptop PC</option>
                <option>Keyboard</option>
                <option>Mouse</option>
                <option>Printer</option>
                <option>Other ICT Device</option>
              </optgroup>
              <optgroup label="Furniture">
                <option>Desk</option>
                <option>Chair</option>
                <option>Drawer</option>
                <option>Plant</option>
                <option>Couch</option>
                <option>Other Furniture</option>
              </optgroup>
              <optgroup label="Other Assets">
                <option>Fire Extinguisher</option>
                <option>Air conditioner</option>
                <option>Water Cooler</option>
                <option>All Other</option>
              </optgroup>
            </select>
          </div>

          <!-- MAC ADDRESS -->
          <div class="formField" id="macAddressField">
            <h3> MAC ADDRESS (Separate Multiple Addressed with '|') </h3>
            <input type="text" name="macAddress" id="macAddress">
          </div>

          <!-- STAFF LIST -->
          <div class="formField">
            <h3> Staff (If allocated) </h3>
            <select name="staffID" id="staffID">
              <option value="">--</option>
              <?php echo $staffList ?>
            </select>
          </div>

          <!-- ITEM LOCATION -->
          <div class="formField">
            <h3>Item Location</h3>
            <select name="location" id="location" required>
              <option value="">--</option>
              <option>Conference Room</option>
              <option>Top Floor Office</option>
              <option>Server Room</option>
              <option>Top Floor Bathroom</option>
              <option>CEO Office</option>
              <option>CEO Reception</option>
              <option>CEO Kitchen</option>
              <option>CEO Bathroom</option>
              <option>Reception</option>
              <option>Lounge</option>
              <option>Waiting Room</option>
              <option>Admin/HR Office</option>
              <option>Admin/HR Bathroom</option>
              <option>Engineering Office</option>
              <option>Engineering Bathroom</option>
              <option>Engineering Meeting Room</option>
              <option>Finance Office</option>
              <option>Finance Bathroom</option>
              <option>Other Area</option>
            </select>
          </div>

          <!-- ITEM STATE -->
          <div class="formField">
            <h3> Item State </h3>
            <select name="state" id="stateField" required>
              <option value="">--</option>
              <option>Good</option>
              <option>Faulty</option>
              <option>Damaged</option>
              <option>In Repair</option>
              <option>Stolen / Misplaced</option>
            </select>
          </div>

          <!-- PRICE -->
          <div class="formField">
            <h3> Price (Optional) </h3>
            <input type="text" name="price" id="price">
          </div>

          <!-- COMMENT -->
          <div class="formField">
            <h3> Comment (Optional) </h3>
            <input type="text" name="comment" id="comment">
          </div>
        </div>

        <div class="aCenter"> <button> Add </button> </div>
      </form>
    </div>
    <div class="back" onclick="toggleBox('addAsset')"></div>
  </div>

  <script src="./jquery.min.js"></script>
  <script src="./js/script.js"></script>
  <script src="./js/handleAssets.js"></script>
</body>

</html>