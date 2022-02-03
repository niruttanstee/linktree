<?php
if (!defined('SAFE_TO_RUN')) {
    die(basename(__FILE__)  . ' cannot be executed directly!');
}
/*
edit-row.php fetches a row from the database specified by the (task edit) form submission and displays it on the
data-form.php field inputs with an active hidden ID key ready for task save form submission.
*/
// initialise $data array
$data = [];
$sql = "SELECT * FROM $database_table WHERE id=?";
// prepare statement
if (!($stmt = $database->prepare($sql))) {
    die();
}
// bind insert parameters
if (!($stmt->bind_param('s', $id))) {
    die();
}
// execute SQL
if ($stmt->execute()) {
    $result = $stmt->get_result();
} else {
    die();
}
// get result
if (!$result) {
    die();
}
$data = $result->fetch_assoc();