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
$dbname = "test_provisio";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Drop the 'customers' table if it exists
$sql = "DROP TABLE IF EXISTS customers";
mysqli_query($conn, $sql);

// Create the 'customers' table
$sql = "CREATE TABLE customers (
    customer_id INT(11) NOT NULL AUTO_INCREMENT,
    email VARCHAR(255) NOT NULL,
    firstname VARCHAR(255) NOT NULL,
    lastname VARCHAR(255) NOT NULL,
    phone_number VARCHAR(20),
    password VARCHAR(255) NOT NULL,
    total_points INT(11) DEFAULT 0,
    PRIMARY KEY (customer_id)
)";

mysqli_query($conn, $sql);

// check if the email already exists
$sql = "SELECT * FROM customers WHERE email = '$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) { // if the email already exists
    // Close the database connection
    mysqli_close($conn);
} else {
    // Insert the user data into the database
    $sql = "INSERT INTO customers (firstname, lastname, email, phone_number, password)
        VALUES ('$firstname', '$lastname', '$email', '$phone_number', '$hashed_password')";

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
