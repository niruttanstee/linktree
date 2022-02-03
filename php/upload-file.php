<?php
if (!defined('SAFE_TO_RUN')) {
    die(basename(__FILE__)  . ' cannot be executed directly!');
}
/*
upload-file.php checks and upload icon files submitted from (task save) to a specified directory.
*/
$reason = '';
$target_dir = "./images/";
$uploadOk = 1;
if (!$icon["name"]) {
    return;
}
// get icon data from read-form.php
$target_file = $target_dir . basename($icon["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// check if file already exists
if (file_exists($target_file)) {
    $reason = "Icon already exists.";
    $uploadOk = 0;
}
// check file size
if ($icon["size"] > 500000) {
    $reason = "Your icon is too large.";
    $uploadOk = 0;
}
// allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "svg"
    && $imageFileType != "gif" ) {
    $reason = "Sorry, only JPG, JPEG, PNG, SVG & GIF icon files are allowed.";
    $uploadOk = 0;
}
// check if $uploadOk is set to 0 by an error
if (!$uploadOk == 0) {
    if (move_uploaded_file($icon["tmp_name"], $target_file)) {
    }
}