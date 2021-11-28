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
  <link rel="stylesheet" href="./css/index.css">
  <title>Surveys and suggestions</title>
</head>

<body>
  <?php echo $header ?>

  <!-- SECONDARY HERDER -->
  <h2 class="titleRibbon"> <a href="./suggestionsandsurveys.php">Suggestions and Surveys</a> </h2>

  <div class="menu">
    <a href="suggestionbox.php">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <path d="M16.677 17.868l-.343.195v-1.717l.343-.195v1.717zm2.823-3.325l-.342.195v1.717l.342-.195v-1.717zm3.5-7.602v11.507l-9.75 5.552-12.25-6.978v-11.507l9.767-5.515 12.233 6.941zm-13.846-3.733l9.022 5.178 1.7-.917-9.113-5.17-1.609.909zm2.846 9.68l-9-5.218v8.19l9 5.126v-8.098zm3.021-2.809l-8.819-5.217-2.044 1.167 8.86 5.138 2.003-1.088zm5.979-.943l-2 1.078v2.786l-3 1.688v-2.856l-2 1.078v8.362l7-3.985v-8.151zm-4.907 7.348l-.349.199v1.713l.349-.195v-1.717zm1.405-.8l-.344.196v1.717l.344-.196v-1.717zm.574-.327l-.343.195v1.717l.343-.195v-1.717zm.584-.333l-.35.199v1.717l.35-.199v-1.717z" /></svg>
      <h3>My Suggestions</h3>
    </a>

    <a href="viewsuggestions.php">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <path d="M16.677 17.868l-.343.195v-1.717l.343-.195v1.717zm2.823-3.325l-.342.195v1.717l.342-.195v-1.717zm3.5-7.602v11.507l-9.75 5.552-12.25-6.978v-11.507l9.767-5.515 12.233 6.941zm-13.846-3.733l9.022 5.178 1.7-.917-9.113-5.17-1.609.909zm2.846 9.68l-9-5.218v8.19l9 5.126v-8.098zm3.021-2.809l-8.819-5.217-2.044 1.167 8.86 5.138 2.003-1.088zm5.979-.943l-2 1.078v2.786l-3 1.688v-2.856l-2 1.078v8.362l7-3.985v-8.151zm-4.907 7.348l-.349.199v1.713l.349-.195v-1.717zm1.405-.8l-.344.196v1.717l.344-.196v-1.717zm.574-.327l-.343.195v1.717l.343-.195v-1.717zm.584-.333l-.35.199v1.717l.35-.199v-1.717z" /></svg>
      <h3>View Staff Suggestions</h3>
    </a>

    <a href="mysurveys.php">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <path d="M22 2v22h-20v-22h3c1.229 0 2.18-1.084 3-2h8c.82.916 1.771 2 3 2h3zm-11 1c0 .552.448 1 1 1s1-.448 1-1-.448-1-1-1-1 .448-1 1zm9 1h-4l-2 2h-3.898l-2.102-2h-4v18h16v-18zm-8 5c-2.761 0-5 2.239-5 5s2.239 5 5 5 5-2.239 5-5c0-2.762-2.238-5-5-5zm0 8.8c-2.095 0-3.8-1.705-3.8-3.8s1.705-3.8 3.8-3.8v3.8h3.8c0 2.095-1.705 3.8-3.8 3.8z" /></svg>
      <h3>My Surveys</h3>
    </a>

    <a href="createsurvey.php">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <path d="M22 2v22h-20v-22h3c1.229 0 2.18-1.084 3-2h8c.82.916 1.771 2 3 2h3zm-11 1c0 .552.448 1 1 1s1-.448 1-1-.448-1-1-1-1 .448-1 1zm9 1h-4l-2 2h-3.898l-2.102-2h-4v18h16v-18zm-8 5c-2.761 0-5 2.239-5 5s2.239 5 5 5 5-2.239 5-5c0-2.762-2.238-5-5-5zm0 8.8c-2.095 0-3.8-1.705-3.8-3.8s1.705-3.8 3.8-3.8v3.8h3.8c0 2.095-1.705 3.8-3.8 3.8z" /></svg>
      <h3>Create survey</h3>
    </a>
  </div>

  <script src="./jquery.min.js"></script>
  <script src="./js/script.js"></script>
  <script src="./js/handleMyAssets.js"></script>
</body>

</html>