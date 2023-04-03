document.addEventListener("DOMContentLoaded", () => {
    console.log("DOM loaded");
    // get the reservation summary textarea element
    let summaryTextarea = document.getElementById("summary");
    // set the local storage value to the textarea value
    summaryTextarea.value = localStorage.getItem("Look-Up");
});