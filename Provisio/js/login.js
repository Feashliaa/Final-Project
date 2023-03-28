// "login" using the user's information, this is just for testing purposes and will be replaced with
// a do post to a java servlet in the future
function login(){
    // Fetch the email and password from the "email" and "password" input fields
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;

    console.log("User: " + email +  " Logging in with, Password: " + password);
}