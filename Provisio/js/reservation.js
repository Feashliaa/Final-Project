/* CSD 460 Capstone in Software Development
    Bravo Team: Riley Dorrington, Kelly Bordonhos, Robin Tageant, Christopher Morales
    03/13/2023 - 05/14/2023 */

class Reservation {
    constructor(location, guestCount, room, checkInDate, checkOutDate, wifi = false, breakfast = false, parking = false, points_earned = 0, total_amenity_price = 0, total_price = 0) {
        this.reservationID = 0;// doing this for now, will be set by the server
        this.customer_id = 0; // set the customer ID to 0 for now
        this.location = location;
        this.guestCount = guestCount;
        this.roomSelected = room;
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

    let check = document.getElementById("login-btn").innerHTML.toUpperCase();

    // remove the spaces
    check = check.replace(/\s/g, '');

    console.log(check);

    if (check == "LOGOUT") {
        enableLookupButton();
    }
});

function addDataToTextArea() {
    // Get the reservation data from local storage
    let reservation = JSON.parse(localStorage.getItem("reservation"));

    // Get the reservation summary div element
    let summaryDiv = document.getElementById("summary");
    let summaryText = "";

    // Check if the reservation id is 0
    if (reservation.reservationID == 0) {
        // Create a formatted string with the reservation information
        summaryText = `<label>Location: </label><div>${reservation.location}</div>
    <label>Guest Count: </label><div>${reservation.guestCount}</div>
    <label>Room Selected: </label><div>${reservation.roomSelected}</div>
    <label>Check-in Date: </label><div>${reservation.checkInDate}</div>
    <label>Check-out Date: </label><div>${reservation.checkOutDate}</div>
    <label>Amenities: </label><div>Wifi: ${reservation.amenities.wifi ? "Yes" : "No"}, Breakfast: ${reservation.amenities.breakfast ? "Yes" : "No"}, Parking: ${reservation.amenities.parking ? "Yes" : "No"}</div>
    <label>Points Earned: </label><div>${reservation.points}</div>
    <label>Total Amenity Price: </label><div>$ ${reservation.total_amenity_price}</div>
    <label>Total Price: </label><div>$ ${reservation.total_price}</div>`;
    } else {
        // Create a formatted string with the reservation information
        summaryText = `<label>Reservation ID: </label><div>${reservation.reservationID}</div>
    <label>Location: </label><div>${reservation.location}</div>
    <label>Guest Count: </label><div>${reservation.guestCount}</div>
    <label>Room Selected: </label><div>${reservation.roomSelected}</div>
    <label>Check-in Date: </label><div>${reservation.checkInDate}</div>
    <label>Check-out Date: </label><div>${reservation.checkOutDate}</div>
    <label>Amenities: </label><div>Wifi: ${reservation.amenities.wifi ? "Yes" : "No"}, Breakfast: ${reservation.amenities.breakfast ? "Yes" : "No"}, Parking: ${reservation.amenities.parking ? "Yes" : "No"}</div>
    <label>Points Earned: </label><div>${reservation.points}</div>
    <label>Total Amenity Price: </label><div>$ ${reservation.total_amenity_price}</div>
    <label>Total Price: </label><div>$ ${reservation.total_price}</div>`;
    }

    // Set the innerHTML of the summary div to the formatted string
    summaryDiv.innerHTML = summaryText;
}



