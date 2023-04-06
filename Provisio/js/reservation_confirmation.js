document.addEventListener("DOMContentLoaded", () => {

    let checkReservation;

    // get the reservationID from the reservation local storage object
    const reservationID = reservation.reservationID;

    // if the reservationID is 0, then the reservation was not saved to the database
    if (reservationID == 0) {
        checkReservation = false
    } else {
        checkReservation = true;
    }


    console.log("DOM loaded");

    // allow for cancel and confirm buttons to be clicked
    enableButtons(checkReservation);

    // check if the page is reservation_confirmation.php
    if (window.location.pathname.includes("reservation_confirmation.php")) {

        console.log("reservation_confirmation.php loaded");

        // check if the page has a reservation summary textarea
        const summaryTextarea = document.getElementById("summary");
        if (summaryTextarea) {
            // if so, add the reservation data to the textarea
            addDataToTextArea();
        }
    }

    // check if the page has the login button
    const loginBtn = document.getElementById("login-btn");

    // check if the login button exists
    if (loginBtn) {
        // check if the login button text is "LOGIN"
        if (loginBtn.innerText == "LOGIN") {
            // change the confirm-reservation button to "Must be Logged In to Reserve"
            const confirmReservationBtn = document.getElementById("confirm-reservation");
            confirmReservationBtn.innerText = "Must be Logged In to Reserve";
            confirmReservationBtn.disabled = true;
            confirmReservationBtn.style.backgroundColor = "red";
        }
    }
});
