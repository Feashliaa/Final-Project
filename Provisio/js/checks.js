function checkLogin() {
    var loginBtn = document.getElementById("login-btn");
    if (loginBtn.innerHTML == "Login") {
        window.location.href = "login.php";
    } else {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'logout.php');
        xhr.onload = function () {
            if (xhr.status === 200) {
                console.log("Logout successful");
                loginBtn.innerHTML = "Login";
                window.location.href = "index.php";
            } else {
                console.log("Logout failed");
            }
        };
        xhr.send(); // Moved outside the onload function
    }
}