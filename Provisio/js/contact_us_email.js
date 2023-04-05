function sendEmail() {
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var message = document.getElementById("message").value;
    var mailtoLink = "mailto:provisiobravo@gmail.com?subject=Message from " + name + " (" + email + ")&body=" + message;
    window.location.href = mailtoLink;
}