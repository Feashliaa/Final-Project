CREATE DATABASE probrav;
USE probrav;
drop table if EXISTS reservations;
drop table if EXISTS customers;
drop table if EXISTS room;
drop table if EXISTS hotel;
drop table if EXISTS amenities;
CREATE TABLE customers (
    customer_id INT(11) NOT NULL AUTO_INCREMENT,
    email VARCHAR(255) NOT NULL UNIQUE,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    phone_number VARCHAR(20) NOT NULL,
    password VARCHAR(255) NOT NULL,
    total_points INT(11) DEFAULT 0,
    PRIMARY KEY (customer_id)
);
CREATE TABLE hotel (
    hotel_id INT(11) NOT NULL AUTO_INCREMENT,
    state VARCHAR(50) NOT NULL,
    city VARCHAR(255) NOT NULL,
    PRIMARY KEY (hotel_id)
);
CREATE TABLE room (
    room_id INT(11) NOT NULL AUTO_INCREMENT,
    hotel_id INT(11) NOT NULL,
    room_size VARCHAR(20) NOT NULL,
    price_per_night DECIMAL(10, 2) NOT NULL,
    PRIMARY KEY (room_id)
);
CREATE TABLE amenities (
    amenities_id INT(11) NOT NULL AUTO_INCREMENT,
    description VARCHAR(255) NOT NULL,
    amen_price DECIMAL(10, 2),
    PRIMARY KEY (amenities_id)
);
CREATE TABLE reservations(
    reservation_id INT(11) NOT NULL,
    customer_id INT(11) NOT NULL,
    hotel_id INT(11) NOT NULL,
    room_id INT(11) NOT NULL,
    wifi_amenity INT(11) DEFAULT NULL,
    breakfast_amenity INT(11) DEFAULT NULL,
    parking_amenity INT(11) DEFAULT NULL,
    check_in_date DATE NOT NULL,
    check_out_date DATE NOT NULL,
    number_of_guests INT (11) NOT NULL,
    points_earned int(11) NOT NULL DEFAULT 0,
    total_amenity_price DECIMAL(10, 2) DEFAULT 0,
    total_room_price DECIMAL(10, 2) DEFAULT 0,
    PRIMARY KEY (reservation_id),
    FOREIGN KEY (wifi_amenity) REFERENCES amenities(amenities_id),
    FOREIGN KEY (breakfast_amenity) REFERENCES amenities(amenities_id),
    FOREIGN KEY (parking_amenity) REFERENCES amenities(amenities_id)
);
DESCRIBE customers;
DESCRIBE hotel;
DESCRIBE room;
DESCRIBE amenities;
DESCRIBE reservations;