/* function addDataToTextArea() {
    // Get the reservation data from local storage
    let reservation = JSON.parse(localStorage.getItem("reservation"));

    // get the reservation summary textarea element
    let summaryTextarea = document.getElementById("summary");
    let summaryText = "";


    // check if the reservation id is 0
    if (reservation.reservationID == 0) {
        // create a formatted string with the reservation information
        summaryText = `Location: ${reservation.location}
    Guest Count: ${reservation.guestCount}
    Room Selected: ${reservation.roomSelected}
    Check-in Date: ${reservation.checkInDate}
    Check-out Date: ${reservation.checkOutDate}
    Amenities:
      Wifi: ${reservation.amenities.wifi ? "Yes" : "No"}
      Breakfast: ${reservation.amenities.breakfast ? "Yes" : "No"}
      Parking: ${reservation.amenities.parking ? "Yes" : "No"}
    Points: ${reservation.points}
    Amenity Price: $ ${reservation.total_amenity_price}
    Total Price:   $ ${reservation.total_price}`;
    } else {
        // create a formatted string with the reservation information
        summaryText = `Reservation ID: ${reservation.reservationID}
  Location: ${reservation.location}
  Guest Count: ${reservation.guestCount}
  Room Selected: ${reservation.roomSelected}
  Check-in Date: ${reservation.checkInDate}
  Check-out Date: ${reservation.checkOutDate}
  Amenities:
    Wifi: ${reservation.amenities.wifi ? "Yes" : "No"}
    Breakfast: ${reservation.amenities.breakfast ? "Yes" : "No"}
    Parking: ${reservation.amenities.parking ? "Yes" : "No"}
  Points: ${reservation.points}
  Amenity Price: $ ${reservation.total_amenity_price}
  Total Price:   $ ${reservation.total_price}`;
    }

    // set the value of the summary textarea to the formatted string
    summaryTextarea.value = summaryText;
} */

function enableLookupButton() {

    // check if the page has the lookup button
    const lookupBtn = document.getElementById("look-up-btn");

    // check if the reservation ID input field exists on the page
    const reservationIDInput = document.getElementById("id");

    // check if there is typing in the input field
    if (reservationIDInput) {
        reservationIDInput.addEventListener("input", () => {
            console.log("Input detected");

            // check if the input field is empty
            if (reservationIDInput.value == "") {
                // disable the lookup button
                lookupBtn.disabled = true;
            }
            else {
                // enable the lookup button
                lookupBtn.disabled = false;
            }
        });
        // if the lookup button is enabled
        if (!lookupBtn.disabled) {
            lookupBtn.addEventListener("click", () => {

                console.log("Lookup button clicked");

                // if so, get the value of the input field
                let reservationID = document.getElementById("id");

                reservationID = reservationID.value;

                // send request to the server to get the reservation data
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "get_reservation.php");
                xhr.setRequestHeader("Content-Type", "application/json");
                console.log(reservationID)
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
                                // send the user back to the reservation page
                                window.location.href = "reservation.php";
                            }
                        } catch (e) {
                            console.log("Error: " + e.message);
                            // alert the error
                            alert("Error: " + e.message);
                            // send the user back to the reservation page
                            window.location.href = "reservation.php";
                        }
                    }
                }
            });
        }
    }
}

