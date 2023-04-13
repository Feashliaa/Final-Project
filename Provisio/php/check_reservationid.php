<?php
/* CSD 460 Capstone in Software Development
Bravo Team: Riley Dorrington, Kelly Bordonhos, Robin Tageant, Christopher Morales
03/13/2023 - 05/14/2023 */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $json = file_get_contents('php://input');
    $data = json_decode($json);

    // $data is now a PHP object containing the reservation id
    $id = $data->realReservationID;

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

    // get the reservation from the database
    $stmt = $conn->prepare("SELECT * FROM reservations WHERE reservation_id = ?");

    // bind the id to the query, this is to prevent SQL injection
    $stmt->bind_param("s", $id);

    // execute the query
    $stmt->execute();

    // get the result of the query and store it in a variable
    $result = $stmt->get_result();

    // if there is a reservation with the given id, return a message stating true
    if (mysqli_num_rows($result) > 0) {
        $response = array(
            "message" => "true"
        );
        echo json_encode($response);
    } else {
        $response = array(
            "message" => "false"
        );
        echo json_encode($response);
    }
}
