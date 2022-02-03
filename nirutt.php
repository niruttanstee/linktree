<?php
    header("Cache-Control: max-age=31536001");
?>
<?php
const SAFE_TO_RUN = true;
error_reporting(E_ERROR);
$database_table = 'linktree-table';
session_start();
$js_file = "./js/validate.js";
$js_notification = "./js/notification.js";
$database_table = 'linktree-table';
require './php/helper.php';
require './php/database-connect.php';
require "./php/read-form-input.php";
$id = '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/nirutt.css?v=0.3">
    <!-- Meta information -->
    <meta name="title" content="Nirutt Anstee Linktree">
    <meta name="description" content="A linktree website with buttons directing users to information about Nirutt Anstee.">
    <meta name="keywords" content="Linktree, link page, Nirutt Anstee">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="English">
    <title>Nirutt Anstee's Linktree</title>
    <!-- import Google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon-16x16.png">
    <link rel="manifest" href="/images/site.webmanifest">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"></head>
<body>
    <div id="content-block">
        <div id="top-container">
            <img id="profile-picture" src="images/profile-picture-nirutt.png" alt="Memoji image of Nirutt Anstee">
            <p class="profile-link">@niruttanstee</p>
            <p class="motto">It's logical, said the Vulcan 🖖</p>
        </div>
        <div id="links-container">
            <?php
            $sql = "SELECT * FROM $database_table";
            $result = $database->query($sql);
            while ($row = $result->fetch_assoc()) { ?>
            <a class="link-button" href="<?php _e($row, 'link') ?>">
                <img class="button-image" src="/images/<?php _e($row, 'icon') ?>">
                <p class="button-text"><?php _e($row, 'button_description') ?></p>
            </a>
            <?php } ?>
        </div>
    </div>
</body>
</html>