/* CSD 460 Capstone in Software Development
    Bravo Team: Riley Dorrington, Kelly Bordonhos, Robin Tageant, Christopher Morales
    03/13/2023 - 05/14/2023 */

function sendEmail() {
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var message = document.getElementById("message").value;
    var mailtoLink = "mailto:provisiobravo@gmail.com?subject=Message from " + name + " (" + email + ")&body=" + message;
    window.location.href = mailtoLink;
}