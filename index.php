<?php
require('./php/components/header.php');
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
  <title>Home</title>
</head>

<body>
  <?php echo $header ?>

  <h2 class='titleRibbon'>Menu</h2>
  <div class="menu">
    <a href="dashboard.php">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <path d="M12.008 0c-4.225 0-10.008 1.001-10.008 4.361v15.277c0 3.362 6.209 4.362 10.008 4.362 3.783 0 9.992-1.001 9.992-4.361v-15.278c0-3.361-5.965-4.361-9.992-4.361zm0 2c3.638 0 7.992.909 7.992 2.361 0 1.581-5.104 2.361-7.992 2.361-3.412.001-8.008-.905-8.008-2.361 0-1.584 4.812-2.361 8.008-2.361zm7.992 17.386c0 1.751-5.104 2.614-7.992 2.614-3.412 0-8.008-1.002-8.008-2.614v-2.04c2.117 1.342 5.17 1.78 8.008 1.78 2.829 0 5.876-.438 7.992-1.78v2.04zm0-4.873c0 1.75-5.104 2.614-7.992 2.614-3.412-.001-8.008-1.002-8.008-2.614v-2.364c2.116 1.341 5.17 1.78 8.008 1.78 2.839 0 5.881-.442 7.992-1.78v2.364zm-7.992-2.585c-3.426 0-8.008-1.006-8.008-2.614v-2.371c2.117 1.342 5.17 1.78 8.008 1.78 2.829 0 5.876-.438 7.992-1.78v2.372c0 1.753-5.131 2.613-7.992 2.613z" /></svg>
      <h3>Manage CVs</h3>
    </a>
    <a href="assetsmenu.php">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <path d="M15.812 4.819c-.33-.341-.312-.877.028-1.207l3.469-3.365c.17-.164.387-.247.603-.247.219 0 .438.085.604.257l-4.704 4.562zm-5.705 8.572c-.07.069-.107.162-.107.255 0 .194.158.354.354.354.089 0 .178-.033.247-.1l.583-.567-.493-.509-.584.567zm4.924-6.552l-1.994 1.933c-1.072 1.039-1.619 2.046-2.124 3.451l.881.909c1.419-.461 2.442-.976 3.514-2.016l1.994-1.934-2.271-2.343zm5.816-5.958l-5.137 4.982 2.586 2.671 5.138-4.98c.377-.366.566-.851.566-1.337 0-1.624-1.968-2.486-3.153-1.336zm-11.847 12.119h-4v1h4v-1zm9-1.35v1.893c0 4.107-6 2.457-6 2.457s1.518 6-2.638 6h-7.362v-20h12.629l2.062-2h-16.691v24h10.189c3.163 0 9.811-7.223 9.811-9.614v-4.687l-2 1.951z" /></svg>
      <h3>Asset List</h3>
    </a>
    <a href="suggestionsandsurveys.php">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <path d="M16.677 17.868l-.343.195v-1.717l.343-.195v1.717zm2.823-3.325l-.342.195v1.717l.342-.195v-1.717zm3.5-7.602v11.507l-9.75 5.552-12.25-6.978v-11.507l9.767-5.515 12.233 6.941zm-13.846-3.733l9.022 5.178 1.7-.917-9.113-5.17-1.609.909zm2.846 9.68l-9-5.218v8.19l9 5.126v-8.098zm3.021-2.809l-8.819-5.217-2.044 1.167 8.86 5.138 2.003-1.088zm5.979-.943l-2 1.078v2.786l-3 1.688v-2.856l-2 1.078v8.362l7-3.985v-8.151zm-4.907 7.348l-.349.199v1.713l.349-.195v-1.717zm1.405-.8l-.344.196v1.717l.344-.196v-1.717zm.574-.327l-.343.195v1.717l.343-.195v-1.717zm.584-.333l-.35.199v1.717l.35-.199v-1.717z" /></svg>
      <h3>Suggestions and Surveys</h3>
    </a>

    <a href="itsupportmenu.php">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <path d="M13.895 10.623l1.37-2.054c.35-.525 1.06-.667 1.585-.317.524.35.667 1.06.316 1.585l-1.369 2.054c-.35.525-1.06.667-1.585.317s-.667-1.06-.317-1.585zm-1.881-.684c.525.351 1.236.208 1.587-.317l1.383-2.074c.352-.526.209-1.237-.317-1.588-.525-.351-1.236-.208-1.587.318l-1.383 2.074c-.352.526-.21 1.237.317 1.587zm7.007 3.949l-1.212 1.817c-.322.483-.191 1.136.292 1.458s1.136.191 1.458-.292l1.211-1.817c.323-.483.192-1.136-.291-1.458-.483-.322-1.136-.192-1.458.292zm-3.071-.84c-.35.523-.208 1.231.315 1.58.524.349 1.231.208 1.58-.316l1.312-1.968c.35-.524.208-1.231-.316-1.58-.523-.349-1.23-.208-1.579.316l-1.312 1.968zm5.665 10.952c-.609 0-1.22-.232-1.686-.698l-7.022-7.144c1.088-1.203.56-3.279-1.182-3.588l-3.074-.546-1.058-1.058c-.601-.6-1.427-.916-2.273-.871-1.382.074-2.787-.417-3.842-1.472-.986-.987-1.478-2.279-1.478-3.572 0-.56.092-1.12.277-1.655l3.214 3.214c1.253.074 3.192-1.865 3.118-3.119l-3.213-3.214c.535-.185 1.094-.277 1.654-.277 1.293 0 2.586.493 3.572 1.479 1.055 1.055 1.545 2.46 1.472 3.842-.045.846.271 1.674.871 2.273l.027.027c-1.243 2.083.433 3.51 1.806 3.457-.247 1.181 1.017 2.411 2.102 2.411-.269 1.04.536 2.125 1.789 2.371-.505 1.822 2.258 3.767 3.857 1.315l2.756 2.755c.466.466.698 1.076.698 1.686 0 1.316-1.066 2.384-2.385 2.384zm.885-2.5c0-.552-.448-1-1.001-1-.552 0-1 .448-1 1s.448 1 1 1c.553 0 1.001-.448 1.001-1zm-9.631-3.939c-.667-.688-1.701-.739-3.584-.864-.286-.019-.462.165-.485.443l-.458 4.208s2.794 1.888 3.94 2.652c1.064-1.921 2.699-2.037 3.921-3.002l-3.334-3.437zm-1.622-1.692c1.457 0 1.678-2.064.303-2.308-5.171-.919-4.899-.889-5.069-.889-.635 0-1.186.453-1.309 1.078l-.446 3.946c-.061.631.145 1.176.633 1.532.487.354 2.026 1.449 2.026 1.449s.328-2.835.42-3.651c.093-.815.551-1.378 1.424-1.335.092.004 1.859.178 2.018.178z" /></svg>
      <h3>IT support</h3>
    </a>

    <a href="hse.php">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <path d="M11.854 12.693c-.218.928-1.24 1.841-1.914 1.847.709-1.622.837-4.135-.676-6.243-.15 1.083-.825 1.8-1.542 1.996 1.028-3.064-1.722-6.105-4.722-6.293 1.958 3.854-4.368 6.359-.62 10.893-.588-.026-1.98-.49-2.244-2.1-.656 3.024 1.105 6.873 4.211 7.207-.638-.472-1.96-2.175-1.279-3.944.392.725 1.16 1.363 1.928 1.371-2.812-2.588.81-5.148-.629-7.276 3.263.608 3.15 3.701 2.529 4.745.507.001 1.087-.637 1.333-1.463.749 1.152.109 3.059-.458 3.911.297.102 1.419-.531 1.663-1.193.215 1.806-1.056 3.641-1.885 3.849 1.91 0 5.049-2.861 4.305-7.307zm1.878 3.307c.214-.962.272-1.973.168-3h5.1v3h-5.268zm10.268-7v3h-7v-3h7zm-4 4.019h4v2.981h-4v-2.981zm-6.551 3.981h2.551v2.981h-4.356l.311-.333c.659-.78 1.156-1.68 1.494-2.648zm-1.688-8h4.239v3h-3.52c-.061-.964-.303-2.155-.719-3zm5.239 8h7v3h-7v-3z" /></svg>
      <h3>H.S.E</h3>
    </a>

    <a href="manageusers.php">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <path d="M19.5 15c-2.483 0-4.5 2.015-4.5 4.5s2.017 4.5 4.5 4.5 4.5-2.015 4.5-4.5-2.017-4.5-4.5-4.5zm2.5 5h-5v-1h5v1zm-7.18 4h-14.815l-.005-1.241c0-2.52.199-3.975 3.178-4.663 3.365-.777 6.688-1.473 5.09-4.418-4.733-8.729-1.35-13.678 3.732-13.678 6.751 0 7.506 7.595 3.64 13.679-1.292 2.031-2.64 3.63-2.64 5.821 0 1.747.696 3.331 1.82 4.5z" /></svg>
      <h3>User Management</h3>
    </a>

    <a href="http://poolcar.montego-holdings.com/staff/index.php" class='poolCar'>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <path d="M21.739 10.921c-1.347-.39-1.885-.538-3.552-.921 0 0-2.379-2.359-2.832-2.816-.568-.572-1.043-1.184-2.949-1.184h-7.894c-.511 0-.736.547-.07 1-.742.602-1.619 1.38-2.258 2.027-1.435 1.455-2.184 2.385-2.184 4.255 0 1.76 1.042 3.718 3.174 3.718h.01c.413 1.162 1.512 2 2.816 2 1.304 0 2.403-.838 2.816-2h6.367c.413 1.162 1.512 2 2.816 2s2.403-.838 2.816-2h.685c1.994 0 2.5-1.776 2.5-3.165 0-2.041-1.123-2.584-2.261-2.914zm-15.739 6.279c-.662 0-1.2-.538-1.2-1.2s.538-1.2 1.2-1.2 1.2.538 1.2 1.2-.538 1.2-1.2 1.2zm3.576-6.2c-1.071 0-3.5-.106-5.219-.75.578-.75.998-1.222 1.27-1.536.318-.368.873-.714 1.561-.714h2.388v3zm1-3h1.835c.882 0 1.428.493 2.022 1.105.452.466 1.732 1.895 1.732 1.895h-5.588v-3zm7.424 9.2c-.662 0-1.2-.538-1.2-1.2s.538-1.2 1.2-1.2 1.2.538 1.2 1.2-.538 1.2-1.2 1.2z" /></svg>
      <h3>Pool Car</h3>
    </a>
  </div>

  <footer>Developed by Kingsley</footer>

</body>

</html>