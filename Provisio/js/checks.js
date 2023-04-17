/* CSD 460 Capstone in Software Development
    Bravo Team: Riley Dorrington, Kelly Bordonhos, Robin Tageant, Christopher Morales
    03/13/2023 - 05/14/2023 */

function checkLogin() {
    var loginBtn = document.getElementById("login-btn");
    var baseUrl = window.location.origin + '/provisio/provisio/php';
    if (loginBtn.innerHTML == "Login") {
        window.location.href = baseUrl + "/login.php";
    } else {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', baseUrl + '/logout.php');
        xhr.onload = function () {
            if (xhr.status === 200) {
                console.log("Logout successful");
                loginBtn.innerHTML = "Login";

                // delete the reservation data from the local storage
                localStorage.removeItem("reservation");

                window.location.href = baseUrl + "/index.php";
            } else {
                console.log("Logout failed");
            }
        };
        xhr.send();
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

document.addEventListener("DOMContentLoaded", () => {

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
            // Double Full Beds -> Double Full Beds - $110/night
            // Queen -> Queen - $125/night
            // Double Queen Beds -> Double Queen Beds - $150/night
            // King -> King - $165/night
            let room = reservation.roomSelected;
            switch (room) {
                case "Double Full Beds":
                    room = "Double Full Beds - $110/night";
                    break;
                case "Queen":
                    room = "Queen - $125/night";
                    break;
                case "Double Queen Beds":
                    room = "Double Queen Beds - $150/night";
                    break;
                case "King":
                    room = "King - $165/night";
                    break;
                default:
                    room = "Double Full Beds - $110/night";
                    break;
            }
            document.getElementById("room").value = room;

            document.getElementById("checkin").value = reservation.checkInDate;

            document.getElementById("checkout").value = reservation.checkOutDate;

            // Set the checkbox based on the value of the amenity
            document.getElementById("wifi").checked = reservation.amenities.wifi;
            document.getElementById("breakfast").checked = reservation.amenities.breakfast;
            document.getElementById("parking").checked = reservation.amenities.parking;
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

        // store into a variable, the roomSelect string, split by the  ' - '  delimiter
        let selectedRoom = roomSelect.split(" - ");

        // store the first element of the array into a variable
        selectedRoom = selectedRoom[0];

        console.log(selectedRoom);


        const checkInDate = document.getElementById("checkin").value;
        const checkOutDate = document.getElementById("checkout").value;

        // get the values of the checkboxes, if they exist
        const wifiCheckbox = document.querySelector('input[name="amenities"][value="wifi"]');
        const wifi = wifiCheckbox ? wifiCheckbox.checked : false;
        const breakfastCheckbox = document.querySelector('input[name="amenities"][value="breakfast"]');
        const breakfast = breakfastCheckbox ? breakfastCheckbox.checked : false;
        const parkingCheckbox = document.querySelector('input[name="amenities"][value="parking"]');
        const parking = parkingCheckbox ? parkingCheckbox.checked : false;


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

        // Calculate the total price, based on the number of days and the chosen room
        // Room Prices: Double Full Beds 110, Queen 125, Double Queen 150, King 160

        let total_price = 0;

        switch (selectedRoom) {
            case "Double Full Beds":
                total_price = 110 * dayDiff;
                break;
            case "Queen":
                total_price = 125 * dayDiff;
                break;
            case "Double Queen Beds":
                total_price = 150 * dayDiff;
                break;
            case "King":
                total_price = 165 * dayDiff;
                break;
            default:
                total_price = 110 * dayDiff;
                break;
        }



        let total_amenity_price = 0;
        let points_earned = 150 * dayDiff;

        // Calculate the price of the amenities if they are selected
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