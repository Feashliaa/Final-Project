class Reservation {
    constructor(location, guestCount, checkInDate, checkOutDate, wifi = false, breakfast = false, parking = false, points_earned = 0, total_amenity_price = 0, total_price = 0) {
        this.reservationID = Math.floor(Math.random() * 1000000); // generate a random reservation ID
        this.customer_id = 0; // set the customer ID to 0 for now
        this.location = location;
        this.guestCount = guestCount;
        this.checkInDate = checkInDate;
        this.checkOutDate = checkOutDate;
        this.amenities = {
            wifi: wifi,
            breakfast: breakfast,
            parking: parking,
        };
        this.points = points_earned;
        this.total_amenity_price = total_amenity_price;
        this.total_price = total_price;
    }
}
// Get the reservation data from local storage
const reservation = JSON.parse(localStorage.getItem("reservation"));

document.addEventListener("DOMContentLoaded", () => {

    // check if the page is confirm_reservation.php
    if (window.location.pathname === "/confirm_reservation.php") {

        // check if the page has a reservation summary textarea
        const summaryTextarea = document.getElementById("summary");
        if (summaryTextarea) {
            // if so, add the reservation data to the textarea
            addDataToTextArea();
        }
    }
    // allow for cancel and confirm buttons to be clicked
    enableButtons();

    // enable lookup button
    enableLookupButton();
});


function addDataToTextArea() {
    // Get the reservation data from local storage
    let reservation = JSON.parse(localStorage.getItem("reservation"));

    // get the reservation summary textarea element
    let summaryTextarea = document.getElementById("summary");

    // create a formatted string with the reservation information
    let summaryText = `Reservation ID: ${reservation.reservationID}
  Location: ${reservation.location}
  Guest Count: ${reservation.guestCount}
  Check-in Date: ${reservation.checkInDate}
  Check-out Date: ${reservation.checkOutDate}
  Amenities:
    Wifi: ${reservation.amenities.wifi ? "Yes" : "No"}
    Breakfast: ${reservation.amenities.breakfast ? "Yes" : "No"}
    Parking: ${reservation.amenities.parking ? "Yes" : "No"}
  Points: ${reservation.points}
  Amenity Price: $ ${reservation.total_amenity_price}
  Total Price:   $ ${reservation.total_price}`;

    // set the value of the summary textarea to the formatted string
    summaryTextarea.value = summaryText;
}

function enableLookupButton() {
    // check if the page has the lookup button
    const lookupBtn = document.getElementById("look-up-btn");

    // check if the reservation ID input field exists on the page
    const reservationIDInput = document.getElementById("id");

    // check if there is typing in the input field
    if (reservationIDInput) {
        reservationIDInput.addEventListener("input", () => {
            console.log("Input detected");
            // if so, get the value of the input field
            const reservationID = reservationIDInput.value;

            lookupBtn.addEventListener("click", () => {
                // send request to the server to get the reservation data
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "get_reservation.php");
                xhr.setRequestHeader("Content-Type", "application/json");
                xhr.send(JSON.stringify({ reservationID: reservationID }));
                console.log("Sent request to get_reservation.php");
                xhr.onload = function () {
                    console.log("Response received!");
                    if (xhr.status === 200) {
                        try {
                            var response = JSON.parse(xhr.responseText);
                            if (response.status === "success") {
                                console.log("Reservation found!");
                                var response_object = response.reservation;
                                printReservation(response_object); // move printReservation here
                            } else {
                                console.log(response.message);
                                // alert the error
                                alert(response.message);
                                // send you to index.php
                                //window.location.href = "index.php";
                            }
                        } catch (e) {
                            console.log("Error: " + e.message);
                            // alert the error
                            alert("Error: " + e.message);
                            // send you to index.php
                            //window.location.href = "index.php";
                        }
                    }
                }
            });
        });
    }
}


