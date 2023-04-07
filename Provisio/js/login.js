function checkFieldsLogin() {
    let email = document.getElementById("email").value;
    let password = document.getElementById("password").value;

    console.log("Email: " + email);
    console.log("Password: " + password);

    if (email != "" && password != "") {
        return true;
    }
    else {
        if (email == "") {
            document.querySelector("#email_input span").classList.add("error");
            document.getElementById("email").classList.add("email-error");
            document.getElementById("email").placeholder = "Email is required";
        }
        if (password == "") {
            document.querySelector("#password_input span").classList.add("error");
            document.getElementById("password").placeholder = "Password is required";
        }
        return false;
    }
}

function login(event) {
    // check if all fields are filled
    if (checkFieldsLogin() == false) {
        console.log("Error: All fields are required");
        event.preventDefault();
        return;
    }

    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;

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
                    // send you to index.php
                    window.location.href = "../php/index.php";
                } else {
                    console.log(response.message);
                    if (response.message === "Incorrect password") {
                        alert("Incorrect password");
                    }
                    // keep you on the login page
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
    document.getElementById("email").addEventListener("click", function () {
        document.getElementById("email").classList.remove("email-error");
        document.getElementById("email").placeholder = "example@domain.com";
    });
});
