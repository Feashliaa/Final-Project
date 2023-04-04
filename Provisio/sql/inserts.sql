INSERT INTO amenities (description, amen_price)
VALUES ('WI-FI', 12.99);
INSERT INTO amenities (description, amen_price)
VALUES ('Breakfast', 8.99);
INSERT INTO amenities (description, amen_price)
VALUES ('Parking', 19.99);

INSERT INTO hotel (state, city) VALUES
('Springfield', 'MA'),
('Mobile', 'AL'),
('West Palm Beach', 'FL'),
('Owego', 'NY');

INSERT INTO room (hotel_id, room_size, price_per_night) VALUES
(1, 'Double Full Beds', 110.00),
(1, 'Queen', 125.00),
(1, 'Double Queen Beds', 150.00),
(1, 'King', 165.00),

(2, 'Double Full Beds', 110.00),
(2, 'Queen', 125.00),
(2, 'Double Queen Beds', 150.00),
(2, 'King', 165.00),

(3, 'Double Full Beds', 110.00),
(3, 'Queen', 125.00),
(3, 'Double Queen Beds', 150.00),
(3, 'King', 165.00),

(4, 'Double Full Beds', 110.00),
(4, 'Queen', 125.00),
(4, 'Double Queen Beds', 150.00),
(4, 'King', 165.00);

INSERT INTO customers (email, first_name, last_name, phone_number, password, total_points) VALUES
('johnjacob@gmail.com', 'john', 'jacob', '123-456-7890', 'Dinosaurs1', 450),
('sarahseaweed@gmail.com', 'sarah', 'swanson', '987-456-8524', 'EaglesFly4', 600),
('tinaturner@gmail.com', 'tina', 'tinsle', '456-856-4521', 'Diamonds4Sale', 150),
('aaronagway@gmail.com', 'aaron', 'anthony', '678-124-7541', '5Segways4U', 300);

INSERT INTO reservations (customer_id, hotel_id, room_id, wifi_amenity, breakfast_amenity, parking_amenity,
check_in_date, check_out_date, number_of_guests, total_amenity_price, total_room_price) VALUES
(1, 1, 1, 1, NULL, NULL, '2023-06-12', '2023-06-19', 3, 0.00, 0.00),
(2, 2, 5, NULL, 1, NULL, '2023-06-20', '2023-06-25', 1, 0.00, 0.00),
(3, 3, 10, NULL, NULL, 1, '2023-04-09', '2023-04-11', 0, 0.00, 0.00),
(4, 4, 15, 1, 1, 1, '2023-06-26', '2023-07-01', 4, 0.00, 0.00);