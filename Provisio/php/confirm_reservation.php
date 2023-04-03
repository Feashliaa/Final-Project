<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $json = file_get_contents('php://input');
    $data = json_decode($json);

    // $data is now a PHP object containing the reservation data
    $id = $data->reservationID;
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
}
