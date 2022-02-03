<?php
if (!defined('SAFE_TO_RUN')) {
    die(basename(__FILE__)  . ' cannot be executed directly!');
}
/*
read-form.php reads all $_POST and $_FILES data from form submission and converts it into an array of key/value pairs.
*/
$data = [];
// read each key and value from the submitted form and convert into array
foreach ($_POST as $key => $value) {
    $data[$key] = $value;
}
// read file information from file submitted
if ($_FILES) {
    $icon = $_FILES["icon"];
}