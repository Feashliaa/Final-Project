class Reservation {
    constructor(location, guestCount, checkInDate, checkOutDate, wifi = false, breakfast = false, parking = false, points_earned = 0, total_amenity_price = 0, total_price = 0) {
        this.reservationID = Math.floor(Math.random() * 1000000); // generate a random reservation ID
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
    // check if the page has a reservation summary textarea
    const summaryTextarea = document.getElementById("summary");
    if (summaryTextarea) {
        // if so, add the reservation data to the textarea
        addDataToTextArea();
    }

    // allow for cancel and confirm buttons to be clicked
    enableButtons();
});

function addDataToTextArea() {
    // Get the reservation data from local storage
    const reservation = JSON.parse(localStorage.getItem("reservation"));

    // get the reservation summary textarea element
    const summaryTextarea = document.getElementById("summary");

    // create a formatted string with the reservation information
    const summaryText = `Reservation ID: ${reservation.reservationID}
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
        // Send json data to the server, confirm_reservation.php
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "confirm_reservation.php");
        xhr.setRequestHeader("Content-Type", "application/json");

        // Get the reservation data from local storage
        const php_reservation = JSON.parse(localStorage.getItem("reservation"));

        // console log the reservation data
        console.log(reservation_data);

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
                        window.location.href = "index.php";
                    } else {
                        console.log(response.message);
                    }
                } catch (e) {
                    console.log("Error: " + e.message);
                }
            } else {
                console.log("Error: " + xhr.status);
            }
        }
    });
}