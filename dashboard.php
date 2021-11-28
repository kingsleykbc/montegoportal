<?php
require_once("./php/handleDashboard.php");
require("./php/components/header.php");
require("./php/components/areYouSureBox.php");
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
  <title>CV Database Dashboard</title>
</head>

<body>
  <?php echo $header ?>

  <!-- SECONDARY HERDER -->
  <header class="secondHeader">
    <h3> Staff CV Dashboard</h3>
  </header>

  <!-- FILTER RIBBON -->
  <div class="filter">
    <form id="filterContent" class="sectionContent">
      <h2>Filters</h2>

      <!-- SEARCH BAR -->
      <div class="filterMenu">
        <label class="filterField">
          <input type="text" name="search" id="search" placeholder="Search Name">
        </label>
      </div>

      <!-- FILTER MENU -->
      <div class="filterMenu">
        <label class="filterField">
          <p>CV Status</p>
          <select name="cvStatusFilter" id="cvStatusFilter">
            <option value="">All</option>
            <option>New</option>
            <option>Interviewed</option>
            <option>Post-Interview</option>
            <option>Shortlisted</option>
            <option>Keep in view</option>
            <option>Rejected</option>
          </select>
        </label>

        <label class="filterField">
          <p>Education Level</p>
          <select id="educationLevel" name="educationLevel">
            <option value="">All</option>
            <option value="No formal education">No formal education</option>
            <option value="Primary education">Primary education</option>
            <option value="Secondary education">Secondary education or high school</option>
            <option value="Vocational qualification">Vocational qualification</option>
            <option value="Bachelor's degree">Bachelor's degree</option>
            <option value="Master's degree">Master's degree</option>
            <option value="Doctorate or higher">Doctorate or higher</option>
          </select>
        </label>

        <label class="filterField">
          <p>Field of Interest</p>
          <select name="fieldOfInterest" id="fieldOfInterest">
            <option value="">All</option>
            <option>Engineering</option>
            <option>Human Resources</option>
            <option>Business Development</option>
            <option>I.C.T</option>
            <option>Finance</option>
            <option>Engineering</option>
          </select>
        </label>
        <label class="filterField">
          <p>Years of Experience</p>
          <input type="number" name="expYears" id="expYears">
        </label>
      </div>

      <!-- THINGS TO HIDE -->
      <div class="filterHides">
        <label>
          <input type="checkbox" checked value="gender" class="showFilter">
          <span>Gender</span>
        </label>
        <label>
          <input type="checkbox" checked value="maritalStatus" class="showFilter">
          <span>Marital Status</span>
        </label>
        <label>
          <input type="checkbox" checked value="address" class="showFilter">
          <span>Address</span>
        </label>
        <label>
          <input type="checkbox" checked value="state" class="showFilter">
          <span>State of Origin</span>
        </label>
        <label>
          <input type="checkbox" checked value="skills" class="showFilter">
          <span>Skills</span>
        </label>
        <label>
          <input type="checkbox" checked value="dateOfBirth" class="showFilter">
          <span>Date of Birth</span>
        </label>
        <label>
          <input type="checkbox" checked value="nationality" class="showFilter">
          <span>Nationality</span>
        </label>
      </div>

      <div className="filterButtons">
        <button class="resultButton" id="resultButton" onclick="handleSearch()">Search</button>
        <input type="reset" value="Reset">
      </div>

    </form>
    <div id="filterButton" onclick="toggleFilters()">
      <b> Hide Filters </b>
    </div>
  </div>

  <!-- FILTER RESULT -->
  <div class="result">
    <div class="sectionContent">
      <h2>Result</h2>
    </div>
    <div class="resultTable" id="resultTable">
      <table id="searchResult">
      </table>
    </div>
  </div>

  <!-- BOTTOM OPTIONS -->
  <div class="bottomOptions">
    <h3>Options</h3>
    <div class="optionButtons">
      <a href="./cvformsettings.php" class="button"> Form settings </a>
      <a href="./php/exportScripts/exportCVDatabase.php" id="excelExportButton" class="button"> Export to Excel </a>
    </div>
  </div>

  <!--EDIT LIGHTBOX -->
  <div id="areYouSure" class="lightbox">
    <div id="box">
      <h2>Edit CV Status</h2>
      <div class="form">
        <div id="staffID"></div>
        <select name="cvstatus" id="cvStatusEdit">
          <option>New</option>
          <option>Interviewed</option>
          <option>Post-Interview</option>
          <option>Shortlisted</option>
          <option>Keep in view</option>
          <option>Rejected</option>
        </select>
      </div>
      <button onclick="updateCVStatus()">Update</button>
    </div>
    <div class="back" onclick="toggleBox('areYouSure')"></div>
  </div>

  <!-- ARE YOU SURE BOX -->
  <?php echo $areYouSureBox ?>

  <script src="./jquery.min.js"></script>
  <script src="./js/script.js"></script>
  <script src="./js/handleDashboard.js"></script>
</body>

</html>