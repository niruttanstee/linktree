<?php
if (!defined('SAFE_TO_RUN')) {
    die(basename(__FILE__)  . ' cannot be executed directly!');
}
/*
delete-row.php deletes the associated row in the database instructed by (task delete) form submission.
*/
$sql = "DELETE FROM $database_table WHERE id=?";
// prepare statement
if (!($stmt = $database->prepare($sql))) {
    die();
}
// bind statement
if (!$stmt->bind_param('s', $id)) {
    die();
}
// execute statement
if ($stmt->execute()) {
    $rows = $stmt->affected_rows;
} else {
    die();
}
// delete associated icon file
$file_pointer = "./images/". $icon_delete;
if (!unlink($file_pointer) and $rows == 0) {
    echo "NOT REMOVED";
    echo '<script>'.
        'send_notification("Image file cannot be deleted. Button has not been removed.", false)'.
        '</script>';
} else {
    echo '<script>'.
        'send_notification("Button successfully removed.", true)'.
        '</script>';
}