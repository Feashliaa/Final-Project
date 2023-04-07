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

    // prepare the SQL statement
    $stmt = $conn->prepare("SELECT customer_id FROM customers WHERE email = ?");

    // bind the parameters to the statement
    $stmt->bind_param("s", $email);

    // execute the statement, checking if the customer exists
    $stmt->execute();

    // get the result 
    $result = $stmt->get_result();

    // return the customer_id
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
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