// Print the reservation data to the console
async function printReservation(response_object) {
    let reservationID = response_object.reservation_id;
    let hotelID = response_object.hotel_id;
    let wifiAmenity = response_object.wifi_amenity;
    let breakfastAmenity = response_object.breakfast_amenity;
    let parkingAmenity = response_object.parking_amenity;
    let checkInDate = response_object.check_in_date;
    let checkOutDate = response_object.check_out_date;
    let numberOfGuests = response_object.number_of_guests;
    let pointsEarned = response_object.points_earned;
    let totalAmenityPrice = response_object.total_amenity_price;
    let totalRoomPrice = response_object.total_room_price;

    let hotelString = ""; // initialize the hotel string to an empty string
    hotelID = Number(hotelID); // convert the hotel ID to a number
    switch (hotelID) { // set the hotel string based on the hotel ID
        case 1:
            hotelString = "Springfield";
            break;
        case 2:
            hotelString = "Mobile";
            break;
        case 3:
            hotelString = "West Palm Beach";
            break;
        case 4:
            hotelString = "Owego";
            break;
        default:
            hotelString = "Unknown";
    }

    /*     // print the reservation data to the console
        console.log(`Reservation ID: ${reservationID}`);
        console.log(`Hotel: ${hotelString}`);
        console.log(`Wifi Amenity: ${wifiAmenity}`);
        console.log(`Breakfast Amenity: ${breakfastAmenity}`);
        console.log(`Parking Amenity: ${parkingAmenity}`);
        console.log(`Check-in Date: ${checkInDate}`);
        console.log(`Check-out Date: ${checkOutDate}`);
        console.log(`Number of Guests: ${numberOfGuests}`);
        console.log(`Points Earned: ${pointsEarned}`);
        console.log(`Total Amenity Price: ${totalAmenityPrice}`);
        console.log(`Total Room Price: ${totalRoomPrice}`); */

    console.log("Before redirect");

    // create a formatted string with the reservation information
    let summaryText = `Reservation ID: ${reservationID}
        Location: ${hotelString}
        Guest Count: ${numberOfGuests}
        Check-in Date: ${checkInDate}
        Check-out Date: ${checkOutDate}
        Amenities:
          Wifi: ${wifiAmenity ? "Yes" : "No"}
          Breakfast: ${breakfastAmenity ? "Yes" : "No"}
          Parking: ${parkingAmenity ? "Yes" : "No"}
        Points: ${pointsEarned}
        Amenity Price: $ ${totalAmenityPrice}
        Total Price:   $ ${totalRoomPrice}`;

    // send the Look-Up data to the lookup page
    localStorage.setItem("Look-Up", summaryText);

    window.location.href = "lookup_page.php";
}


// Enable the buttons on the page
function enableButtons() {

    // check if the page has the cancel and confirm buttons
    const cancelBtn = document.getElementById("cancel-reservation");
    const confirmBtn = document.getElementById("confirm-reservation");
    if (!cancelBtn || !confirmBtn) {
        // if not, return
        return;
    }

    // Add event listener to the Cancel button
    cancelBtn.addEventListener("click", () => {
        // Clear the reservation data from local storage
        localStorage.removeItem("reservation");

        // Redirect to the home page
        window.location.href = "reservation.php";
    });

    // Add event listener to the Confirm button
    confirmBtn.addEventListener("click", () => {

        let customer_id = 0;

        console.log("Confirm button clicked");

        // first, get the customer's id via their email address in the php session
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "get_customer_id.php");
        xhr.setRequestHeader("Content-Type", "application/json");
        xhr.send();
        console.log("Sent request to get_customer_id.php");
        xhr.onload = function () {
            console.log("Response received");
            if (xhr.status === 200) {
                try {
                    var response = JSON.parse(xhr.responseText);
                    if (response.status === "success") {
                        // get the customer id from the response
                        customer_id = response.customer_id;
                        console.log("Customer ID: " + response.customer_id);
                        insertReservation(customer_id);
                    } else {
                        console.log(response.message);
                        // alert the error
                        alert(response.message);
                        // send you to index.php
                        //window.location.href = "index.php";
                    }
                } catch (e) {
                    console.log("Error: " + e.message);
                    // alert the error
                    alert("Error: " + e.message);
                    // send you to index.php
                    //window.location.href = "index.php";
                }
            }
        }
    });
}

// Insert the reservation data into the database
function insertReservation(cust_id) {
    // Send json data to the server, confirm_reservation.php
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "confirm_reservation.php");
    xhr.setRequestHeader("Content-Type", "application/json");

    // Get the reservation data from local storage
    let php_reservation = JSON.parse(localStorage.getItem("reservation"));

    // console log the reservation data
    console.log(php_reservation);

    // set the customer id in the reservation data
    php_reservation.customer_id = cust_id;

    // make it json format
    php_reservation = JSON.stringify(php_reservation);

    // console log the reservation data
    console.log(php_reservation);

    xhr.send(php_reservation);

    console.log("Sent data to confirm_reservation.php");

    xhr.onload = function () {
        console.log("Response received");
        if (xhr.status === 200) {
            try {
                var response = JSON.parse(xhr.responseText);
                if (response.status === "success") {
                    console.log(response.message);
                    // send you to index.php
                    window.location.href = "rewards_summary.php";
                } else {
                    console.log(response.message);
                }
            } catch (e) {
                console.log("Error: " + e.message);
                console.log("Response Text: " + xhr.responseText);
                console.log("XHR Status: " + xhr.status);
            }
        } else {
            console.log("Error: " + xhr.status);
        }
    }
}