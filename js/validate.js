function validate(inputElement) {
    /* validate function
       validates (client-side) form field on-input with regex parameters and provide a warning for failure.
    */
    console.log("validate() called for inputElement:", inputElement);
    if (!inputElement) {
        alert("validate() called with no input element");
        return false;
    }
    /* Check for matching feedback elements, otherwise alert */
    let feedbackElement = document.getElementById("feedback_" + inputElement.id);
    if (!feedbackElement) {
        alert("validate() called but there is no element to provide a feedback input.");
        return false;
    }
    let pattern;
    let feedback;

    if (inputElement.id == "button_description") {
        // check that it contains only text, number and spaces (symbols are not allowed)
        pattern = /^[a-zA-Z0-9 ]*$/;
        feedback = "Please enter only letters, numbers and spaces.";
    }
    if (inputElement.id == "link") {
        // check that the link is valid with a secure html tag
        pattern = /^(https:)/;
        feedback = "Please enter a valid secure URL. Secure URL starts with https."
    }
    // check that pattern is implemented
    if (!pattern) {
        alert("Pattern is not implemented for this validation.")
        return false;
    }
    let value = inputElement.value;
    let valid = true;
    if (pattern.test(value)) {
        feedback = "Valid";
        console.log("feedback valid")
        feedbackElement.className = "valid";
    } else {
        feedbackElement.className = "invalid";
        console.log("feedback invalid")

        valid = false;
    }
        // display feedback
        feedbackElement.innerText = feedback;
        return valid;

}

function validateForm() {
    /* validateForm function
       calls validate function (client-side) during (task save) form submission. Rejects invalid input before sending
       data to process server-side.
    */
    let valid = true;
    valid = valid && validate(document.getElementById("button_description"));
    valid = valid && validate(document.getElementById("link"));
    if (!valid) {
        alert("Form data is invalid - please check and try again!");
    }
    return valid;
}