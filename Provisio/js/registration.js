/* CSD 460 Capstone in Software Development
    Bravo Team: Riley Dorrington, Kelly Bordonhos, Robin Tageant, Christopher Morales
    03/13/2023 - 05/14/2023 */

const passwordInput = document.getElementById("password");
const password_circle = document.getElementById("password_circle");
const passwordCriteriaBox = document.getElementById("password-criteria-box");
const closePasswordCriteriaBox = document.getElementById("close-password-criteria-box");
let isPasswordCriteriaBoxOpen = false;

// Show the password criteria box when the user mouseovers the password circle
password_circle.addEventListener("mouseover", function () {
    passwordCriteriaBox.style.display = "block"; // Show the password criteria box
    isPasswordCriteriaBoxOpen = true;

    if (window.innerWidth <= 540 && passwordCriteriaBox.style.display == "block") {
        console.log("Condition met");
        document.getElementById("signup-login_button").style.width = "20%";
        document.getElementById("signup-login_button").style.marginLeft = "30%";
        document.getElementById("signup-login_button").style.marginTop = "-10%";
    }
});

// on mouseout, hide the password criteria box if it is not open

password_circle.addEventListener("mouseout", function () {
    passwordCriteriaBox.style.display = "none"; // Show the password criteria box
    isPasswordCriteriaBoxOpen = false;

    if (window.innerWidth <= 540) {
        document.getElementById("signup-login_button").style.width = "80%";
        document.getElementById("signup-login_button").style.marginLeft = "0";
    }
});

// Hide the password criteria box when the user clicks outside the box
window.addEventListener("click", function (event) {
    if (event.target != passwordInput && event.target != passwordCriteriaBox && event.target != closePasswordCriteriaBox) {

        passwordCriteriaBox.style.display = "none"; // Hide the password criteria box
        isPasswordCriteriaBoxOpen = false;

        if (window.innerWidth <= 540) {
            document.getElementById("signup-login_button").style.width = "80%";
            document.getElementById("signup-login_button").style.marginLeft = "0";
        }
    }
});

function updateLayout() {
    console.log("Layout update function called");

    const passwordCriteriaBox = document.getElementById("password-criteria-box");

    // if window is less than 540px wide
    // and the password criteria box is open
    if (window.innerWidth <= 540 && passwordCriteriaBox.style.display === "block") {
        document.getElementById("signup-login_button").style.width = "20%";
        document.getElementById("signup-login_button").style.marginLeft = "30%";
        document.getElementById("signup-login_button").style.marginTop = "-10%";
    }
    else if (window.innerWidth <= 540) { // if window is less than 540px wide
        document.getElementById("signup-login_button").style.width = "80%";
        document.getElementById("signup-login_button").style.marginLeft = "0";
    }
    else { // if window is greater than 540px wide
        document.getElementById("signup-login_button").style.width = "25%";
        document.getElementById("signup-login_button").style.marginLeft = "0%";
        document.getElementById("signup-login_button").style.marginTop = "0%";
    }
}

document.addEventListener("DOMContentLoaded", function () {
    // Call the updateLayout function when the page loads
    updateLayout();

    // Also call the updateLayout function when the window is resized
    window.addEventListener("resize", updateLayout);
});

passwordInput.addEventListener("input", function () {

    // get the text from the password input field
    const password = passwordInput.value;

    // get the password criteria box elements
    const passwordCriteriaBox = document.getElementById("password-criteria-box");
    const passwordCriteriaBoxParagraphs = passwordCriteriaBox.getElementsByTagName("p");

    // get the password criteria box paragraph elements
    const passwordLengthParagraph = passwordCriteriaBoxParagraphs[0];
    const passwordUppercaseLetterParagraph = passwordCriteriaBoxParagraphs[1];
    const passwordLowercaseLetterParagraph = passwordCriteriaBoxParagraphs[2];
    const passwordNumberParagraph = passwordCriteriaBoxParagraphs[3];

    // check if the password is at least 8 characters long
    if (password.length >= 8) {
        passwordLengthParagraph.style.color = "green";
    }
    else {
        passwordLengthParagraph.style.color = "red";
    }

    // check if the password includes at least one uppercase letter
    if (/[A-Z]/.test(password)) {
        passwordUppercaseLetterParagraph.style.color = "green";
    }
    else {
        passwordUppercaseLetterParagraph.style.color = "red";
    }

    // check if the password includes at least one lowercase letter
    if (/[a-z]/.test(password)) {
        passwordLowercaseLetterParagraph.style.color = "green";
    }
    else {
        passwordLowercaseLetterParagraph.style.color = "red";
    }

    // check if the password includes at least one number
    if (/[0-9]/.test(password)) {
        passwordNumberParagraph.style.color = "green";
    }
    else {
        passwordNumberParagraph.style.color = "red";
    }

    // check if all the password criteria have been met
    if (password.length >= 8 && /[A-Z]/.test(password) && /[a-z]/.test(password) && /[0-9]/.test(password)) {
        passwordInput.style.borderColor = "green";
    }

});


