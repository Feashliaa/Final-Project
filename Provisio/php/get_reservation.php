<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $json = file_get_contents('php://input');
    $data = json_decode($json);

    // $data is now a PHP object containing the reservation id

    $id = $data->reservationID;

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
    $stmt = $conn->prepare("SELECT * FROM reservations WHERE reservation_id = ?");

    // bind the parameters to the statement
    $stmt->bind_param("s", $id);

    // execute the statement, checking if the reservation exists where the id is the given id
    $stmt->execute();

    // get the result
    $result = $stmt->get_result();

    // return the reservation
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $response = array(
            "status" => "success",
            "message" => "Reservation retrieved successfully",
            "reservation" => $row
        );
        echo json_encode($response);
    } else {
        $response = array(
            "status" => "error",
            "message" => "Reservation not found"
        );
        echo json_encode($response);
    }
}
