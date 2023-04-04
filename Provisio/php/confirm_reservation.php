<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $json = file_get_contents('php://input');
    $data = json_decode($json);

    // $data is now a PHP object containing the reservation data
    $id = $data->reservationID;
    $customer_id = $data->customer_id;
    $location = $data->location;
    $guestCount = $data->guestCount;
    $roomType = $data->roomSelected;
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
    $hotel_id = 0;
    $room_id = 0;

    switch ($location) {
        case "Springfield":
            $hotel_id = 1;
            break;
        case "Mobile":
            $hotel_id = 2;
            break;
        case "West Palm Beach":
            $hotel_id = 3;
            break;
        case "Owego":
            $hotel_id = 4;
            break;
        default:
            echo "Unknown location";
    }

    // calculate the room id based on the hotel id and room type
    // room_id = (hotel_id - 1) * 4 + room_type
    // room_type = 1 for Double Full, 2 for Queen, 3 for Double Queen, 4 for King 
    switch ($roomType) {
        case "Double Full Beds":
            $room_id = ($hotel_id - 1) * 4 + 1;
            break;
        case "Queen":
            $room_id = ($hotel_id - 1) * 4 + 2;
            break;
        case "Double Queen":
            $room_id = ($hotel_id - 1) * 4 + 3;
            break;
        case "King":
            $room_id = ($hotel_id - 1) * 4 + 4;
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
