<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $json = file_get_contents('php://input');
    $data = json_decode($json);

    // $data is now a PHP object containing the reservation data
    $id = $data->reservationID;
    $customer_id = $data->customer_id;
    $location = $data->location;
    $guestCount = $data->guestCount;
    $checkInDate = $data->checkInDate;
    $checkOutDate = $data->checkOutDate;
    $wifi = $data->amenities->wifi;
    $breakfast = $data->amenities->breakfast;
    $parking = $data->amenities->parking;
    $points = $data->points;
    $amenity_price = $data->total_amenity_price;
    $total_price = $data->total_price;

    // check if wifi, breakfast, or parking are null, if so, make it null
    if ($wifi === false) {
        $wifi = null;
    }
    if ($breakfast === false) {
        $breakfast = null;
    }
    if ($parking === false) {
        $parking = null;
    }



    // extract the guest count from the string
    $guestCount = substr($guestCount, 0, 1);

    echo "Location: $location";

    $hotel_id = 0;
    $room_id = 0;

    switch ($location) {
        case "Springfield":
            $hotel_id = 1;
            echo "Hotel ID: $hotel_id";
            break;
        case "Mobile":
            $hotel_id = 2;
            echo "Hotel ID: $hotel_id";
            break;
        case "West Palm Beach":
            $hotel_id = 3;
            echo "Hotel ID: $hotel_id";
            break;
        case "Owego":
            $hotel_id = 4;
            echo "Hotel ID: $hotel_id";
            break;
        default:
            echo "Unknown location";
    }


    // hotels currently have 4 rooms, hotel_id 1, has 1-4, hotel_id 2 has 5-8, etc.
    switch ($hotel_id) {
        case 1:
            // generate a random room number between 1 and 4
            $room_id = rand(1, 4);
            break;
        case 2:
            // generate a random room number between 5 and 8
            $room_id = rand(5, 8);
            break;
        case 3:
            // generate a random room number between 9 and 12
            $room_id = rand(9, 12);
            break;
        case 4:
            // generate a random room number between 13 and 16
            $room_id = rand(13, 16);
            break;
    }

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

    // insert the reservation into the database 
    /* reservation_id | customer_id | hotel_id | room_id | wifi_amenity | breakfast_amenity | parking_amenity | check_in_date | check_out_date | number_of_guests | points_earned | total_amenity_price | total_room_price */

    $sql = "INSERT INTO reservations (reservation_id, customer_id, hotel_id, room_id, wifi_amenity, breakfast_amenity, parking_amenity, check_in_date, check_out_date, number_of_guests, points_earned, total_amenity_price, total_room_price) 
    VALUES ('$id', '$customer_id', '$hotel_id', '$room_id', " . ($wifi ? '1' : 'NULL') . ", " . ($breakfast ? '1' : 'NULL') . ", " . ($parking ? '1' : 'NULL') . ", '$checkInDate', '$checkOutDate', '$guestCount', '$points', '$amenity_price', '$total_price')";

    if (mysqli_query($conn, $sql)) {

        // accumulate the total points to the customer's account
        $sql = "UPDATE customers SET total_points = total_points + $points WHERE customer_id = $customer_id";

        // execute the query
        mysqli_query($conn, $sql);

        // send a success response
        $response = array(
            "status" => "success",
            "message" => "Reservation created successfully"
        );
        echo json_encode($response);
    } else {
        $response = array(
            "status" => "error",
            "message" => "Error creating reservation"
        );
        echo json_encode($response);
    }
}
