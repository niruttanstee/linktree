<?php
if (!defined('SAFE_TO_RUN')) {
    die(basename(__FILE__)  . ' cannot be executed directly!');
}
/*
data-form.php displays an input form for fields button_description, link and icon. The form uses regex and
escaping functions to ensure input integrity using validations on the browser using Javascript, standard HTML
requirements and server-side PHP checks.
*/
?>
<form method="POST" action="" enctype="multipart/form-data" onsubmit"return validateForm()">
    <?php
    $rand=rand();
    $_SESSION['rand']=$rand;
    ?>
    <input type="hidden" value="<?php echo $rand; ?>" name="randcheck" />
    <input type="hidden" name="id" value="<?php _e($id) ?>"/>
    <!-- form structure -->
    <!-- button_description input field -->
    <label class="label" for="button_description">Button description:</label>
    <p>
        <input class="input-field"
        type="text"
        id="button_description"
        name="button_description"
        maxlength="50"
        minlength="2"
        value="<?php _e($data, "button_description")?>"
        oninput="validate(event.target)"
        required="true"
        placeholder="My portfolio..."
        />
        <p id="feedback_button_description" class=""></p>
    </p>
    <!-- link (url) input field-->
    <label class="label" for="link">Link (URL):</label>
    <p>
        <input class="input-field"
        type="text"
        id="link"
        name="link"
        value="<?php _e($data, "link")?>"
        oninput="validate(event.target)"
        required="true"
        placeholder="https://myportfolio.com..."
        />
        <p id="feedback_link" class=""></p>
    </p>
    <!-- icon input field -->
    <label class="label" for="icon">Upload icon:</label>
    <p>
        <input class="file-input-field"
        type="file"
        id="icon"
        name="icon"
        value="Upload Image"
        accept="image/png, image/jpeg, .svg"
        required="true"
        />
        <p id="feedback_icon" class=""></p>
    </p>
    <!-- submit button -->
    <p>
        <label for ="save"></label>
        <input class="save-button" type="submit" id="save" name="task" value="Save"/>
    </p>
</form>