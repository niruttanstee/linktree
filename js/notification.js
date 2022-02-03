function send_notification(message, valid) {
    /* send_notification
       sends a (client-side) popup notification when called with two variable options, true or false validity.
    */
    let mainNotification = document.getElementById("main-notification");
    if (valid) {
        mainNotification.className = "main_notification_valid";
    } else {
        mainNotification.className = "main_notification_invalid";
    }
    mainNotification.innerHTML = '' +
        `<img class= "notification-icon" src="/images/icons8-info.svg">\n` +
        `<p class="notification-message">${message}</p>` +
        `<a class="notification-close" href="#" onclick="Hide(event.target);">[X]</a>`;
}
function Hide(HideID) {
    /* Hide
       (client-side) hides the send_notification div upon clicking the close button.
    */
    HideID.parentElement.style.display = "none";
}