// From User: Legendary_Linux on Stack Overflow
// Original post: https://stackoverflow.com/questions/30058927/format-a-phone-number-as-a-user-types-using-pure-javascript


// Format the phone number as the user types
const isNumericInput = (event) => {
    const key = event.keyCode; // Get the key code of the pressed key

    /*
    Key codes:
    0-9: 48-57
    numpad 0-9: 96-105
    */

    return ((key >= 48 && key <= 57) || // Allow number line
        (key >= 96 && key <= 105) // Allow number pad
    );
};

// Check if the pressed key is a modifier key (e.g. Ctrl, Alt, Shift, etc.)
const isModifierKey = (event) => {
    const key = event.keyCode; // Get the key code of the pressed key

    /*
    Key codes:
    Shift: 16
    Ctrl: 17
    Alt: 18
    Meta: 91 (Windows key or Cmd on Mac)
    */

    return (event.shiftKey === true || key === 35 || key === 36) || // Allow Shift, Home, End
        (key === 8 || key === 9 || key === 13 || key === 46) || // Allow Backspace, Tab, Enter, Delete
        (key > 36 && key < 41) || // Allow left, up, right, down
        (
            // Allow Ctrl/Command + A,C,V,X,Z
            (event.ctrlKey === true || event.metaKey === true) &&
            (key === 65 || key === 67 || key === 86 || key === 88 || key === 90)
        )
};

// Restrict input to digits and '-' by using a regular expression filter.
const enforceFormat = (event) => {
    // Input must be of a valid number format or a modifier key, and not longer than ten digits
    if (!isNumericInput(event) && !isModifierKey(event)) {
        event.preventDefault();
    }
};

// Format to (123) 456-7890
const formatToPhone = (event) => {
    if (isModifierKey(event)) { return; }

    const target = event.target; // Get the target element
    const phone_number = event.target.value.replace(/\D/g, '').substring(0, 10); // First ten digits of input only
    const start = phone_number.substring(0, 3); // First three digits
    const middle = phone_number.substring(3, 6); // Middle three digits
    const last = phone_number.substring(6, 10); // Last four digits

    // If the length is greater than 6, we need to insert the dash between the middle and last digits
    // If the length is greater than 3, we need to insert the closing parenthesis after the area code
    // If the length is greater than 0, we need to insert the opening parenthesis after the first digit
    if (phone_number.length > 6) { target.value = `(${start}) ${middle}-${last}`; }
    else if (phone_number.length > 3) { target.value = `(${start}) ${middle}`; }
    else if (phone_number.length > 0) { target.value = `(${start}`; }
};

const inputElement = document.getElementById('phone');
inputElement.addEventListener('keydown', enforceFormat);
inputElement.addEventListener('keyup', formatToPhone);

// End of code from https://stackoverflow.com/questions/30058927/format-a-phone-number-as-a-user-types-using-pure-javascript




// Check if all fields are filled, and if the password is valid
function checkPasswordField() {
    // get the text from the password input field
    const password = document.getElementById("password").value;

    // check if all the password criteria have been met
    if (password.length >= 8 && /[A-Z]/.test(password) && /[a-z]/.test(password) && /[0-9]/.test(password)) {
        const confirmPassword = document.getElementById("confirm_password").value;

        // check if the password and confirm password fields match
        if (password == confirmPassword) {
            return true;
        }
    }
    else {
        return false;
    }
}

function checkFields() {
    // get the text from the firstname, lastname, email, and password input fields
    const firstname = document.getElementById("firstname").value;
    const lastname = document.getElementById("lastname").value;
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confirm_password").value;

    // check if all fields are filled
    if (firstname != "" && lastname != "" && email != "" && password != "" && confirmPassword != "") {
        if (checkPasswordField() == true) {
            // remove error class from all span elements
            document.querySelectorAll("span").forEach(span => span.classList.remove("error"));

            return true;
        }
    } else {
        // add error class to the span elements that correspond to empty input fields
        if (firstname == "") {
            document.querySelector("#firstName span").classList.add("error");
            document.getElementById("firstname").placeholder = "First name is required";
        }
        if (lastname == "") {
            document.querySelector("#lastName span").classList.add("error");
            document.getElementById("lastname").placeholder = "Last name is required";
        }
        if (email == "") {
            document.querySelector("#email_input span").classList.add("error");
            document.getElementById("email").classList.add("email-error");
            document.getElementById("email").placeholder = "Email is required";

        }
        if (password == "") {
            document.querySelector("#password_input span").classList.add("error");
            document.getElementById("password").placeholder = "Password is required";
        }
        if (confirmPassword == "") {
            document.querySelector("#password_confirm span").classList.add("error");
            document.getElementById("confirm_password").placeholder = "Password is required";
        }

        return false;
    }
}

