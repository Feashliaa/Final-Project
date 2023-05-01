/* CSD 460 Capstone in Software Development
    Bravo Team: Riley Dorrington, Kelly Bordonhos, Robin Tageant, Christopher Morales
    03/13/2023 - 05/14/2023 */

function checkLogin() {

    // get the url of the current page
    let url = window.location.href;
    if (document.querySelector('#login-btn').textContent.trim() == "Login") {
        // check if the url contains "php/
        if (url.includes("php/")) {
            window.location.href = "login.php"
        } else {
            window.location.href = "provisio/php/login.php"
        }

    } else if (document.querySelector('#login-btn').textContent.trim() == "Logout") {
        // check if the url contains "php/
        if (url.includes("php/")) {
            window.location.href = "logout.php"
        } else {
            window.location.href = "provisio/php/logout.php"
        }
    }
}





async function setupDateValidation() {

    // check if there is reservation data in local storage
    const reservation = JSON.parse(localStorage.getItem("reservation"));

    // get the checkin and checkout input elements
    const checkinInput = await getElementByIdAsync("checkin");
    const checkoutInput = await getElementByIdAsync("checkout");

    let today = new Date();
    console.log(today);
    let timezoneOffset = today.getTimezoneOffset() * 60000; // Convert minutes to milliseconds
    console.log(timezoneOffset);
    let todayUTC = today.getTime() - timezoneOffset;
    console.log(todayUTC);
    let todayISO = new Date(todayUTC).toISOString().split("T")[0];
    console.log(todayISO);

    // Set the minimum date for checkin to be today
    checkinInput.min = todayISO;
    checkinInput.value = todayISO;

    // Set the minimum date for checkout to be the same as checkin
    checkoutInput.min = checkinInput.value;

    // set the checkout input to the same value as the checkin input
    checkinInput.addEventListener("input", () => {
        checkoutInput.min = checkinInput.value;
        checkoutInput.disabled = false;
        if (checkoutInput.value < checkinInput.value) {
            checkoutInput.value = checkinInput.value;
        }
    });

    // validate the checkout date
    checkoutInput.addEventListener("input", () => {
        if (checkoutInput.value < checkinInput.value) {
            checkoutInput.setCustomValidity("Checkout date must be after checkin date.");
        } else {
            checkoutInput.setCustomValidity("");
        }
    });
}


function getElementByIdAsync(id) {
    return new Promise((resolve) => {
        const element = document.getElementById(id);
        if (element) {
            resolve(element);
        } else {
            document.addEventListener("DOMContentLoaded", () => {
                resolve(document.getElementById(id));
            });
        }
    });
}

function checkFieldsLogin() {
    let email = document.getElementById("email-login").value;
    let password = document.getElementById("password-login").value;

    if (email != "" && password != "") {
        return true;
    }
    else {
        if (email == "") {
            document.querySelector("#email_input span").classList.add("error");
            document.getElementById("email-login").classList.add("email-error");
            document.getElementById("email-login").placeholder = "Email is required";
        }
        if (password == "") {
            document.querySelector("#password_input span").classList.add("error");
            document.getElementById("password-login").placeholder = "Password is required";
        }
        return false;
    }
}

