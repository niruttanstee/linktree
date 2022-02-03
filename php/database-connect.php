<?php
if (!defined('SAFE_TO_RUN')) {
    die(basename(__FILE__)  . ' cannot be executed directly!');
}
/*
database-connect.php connects to the database using credentials set in credentials.php and creates an object to be
used in other PHP functions.
*/
require "credentials.php";
// connect to database
if (!$database = new mysqli($database_host, $database_user, $database_password, $database_name)) {
    echo "Error with database connection";
}