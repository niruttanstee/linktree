<?php
if (!defined('SAFE_TO_RUN')) {
    die(basename(__FILE__)  . ' cannot be executed directly!');
}
/*
validate.php validates $_POST information by comparing it with regex parameters. If valid proceed to save-row.php.
*/
$valid = true;
$feedback =[];
// check button_description
$value = $data['button_description'];
$regex = "/^[a-zA-Z0-9 ]*$/";
if (!preg_match($regex, $value)) {
    $feedback['button_description'] = "Description should only contain letters, numbers and spaces. Not symbols.";
    $valid = false;
}
if (strlen($value) < 2 || strlen($value) > 50) {
    $feedback['button_description'] = "Description should be above 2 and no more than 50 letters.";
    $valid = false;
}

// check link
$value = $data['link'];
$regex = "/^(https:)/";
if (!preg_match($regex, $value)) {
    $feedback['button_description'] = "Description must be more than 2 and less than 50 letters.";
    $valid = false;
}
if (!$valid) {
    echo '<script>'.
        'send_notification("Invalid input. - Please check and try again.", false)'.
        '</script>';
}