<?php
  require('../connect.php');
  require('../functions/suggestionboxFunctions.php');

  echo getSuggestions($dbc);
 