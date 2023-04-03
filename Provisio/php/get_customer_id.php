<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();

    // Get the email from the session
    $email = $_SESSION['email'];

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

    // check get corresponding customer_id from the database
    $sql = "SELECT customer_id FROM customers WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    // return the customer_id
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $customer_id = $row['customer_id'];
        $response = array(
            "status" => "success",
            "message" => "Customer ID retrieved successfully",
            "customer_id" => $customer_id
        );
        echo json_encode($response);
    } else {
        $response = array(
            "status" => "error",
            "message" => "Customer ID not found"
        );
        echo json_encode($response);
    }
}