// Print the reservation data to the console
function printReservation(response_object) {

    console.log("Printing reservation data...");
    console.log(response_object);

    let reservationID = response_object.reservation_id;
    let hotelId = response_object.hotel_id;
    let roomId = response_object.room_id;
    let wifiAmenity = response_object.wifi_amenity;
    let breakfastAmenity = response_object.breakfast_amenity;
    let parkingAmenity = response_object.parking_amenity;
    let checkInDate = response_object.check_in_date;
    let checkOutDate = response_object.check_out_date;
    let numberOfGuests = response_object.number_of_guests;
    let pointsEarned = response_object.points_earned;
    let totalAmenityPrice = response_object.total_amenity_price;
    let totalRoomPrice = response_object.total_room_price;


    // Get the room selected from the room id, and the hotel id
    // Hotel 1: 1-4, 1=Double Full Beds, 2=Queen, 3=Double Queen, 4=King
    // Hotel 2: 5-8, 5=Double Full Beds, 6=Queen, 7=Double Queen, 8=King
    // Hotel 3: 9-12, 9=Double Full Beds, 10=Queen, 11=Double Queen, 12=King
    // Hotel 4: 13-16, 13=Double Full Beds, 14=Queen, 15=Double Queen, 16=King
    roomId = Number(roomId);

    const roomStrings = {
        1: "Double Full Beds",
        2: "Queen",
        3: "Double Queen Beds",
        4: "King",
        5: "Double Full Beds",
        6: "Queen",
        7: "Double Queen Beds",
        8: "King",
        9: "Double Full Beds",
        10: "Queen",
        11: "Double Queen Beds",
        12: "King",
        13: "Double Full Beds",
        14: "Queen",
        15: "Double Queen Beds",
        16: "King"
    };

    let roomString = roomStrings[roomId];

    console.log(`Room ID: ${roomId}`);
    console.log(`Room String: ${roomString}`);



    let hotelString = ""; // initialize the hotel string to an empty string
    hotelId = Number(hotelId); // convert the hotel ID to a number
    switch (hotelId) { // set the hotel string based on the hotel ID
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

    // check number of guests, if 1, make the text 1-2, if 3, make 3-5
    if (numberOfGuests === 1) {
        numberOfGuests = "1-2";
    } else if (numberOfGuests === 3) {
        numberOfGuests = "3-5";
    }

    // create a formatted string with the reservation information
    let summaryText = `Reservation ID: ${reservationID}
Location: ${hotelString}
Guest Count: ${numberOfGuests}
Room Selected: ${roomString}
Check-in Date: ${checkInDate}
Check-out Date: ${checkOutDate}
Amenities:
  Wifi: ${wifiAmenity ? "Yes" : "No"}
  Breakfast: ${breakfastAmenity ? "Yes" : "No"}
  Parking: ${parkingAmenity ? "Yes" : "No"}
Points: ${pointsEarned}
Amenity Price: $ ${totalAmenityPrice}
Total Price:   $ ${totalRoomPrice}`;


    // Send the Look-Up data to the lookup page
    localStorage.setItem("Look-Up", summaryText);

    // Redirect to the lookup page after a short delay
    setTimeout(() => {
        window.location.href = "lookup_page.php";
    }, 1000); // delay for 1 second
}

function enableButtons(checkReservation) {

    const cancelBtn = document.getElementById("cancel-reservation");
    const confirmBtn = document.getElementById("confirm-reservation");
    if (!cancelBtn || !confirmBtn) {
        return;
    }

    const loginBtn = document.getElementById("login-btn");
    const loginBtnText = loginBtn.innerText;

    console.log(`Login Button Text: ${loginBtnText}`);

    if (loginBtnText == "LOGOUT" && checkReservation == false) {

        console.log("User is logged in");

        confirmBtn.disabled = false;

        let realReservationID;
        let xhr;
        let reservationIDExists;

        do {
            realReservationID = Math.floor(Math.random() * 9999999) + 1;
            realReservationID = realReservationID.toString().padStart(7, "0");

            xhr = new XMLHttpRequest();
            xhr.open("POST", "check_reservationid.php", false);
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.send(JSON.stringify({ realReservationID }));

            console.log("Sent request to check_reservationid.php");
            console.log("Response status: " + xhr.status);
            console.log("Response text: " + xhr.responseText);

            if (xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);
                console.log("Response Id already exist?: " + response.message);
                reservationIDExists = response.message;
            } else {
                console.log("Error: " + xhr.status);
                reservationIDExists = "false";
            }

        } while (reservationIDExists === "true");

        console.log("Unique reservation ID: " + realReservationID);

        const reservation = JSON.parse(localStorage.getItem("reservation"));
        reservation.reservationID = realReservationID;
        localStorage.setItem("reservation", JSON.stringify(reservation));

        //window.location.reload();

    }

    cancelBtn.addEventListener("click", () => {
        localStorage.removeItem("reservation");
        window.location.href = "reservation.php";
    });

    confirmBtn.addEventListener("click", () => {

        // check if the user is logged in
        if (loginBtnText == "LOGIN") {
            // assume that the text of the confirm button is actually "Must be Logged In to Reserve"

            // save the reservation data to local storage
            localStorage.setItem("reservation", JSON.stringify(reservation));

            // redirect to the login page
            window.location.href = "login.php";
        }


        let customer_id = 0;
        console.log("Confirm button clicked");
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
                        customer_id = response.customer_id;
                        console.log("Customer ID: " + response.customer_id);
                        insertReservation(customer_id);
                    } else {
                        console.log(response.message);
                        alert(response.message);
                    }
                } catch (e) {
                    console.log("Error: " + e.message);
                    alert("Error: " + e.message);
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