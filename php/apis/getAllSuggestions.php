<?php
require('../connect.php');
require('../functions/viewSuggestionsFunctions.php');

echo getAllSuggestions($dbc);
