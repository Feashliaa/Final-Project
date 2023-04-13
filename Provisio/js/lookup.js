/* CSD 460 Capstone in Software Development
    Bravo Team: Riley Dorrington, Kelly Bordonhos, Robin Tageant, Christopher Morales
    03/13/2023 - 05/14/2023 */

let intervalId; // Declare intervalId as a global variable

// Check for the Look-Up data in local storage and populate the text area when available
function checkForLookupData() {
  console.log("Checking");
  let summaryTextarea = document.getElementById("summary");
  let lookupData = localStorage.getItem("Look-Up");

  if (lookupData) {
    summaryTextarea.value = lookupData;
    console.log("Done Checking")
    clearInterval(intervalId); // Stop checking for the data once it has been found
  }
}

document.addEventListener("DOMContentLoaded", () => {
  console.log("DOM loaded");
  intervalId = setInterval(checkForLookupData, 500); // Check every 500ms
});