<?php
$email = $_POST['email'];
$login_password = $_POST['password'];

// Connect to the MySQL database (replace the database credentials with your own)
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "probrav";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// check if the email already exists
$sql = "SELECT * FROM customers WHERE email = '$email'";
$result = mysqli_query($conn, $sql);

// if the email already exists
if (mysqli_num_rows($result) > 0) {
    // get the hashed password from the database
    $row = mysqli_fetch_assoc($result);
    $hashed_password_from_db = $row['password'];

    // compare the password with the hashed password from the database
    if (password_verify($login_password, $hashed_password_from_db)) {
        // Start a new session
        session_start();
        // Store the user's email in the session
        $_SESSION['email'] = $email;

        $response = array(
            "status" => "success",
            "message" => "User logged in successfully",
            "email" => $email
        );
        echo json_encode($response);
    } else {
        $response = array(
            "status" => "error",
            "message" => "Incorrect password"
        );
        echo json_encode($response);
    }
} else {
    $response = array(
        "status" => "error",
        "message" => "Email does not exist"
    );
    echo json_encode($response);
}
