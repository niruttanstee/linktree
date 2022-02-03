<div id="main-notification" class=""></div>
<?php
const SAFE_TO_RUN = true;
error_reporting(E_ERROR);
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
    <link rel="stylesheet" href="css/admin-page.css?v=0.3">
    <title>Edit - Nirutt Anstee Linktree</title>
    <script src="<?php _e($js_file) ?>"></script>
    <script src="<?php _e($js_notification) ?>"></script>
    <?php
    if (!empty($data['task'])) {
        $task = $data['task'];
        if (!empty($data['id'])) {
            $id = $data['id'];
        }
        if ($task == "Edit") {
            $id = $_POST['id'];
            require "./php/edit-row.php";
        } else if ($task == "Save") {
            require "./php/validate-form.php";
            if ($valid) {
                require "php/save-row.php";
                $task = '';
                $id = '';
                $data = [];
            }
        } else if ($task == "Del") {
            $id = $_POST['id'];
            $icon_delete = $_POST['icon'];
            require "./php/delete-row.php";
        }
    }
    ?>
    <!-- import Google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"></head>
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon-16x16.png">
    <link rel="manifest" href="/images/site.webmanifest">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"></head>
<body>
    <h1>Nirutt Anstee's Linktree</h1>
    <p class="sub-header">Admin Panel</p>
    <div class="main-container">
        <div class="column-container">
            <p class="column-header">Currently live:</p>
            <?php require "./php/data-table.php"; ?>
        </div>
        <div class="column-container">
            <p class="column-header">Add/Edit buttons:</p>
            <?php require "./php/data-form.php"; ?>
        </div>
        <div class="column-container-button">
            <a class="button-view-live" href="/nirutt.php" target="_blank" >View Live Site</a>
        </div>
    </div>
</body>
<footer>
    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
</footer>
</html>