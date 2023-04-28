/* CSD 460 Capstone in Software Development
    Bravo Team: Riley Dorrington, Kelly Bordonhos, Robin Tageant, Christopher Morales
    03/13/2023 - 05/14/2023 */

function showNotification() {
    console.log("Showing notification");

    console.log("Logged in: " + localStorage.getItem("loggedIn"));

    // Check if the user is logged in
    if (localStorage.getItem("loggedIn") === "true") {
        // User is logged in, show notification
        var notification = document.getElementById("notification");
        notification.innerHTML = "You have successfully logged in!";
        notification.style.setProperty('--notification-background-color', 'rgb(0, 200, 83)');
        notification.classList.add("show"); // add the show class
        notification.style.visibility = "visible";
        // Hide the notification after 3 seconds
        setTimeout(function () {
            notification.classList.remove("show"); // remove the show class
        }, 3000);

        // Remove the loggedIn item from local storage
        localStorage.removeItem("loggedIn");
    }
}

function togglePasswordVisibility() {
    var passwordInput = document.getElementById("password-login");
    var showPasswordCheckbox = document.getElementById("showPasswordCheckbox");

    if (showPasswordCheckbox.checked) {
        passwordInput.type = "text";
        passwordInput.classList.add("text");

    } else {
        passwordInput.type = "password";
        passwordInput.classList.remove("text");
    }
}



function showNotificationWrongPassword() {
    console.log("Showing notification");
    // User entered wrong password, show notification
    var notification = document.getElementById("notification");
    notification.innerHTML = "Wrong Email or Password!";
    notification.style.setProperty('--notification-background-color', 'red');
    notification.classList.add("show"); // add the show class
    notification.style.visibility = "visible";
    // Hide the notification after 3 seconds
    setTimeout(function () {
        notification.classList.remove("show"); // remove the show class
    }, 3000);
    // Remove the loggedIn item from local storage
    localStorage.removeItem("loggedIn");
}

function showNotificationNoAccount() {
    console.log("Showing notification");
    // User entered wrong password, show notification
    var notification = document.getElementById("notification");
    notification.innerHTML = "Account Doesn't Exist!";
    notification.style.setProperty('--notification-background-color', 'red');
    notification.classList.add("show"); // add the show class
    notification.style.visibility = "visible";
    // Hide the notification after 3 seconds
    setTimeout(function () {
        notification.classList.remove("show"); // remove the show class
    }, 3000);
    // Remove the loggedIn item from local storage
    localStorage.removeItem("loggedIn");
}

function login(event) {
    // check if all fields are filled
    if (checkFieldsLogin() == false) {
        console.log("Error: All fields are required");
        event.preventDefault();
        return;
    }

    const email = document.getElementById("email-login").value;
    const password = document.getElementById("password-login").value;

    console.log("Email: " + email);
    console.log("Password: " + password);

    event.preventDefault(); // prevent the default form submission behavior
    var xhr = new XMLHttpRequest(); // create a new XMLHttpRequest object
    xhr.open('POST', '../php/signin.php'); // open a POST request to the login.php file
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // set the request header
    xhr.send("email=" + email + "&password=" + password); // send the email and password to the login.php file
    console.log("Sent data to signin.php");

    xhr.onload = function () {
        console.log("Response received");
        if (xhr.status === 200) {
            try {
                var response = JSON.parse(xhr.responseText);
                if (response.status === "success") {
                    console.log(response.message);

                    // set the loggedIn item in local storage to true
                    localStorage.setItem("loggedIn", "true");

                    // show notification
                    showNotification();

                    // redirect to the index page after 2 seconds
                    setTimeout(function () {
                        window.location.href = "index.php";
                    }, 2000);
                } else {
                    console.log(response.message);
                    if (response.message === "Incorrect Password!") {
                        showNotificationWrongPassword();
                    }
                    else if (response.message === "Email Does Not Exist!") {
                        showNotificationNoAccount();
                    }
                }
            } catch (e) {
                console.log("Error: " + e.message);
            }
        } else {
            console.log("Error: " + xhr.status);
        }
    };
}

document.addEventListener("DOMContentLoaded", function () {

    // first check if the page has an email input field
    if (document.getElementById("email") != null) {
        // add event listener to the email input field

        document.getElementById("email").addEventListener("click", function () {
            document.getElementById("email").classList.remove("email-error");
            document.getElementById("email").placeholder = "example@domain.com";
        });
    }
});
