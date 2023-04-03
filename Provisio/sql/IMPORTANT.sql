ALTER TABLE reservations
MODIFY COLUMN points_earned int(11) NOT NULL DEFAULT 0;
ALTER TABLE reservations
MODIFY COLUMN reservation_id INT(11) NOT NULL;