function checkFieldsLoginDropDown() {
    let email = document.getElementById("email").value;
    let password = document.getElementById("password").value;

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

document.addEventListener("DOMContentLoaded", () => {

    // Listen for the form submission
    document.getElementById('signin-form').addEventListener('submit', function (event) {
        // check if all fields are filled
        if (checkFieldsLoginDropDown() == false) {
            console.log("Error: All fields are required");
            event.preventDefault();
            return;
        }

        const email = document.getElementById("email").value;
        const password = document.getElementById("password").value;

        event.preventDefault(); // prevent the default form submission behavior
        var xhr = new XMLHttpRequest(); // create a new XMLHttpRequest object
        xhr.open('POST', 'provisio/php/signin.php'); // open a POST request to the login.php file
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

                        // Redirect to the appropriate page provisio/php/index.php
                        if (window.location.pathname.includes("php/")) {
                            window.location.href = "index.php";
                        } else {
                            window.location.href = "provisio/php/index.php";
                        }
                        
                    } else {
                        // Display the error message for 2s
                        document.getElementById('error-message').textContent = response.message;
                        document.getElementById('error-message').style.display = 'block';
                        document.getElementById('error-message').style.color = 'red';
                        setInterval(function () {
                            document.getElementById('error-message').style.display = 'none';
                        }, 2000);
                    }
                } catch (e) {
                    console.log("Error: " + e.message);
                }
            } else {
                console.log("Error: " + xhr.status);
            }
        };
    });

    const loginBtn = document.querySelector('.login-btn');
    const test = document.querySelector('.test');

    loginBtn.addEventListener('mouseover', () => {

    });

    loginBtn.addEventListener('mouseout', () => {

    });





    // check if the page is reservation.php
    if (window.location.pathname.includes("reservation.php")) {
        // Check if there is reservation data in local storage
        const reservation = JSON.parse(localStorage.getItem("reservation"));
        if (reservation !== null) {
            // Reservation data exists, fill in the form fields
            document.getElementById("location").value = reservation.location;
            document.getElementById("guest").value = reservation.guestCount;

            // Get the room selection, 
            // It would have been changed to only the room name, and not the room name and price
            // So we need to add the price back to the room name so it will be selected
            let room = reservation.roomSelected;
            switch (room) {
                case "Double Full Beds":
                    room = "Double Full Beds - $115.50/night";
                    break;
                case "Queen":
                    room = "Queen - $131.25/night";
                    break;
                case "Double Queen Beds":
                    room = "Double Queen Beds - $157.50/night";
                    break;
                case "King":
                    room = "King - $173.25/night";
                    break;
                default:
                    room = "Double Full Beds - $115.50/night";
                    break;
            }
            document.getElementById("room").value = room;

            document.getElementById("checkin").value = reservation.checkInDate;

            document.getElementById("checkout").value = reservation.checkOutDate;

            // Set the checkbox based on the value of the amenity
            document.getElementById("wifi").checked = reservation.amenities.wifi;
            document.getElementById("breakfast").checked = reservation.amenities.breakfast;
            document.getElementById("parking").checked = reservation.amenities.parking;

            // Enable the submit-btn
            document.getElementById("submit-btn").disabled = false;
        }
    }
    setupDateValidation();
    setupValidation();
});


