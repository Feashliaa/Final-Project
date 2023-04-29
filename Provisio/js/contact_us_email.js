/* CSD 460 Capstone in Software Development
    Bravo Team: Riley Dorrington, Kelly Bordonhos, Robin Tageant, Christopher Morales
    03/13/2023 - 05/14/2023 */

document.getElementById("contact-form").addEventListener("submit", function (event) {
    event.preventDefault(); // Prevent the form from refreshing the page

    var name = document.getElementById("name").value;
    var email = document.getElementById("contact-email").value;
    var message = document.getElementById("message").value;

    // Validate input
    if (name == "" || email == "" || message == "") {
        alert("Please fill out all fields.");
        return;
    } else {
        sendEmail(name, email, message); // Call your sendEmail() function to submit the form data using AJAX
    }


});

function sendEmail(name, email, message) {
    // Send the data to send_email.php
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "send_email.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // wait 1s for test
    setTimeout(function () {
        xhr.send("name=" + name + "&email=" + email + "&message=" + message);
        alert("Your message has been sent!");
        document.getElementById("contact-form").reset();
    }, 1000);
}