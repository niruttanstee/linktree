<?php
if (!defined('SAFE_TO_RUN')) {
    die(basename(__FILE__)  . ' cannot be executed directly!');
}
/*
data-table.php displays data from the database and structures it into individual buttons. For each row of a database
counts as one button.
*/
?>
<?php
//  connect to database and get all rows
$sql = "SELECT * FROM $database_table";
$result = $database->query($sql);
$count = 0;
//  create button structure with data from database
while ($row = $result->fetch_assoc()) { ?>
    <div class="display-button">
        <div class="button-count">
            <?php _e($count) ?>
        </div>
        <a class="button-container" href="<?php _e($row, 'link') ?>">
            <img class="button-image-display" src="/images/<?php _e($row, 'icon') ?>">
            <p class="button-text-display"><?php _e($row, 'button_description') ?></p>
        </a>
        <div class="button-action-container">
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
                <input type="hidden" name="id" value="<?php _e($row, 'id')?>"/>
                <input type="hidden" name="icon" value="<?php _e($row, 'icon')?>"/>
                <input class= "button-action-edit" type="submit" name="task" value="Edit"/>
                <input class= "button-action-delete" type="submit" name="task" value="Del"/>
            </form>
        </div>
    </div>
    <?php $count++ ?>
<?php
}
// check if database is empty and let client know
if ($count == 0) {
    echo "No buttons to display.";
}
?>
