<?php
// Retrieve the form data
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$phone_number = $_POST['phone'];
$password = $_POST['password'];

// Console log the above for testing
echo $firstname . "\n";
echo $lastname . "\n";
echo $email . "\n";
echo $phone_number . "\n";
echo $password . "\n";



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
} else {
    echo "Connected successfully \n";
}

// Drop the 'customers' table if it exists
$sql = "DROP TABLE IF EXISTS customers";
if (!mysqli_query($conn, $sql)) {
    echo "Error dropping table: " . mysqli_error($conn);
}

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
if (!mysqli_query($conn, $sql)) {
    echo "Error creating table: " . mysqli_error($conn);
}

// check if the email already exists
$sql = "SELECT * FROM customers WHERE email = '$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "User already registered \n";
    // Close the database connection
    mysqli_close($conn);
    exit();
} else {
    // Insert the user data into the database
    $sql = "INSERT INTO customers (firstname, lastname, email, phone_number, password)
        VALUES ('$firstname', '$lastname', '$email', '$phone_number', '$hashed_password')";

    if (mysqli_query($conn, $sql)) {
        echo "User registered successfully \n";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
// Close the database connection
mysqli_close($conn);
