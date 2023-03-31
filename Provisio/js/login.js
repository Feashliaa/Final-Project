function checkFieldsLogin() {
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;

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
    var formData = new FormData(document.querySelector('form')); // create a new FormData object
    xhr.send(new URLSearchParams(formData)); // send the form data to the login.php file

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
