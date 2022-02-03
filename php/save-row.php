<?php
if (!defined('SAFE_TO_RUN')) {
    die(basename(__FILE__)  . ' cannot be executed directly!');
}
/*
save-row.php inserts or update data from (task save) form submission into the database as well as move icon file
into the appropriate folder directory for use.
*/
// check if form submission is to update or insert row
if ($id) {
    // check that icon currently stored can be deleted by getting data corresponding with the ID row icon directory
    $data_prev = [];
    $sql = "SELECT * FROM $database_table WHERE id=?";
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
    // get result of existing row
    if (!$result) {
        die();
    }
    $data_prev = $result->fetch_assoc();
    // delete pre-existing icon file from directory
    $remove_icon = $data_prev['icon'];
    if ($remove_icon) {
        $file_pointer = "./images/". $remove_icon;
        if (!unlink($file_pointer)) {
            echo "Image file cannot be deleted.";
        }
    }
    // SQL instruction to update row
    $sql = "UPDATE $database_table SET button_description=?, link=?, icon=? WHERE id=?";
} else {
    // SQL instruction to insert new row
    $sql = "INSERT INTO $database_table (button_description, link, icon) VALUES (?,?,?)";
}
// prepare statement
if (!($stmt = $database->prepare($sql))) {
    die();
}
// bind statement for either update or insert function
if ($id) {
    if(!($stmt->bind_param('ssss', $data['button_description'], $data['link'], $icon['name'], $id))) {
        die();
    }

} else {
    if (!($stmt->bind_param('sss', $data['button_description'], $data['link'], $icon['name']))) {
        die();
    }
}
// upload new icon file and move to specified directory if file does not have the same name as any file in directory.
require "upload-file.php";
if(!$uploadOk == 0) {
    if ($stmt->execute()) {
        $rows = $stmt->affected_rows;
    } else {
        die();
    }
} else {
    $rows = 0;
}
// notify client
if ($id and $rows == 0) {
    echo '<script>'.
        'send_notification(' . '"Error saving - ' . $reason . '"' . ', false)'.
        '</script>';}
else if (!$id and $rows == 0) {
    echo '<script>'.
        'send_notification(' . '"Error saving - ' . $reason . '"' . ', false)'.
        '</script>';}
else if (!$id and $rows == 1) {
    echo '<script>'.
        'send_notification("Button successfully added.", true)'.
        '</script>';
} else if ($id and $rows == 1) {
    echo '<script>'.
        'send_notification("Button successfully updated.", true)'.
        '</script>';
}

