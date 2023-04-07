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

// prepare the SQL statement
$stmt = $conn->prepare("SELECT * FROM customers WHERE email = ?");

// bind the parameters to the statement
$stmt->bind_param("s", $email);

// execute the statement and check if the email already exists
$stmt->execute();

// get the result
$result = $stmt->get_result();

if ($result->num_rows > 0) { // if the email already exists

    $response = array(
        "status" => "error",
        "message" => "Email already exists"
    );

    echo json_encode($response);

    // Close the database connection
    $conn->close();
} else {
    // Insert the user data into the database
    // prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO customers (email, first_name, last_name, phone_number, password)
        VALUES (?, ?, ?, ?, ?)");

    // bind the parameters to the statement
    $stmt->bind_param("sssss", $email, $firstname, $lastname, $phone_number, $hashed_password);

    // execute the statement, checking if the email already exists
    if ($stmt->execute()) {
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
    } else { // some error occurred
        $response = array(
            "status" => "error",
            "message" => "Error: " . $stmt->error
        );
        echo json_encode($response);
    }

    // Close the statement
    $stmt->close();

    // Close the database connection if it's still open
    if ($conn->ping()) {
        $conn->close();
    }
}