// on window resize, check the width of the window
window.addEventListener("resize", function () {
    // if screen is less than equal to 540px
    if (window.innerWidth <= 540) {
        // make the input field 80% of the width of the parent element
        document.getElementById("password").style.width = "80%";
        document.getElementById("confirm_password").style.width = "80%";
    }
    else {
        // make the input field 100% of the width of the parent element
        document.getElementById("password").style.width = "100%";
        document.getElementById("confirm_password").style.width = "100%";
    }
});


function togglePasswordVisibility() {
    var passwordInput = document.getElementById("password");
    var passwordConfirmInput = document.getElementById("confirm_password");
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        passwordInput.classList.add("text");

        // if screen is less than equal to 540px
        if (window.innerWidth <= 540) {
            // make the input field 80% of the width of the parent element
            passwordInput.style.width = "80%";
        }
        else {
            // make the input field 50% of the width of the parent element
            passwordInput.style.width = "100%";
        }

    } else {
        passwordInput.type = "password";
        passwordInput.classList.remove("text");
    }
    if (passwordConfirmInput.type === "password") {
        passwordConfirmInput.type = "text";
        passwordConfirmInput.classList.add("text");
        // if screen is less than equal to 540px
        if (window.innerWidth <= 540) {
            // make the input field 80% of the width of the parent element
            passwordConfirmInput.style.width = "80%";
        }
        else {
            // make the input field 50% of the width of the parent element
            passwordConfirmInput.style.width = "100%";
        }
    } else {
        passwordConfirmInput.type = "password";
        passwordConfirmInput.classList.remove("text");
    }
}


function validateEmail(email) {
    const regex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
    return regex.test(email);
}

// "Send" the user's information to the server, this is just for testing purposes and will be replaced with
// a do post to a java servlet in the future
function signup(event) {

    // check if all fields are filled
    if (checkFields() == false) {
        return;
    }

    // get the text from the firstname, lastname, email, and password input fields
    const firstname = document.getElementById("firstname").value;
    const lastname = document.getElementById("lastname").value;
    const email = document.getElementById("email").value;
    const phone = document.getElementById("phone").value;
    const password = document.getElementById("password").value;

    // check if the email is valid
    if (!validateEmail(email)) {
        // clear the email input field
        document.getElementById("email").value = "";
        document.querySelector("#email_input span").classList.add("error");
        document.getElementById("email").classList.add("email-error");
        document.getElementById("email").placeholder = "Invalid email";
        return;
    }

    // for testing purposes, just console log the user's information
    console.log("Firstname: " + firstname);
    console.log("Lastname: " + lastname);
    console.log("Email: " + email);
    if (phone != "") {
        console.log("Phone: " + phone);
    }
    console.log("Password: " + password);

    event.preventDefault(); // prevent the default form submission behavior
    var xhr = new XMLHttpRequest(); // create a new XMLHttpRequest object
    xhr.open('POST', '../php/signup.php'); // open a POST request to the signup.php file
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // set the request header
    var formData = new FormData(document.querySelector('form')); // create a new FormData object
    xhr.send(new URLSearchParams(formData)); // send the form data to the signup.php file

    console.log("Sent");

    xhr.onload = function () {
        console.log("Response received");
        if (xhr.status === 200) {
            try {
                var response = JSON.parse(xhr.responseText);
                if (response.status === "success") {
                    console.log(response.message);
                    // redirect to the index page
                    window.location.href = "../php/index.php";
                } else {
                    console.log(response.message);
                    if (response.message === "Email already exists") {
                        // alert the user that the email already exists
                        alert("Email already exists");
                        // clear all input fields
                        document.getElementById("firstname").value = "";
                        document.getElementById("lastname").value = "";
                        document.getElementById("email").value = "";
                        document.getElementById("phone").value = "";
                        document.getElementById("password").value = "";
                        document.getElementById("confirm_password").value = "";

                        // remove error class from all span elements
                        document.querySelectorAll("span").forEach(span => span.classList.remove("error"));

                        document.getElementById("firstname").placeholder = "";
                        document.getElementById("lastname").placeholder = "";
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


// if click into email_input, remove the error class
document.getElementById("email").addEventListener("click", function () {
    document.getElementById("email").classList.remove("email-error");
    document.getElementById("email").placeholder = "example@domain.com";
});