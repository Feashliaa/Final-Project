<?php
// Retrieve the form data
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$phone_number = $_POST['phone'];
$password = $_POST['password'];

// Hash the password for security
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

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

if (mysqli_num_rows($result) > 0) { // if the email already exists

    $response = array(
        "status" => "error",
        "message" => "Email already exists"
    );

    echo json_encode($response);

    // Close the database connection
    mysqli_close($conn);
} else {
    // Insert the user data into the database
    $sql = "INSERT INTO customers (email, first_name, last_name, phone_number, password)
        VALUES ('$email', '$firstname', '$lastname', '$phone_number', '$hashed_password')";

    if (mysqli_query($conn, $sql)) {
        // Start a new session
        session_start();
        // Store the user's email in the session
        $_SESSION['email'] = $email;

        $response = array(
            "status" => "success",
            "message" => "User registered successfully",
            "email" => $email
        );
        echo json_encode($response);
    } else {
        $response = array(
            "status" => "error",
            "message" => "Error: " . $sql . "<br>" . mysqli_error($conn)
        );
        echo json_encode($response);
    }

    // Close the database connection if it's still open
    if ($conn->ping()) {
        mysqli_close($conn);
    }
}