async function setupValidation() {
    const submitBtn = await getElementByIdAsync("submit-btn");

    // location chosen
    const locationInput = await getElementByIdAsync("location");

    // number of guests
    const guestInput = await getElementByIdAsync("guest");

    // Dates
    const checkinInput = await getElementByIdAsync("checkin");
    const checkoutInput = await getElementByIdAsync("checkout");

    function validateForm() {
        if (locationInput.value === "" ||
            guestInput.value === "" ||
            checkinInput.value === "" ||
            checkoutInput.value === "") {
            submitBtn.disabled = true;
        } else {
            submitBtn.disabled = false;
        }
    }

    // add event listeners to the inputs
    locationInput.addEventListener("input", validateForm);
    guestInput.addEventListener("input", validateForm);
    checkinInput.addEventListener("input", validateForm);
    checkoutInput.addEventListener("input", validateForm);

    submitBtn.addEventListener("click", () => {

        // get the values of the inputs
        const location = document.getElementById("location").value;
        const guestCount = document.getElementById("guest").value;
        const roomSelect = document.getElementById("room").value;
        console.log(roomSelect);

        // Split the selected value by the ' - ' delimiter
        let selectedRoom = roomSelect.split(" - ");

        // Extract the room name from the first element of the array
        selectedRoom = selectedRoom[0];

        console.log(selectedRoom);

        // Check if the selected room is valid
        const validRooms = ["Double Full Beds", "Queen", "Double Queen Beds", "King"];
        if (!validRooms.includes(selectedRoom)) {
            // If the selected room is not valid, set it to the default room (Double Full Beds)
            selectedRoom = "Double Full Beds";
        }


        const checkInDate = document.getElementById("checkin").value;
        const checkOutDate = document.getElementById("checkout").value;

        // get the values of the checkboxes, if they exist
        const wifiCheckbox = document.querySelector('input[name="amenities"][value="wifi"]');
        const wifi = wifiCheckbox ? wifiCheckbox.checked : false;
        const breakfastCheckbox = document.querySelector('input[name="amenities"][value="breakfast"]');
        const breakfast = breakfastCheckbox ? breakfastCheckbox.checked : false;
        const parkingCheckbox = document.querySelector('input[name="amenities"][value="parking"]');
        const parking = parkingCheckbox ? parkingCheckbox.checked : false;

        // Create an array of holidays to check against
        const holidays = ["12-24", "12-25", "07-04"];

        // Check if any of the reservation days are holidays
        const reservationDays = [];
        for (let d = new Date(checkInDate); d <= new Date(checkOutDate); d.setDate(d.getDate() + 1)) {
            reservationDays.push(d.getMonth() + 1 + '-' + d.getDate());
        }
        const holidayDays = reservationDays.filter(day => holidays.includes(day));

        // Calculate the difference between the check-in and check-out dates
        // If the dates are the same, it will be 1 day
        // Otherwise, it will be the difference in days + 1
        console.log("checkInDate: ", checkInDate);
        console.log("checkOutDate: ", checkOutDate);
        let dayDiff = (new Date(checkOutDate) - new Date(checkInDate)) / (1000 * 60 * 60 * 24);

        console.log("dayDiff: ", dayDiff);

        if (dayDiff < 1) {
            dayDiff = 1;
        }

        // Calculate the total price, based on the chosen room

        let basePrice = 0;

        switch (selectedRoom) {
            case "Double Full Beds":
                basePrice = 115.5;
                break;
            case "Queen":
                basePrice = 131.25;
                break;
            case "Double Queen Beds":
                basePrice = 157.5;
                break;
            case "King":
                basePrice = 173.25;
                break;
            default:
                basePrice = 115.5;
                break;
        }

        let total_price = basePrice * dayDiff;

        // Calculate the holiday price increase, if there are any holiday days
        let holidayPrice = 0;
        if (holidayDays.length > 0) {
            holidayPrice = total_price * 0.05; // Calculate the holiday price increase
        }

        total_price += holidayPrice; // Add the holiday price increase to the total price

        // Calculate the price of the amenities if they are selected
        // Amen
        let total_amenity_price = 0;
        let points_earned = 150 * dayDiff;

        // Amenities: WI-FI (12.99 flat fee), breakfast (8.99 per night), and parking (19.99 per night).
        if (wifi) {
            total_amenity_price += 12.99;
        }
        if (breakfast) {
            total_amenity_price += 8.99 * dayDiff;
        }
        if (parking) {
            total_amenity_price += 19.99 * dayDiff;
        }

        total_amenity_price = total_amenity_price.toFixed(2);

        // Add the amenity price to the total price
        total_price = (parseFloat(total_price) + parseFloat(total_amenity_price)).toFixed(2);

        // Check the prices, if they aren't defined, set them to 0
        if (isNaN(total_price)) {
            total_price = 0;
        }
        if (isNaN(total_amenity_price)) {
            total_amenity_price = 0;
        }

        // create a new reservation object
        const reservation = new Reservation(location, guestCount, selectedRoom, checkInDate, checkOutDate, wifi, breakfast, parking, points_earned, total_amenity_price, total_price);

        // save the reservation object to local storage
        localStorage.setItem("reservation", JSON.stringify(reservation));

        // redirect to the confirmation page
        window.location.href = "reservation_confirmation.php";
    });
}

function getElementByIdAsync(id) {
    return new Promise((resolve) => {
        const element = document.getElementById(id);
        if (element) {
            resolve(element);
        } else {
            document.addEventListener("DOMContentLoaded", () => {
                resolve(document.getElementById(id));
            });
        }
    });
}