<?php
  require('php/connect.php');
  require_once('php/functions.php');
  $username = getLoggedInUser($dbc);

  $header = "
    <header class='header'>
      <div class='logoSection'>
       
        <a href='index.php'> 
        <div class='LOGO'>
          <img src='./images/icon.jpg'/>
          Montego Portal
        </div>
        </a>
        <a href='index.php' class='homeIcon'> 
          <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'>
            <path d='M20 7.093v-5.093h-3v2.093l3 3zm4 5.907l-12-12-12 12h3v10h7v-5h4v5h7v-10h3zm-5 8h-3v-5h-8v5h-3v-10.26l7-6.912 7 6.99v10.182z'/></svg> 
        </a>
      </div>
      <div class='accountSection'>
        <div class='user'>$username</div>
        <a href='login.php' class='button'>Logout</a>
      </div>
    </header>
  ";
