<?php
if (!defined('SAFE_TO_RUN')) {
    die(basename(__FILE__)  . ' cannot be executed directly!');
}
/*
helper.php contains conversion functions for inputs using htmlspecialchars.
This helps prevent malicious data stored in the database from running scripts on HTML displayed on the browser.
*/
function _x($variable)
{
    return htmlspecialchars($variable);
}

function _e($variable, $key = null)
{
    if (is_array($variable) and $key != null) {
        if (!empty($variable[$key])) {
            echo _x($variable[$key]);
        }
    } else {
        echo _x($variable);
    }
}
