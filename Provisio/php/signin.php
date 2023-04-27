<?php
/* CSD 460 Capstone in Software Development
Bravo Team: Riley Dorrington, Kelly Bordonhos, Robin Tageant, Christopher Morales
03/13/2023 - 05/14/2023 */

// get the name of the form

// check if there is a form name
if (isset($_POST['form'])) {
    $form = $_POST['form'];
} else {
    $form = "";
}
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

// prepare the SQL statement
$stmt = $conn->prepare("SELECT * FROM customers WHERE email = ?");

// bind the parameters to the statement
$stmt->bind_param("s", $email);

// execute the statement, checking if the email already exists
$stmt->execute();

// get the result
$result = $stmt->get_result();

// if the email already exists
if ($result->num_rows > 0) {
    // get the hashed password from the database
    $row = $result->fetch_assoc();
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

        if ($form == "login-form") {
            echo json_encode($response);
        } else {
            header("Location: ../php/index.php");
        }
    } else { // if the password is incorrect
        $response = array(
            "status" => "error",
            "message" => "Incorrect password"
        );

        echo json_encode($response);
    }
} else { // if the email does not exist
    $response = array(
        "status" => "error",
        "message" => "Email does not exist"
    );

    echo json_encode($response);
}
