/* CSD 460 Capstone in Software Development
    Bravo Team: Riley Dorrington, Kelly Bordonhos, Robin Tageant, Christopher Morales
    03/13/2023 - 05/14/2023 */

document.getElementById("contact-form").addEventListener("submit", function (event) {
    event.preventDefault(); // Prevent the form from refreshing the page
    sendEmail(); // Call your sendEmail() function to submit the form data using AJAX
});

function sendEmail() {
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var message = document.getElementById("message").value;

    // Validate input
    if (name == "" || email == "" || message == "") {
        alert("Please fill out all fields.");
        return;
    }
    else {
        // Send the data to send_email.php
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "send_email.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        console.log("name=" + name + "&email=" + email + "&message=" + message);

        // wait 1s for test
        setTimeout(function () {
            xhr.send("name=" + name + "&email=" + email + "&message=" + message);
            alert("Your message has been sent!");
            document.getElementById("contact-form").reset();
        }, 1000);
    }
}