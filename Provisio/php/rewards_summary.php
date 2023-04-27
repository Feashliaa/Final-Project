<?php
/* CSD 460 Capstone in Software Development
Bravo Team: Riley Dorrington, Kelly Bordonhos, Robin Tageant, Christopher Morales
03/13/2023 - 05/14/2023 */

// Start the session
session_start();

// Check if user is logged in
if (!isset($_SESSION['email'])) {
    // nothing to do here
    $user_logged_in = false;
} else {
    $user_logged_in = true;
    // if user gets deleted from database, redirect to registration page
    $email = $_SESSION['email'];
    $mysqli = new mysqli('localhost', 'root', 'root', 'probrav');
    $result = $mysqli->query("SELECT * FROM customers WHERE email = '$email'");
    if ($result->num_rows == 0) {
        // user does not exist, redirect to registration page
        session_destroy();
        header("Location: registration.php");
        exit();
    }

    // Get customer id from email
    $customer_id_query = "SELECT customer_id FROM customers WHERE email = '$email'";
    $customer_id_result = $mysqli->query($customer_id_query);
    $customer_id_row = $customer_id_result->fetch_assoc();
    $customer_id = $customer_id_row['customer_id'];

    // Query the database for rewards data
    $rewards_query = "SELECT * FROM reservations WHERE customer_id = '$customer_id'";
    $rewards_result = $mysqli->query($rewards_query);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="content-language" content="en-us">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Provisio</title>
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <link rel="icon" type="image/png" href="../favicons/letter_p.png" />
    <script src="../js/checks.js"></script>
</head>

<body>
    <header id="top">
        <div class="header-text">
            <h1>Provisio</h1>
        </div>
    </header>

    <div class="nav-wrapper">
        <nav class="nav">
            <a href="index.php">Home</a>
            <a href="about.php">About</a>
            <a href="locations.php">Locations</a>
            <a href="rooms.php">Rooms</a>
            <a href="amenities.php">Amenities</a>

            <button onclick="window.location.href='../php/reservation.php';" class="book-now-btn">Book Now</button>

            <div class="login-container">
                <button id="login-btn" class="login-btn" onclick="checkLogin()">
                    <?php echo isset($_SESSION['email']) ? 'Logout' : 'Login'; ?>
                </button>
                <div class="dropdown-form">
                    <form action="signin.php" method="post">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" placeholder="Email" required />

                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" placeholder="Password" required />

                        <button type="submit">Submit</button>

                        <div id="noAccount">
                            <button type="button" onclick="window.location.href='registration.php'">Don't have an account?</button>
                        </div>
                    </form>
                </div>
            </div>
        </nav>
    </div>

    <div class="nav2">
        <p style="font-size:1.5rem;">
            Earn 150 points for every night booked!&nbsp;&nbsp;
            <button onclick="window.location.href='rewards_summary.php';" class="rewards-btn">View Rewards</button>
        </p>
    </div>

    <div>
        <h1>Provisio Rewards Summary</h1>
    </div>

    <div>
        <?php
        // Loop through rewards data and generate table rows dynamically
        $total_points = 0;
        if (!$user_logged_in) {

            echo "<div class='center'>No Data - User Not Logged In</div>";

        } else {
            $is_mobile = false;
            if (isset($_SERVER['HTTP_USER_AGENT']) && preg_match('/mobile/i', $_SERVER['HTTP_USER_AGENT'])) {
                // if user agent contains "mobile", assume it's a mobile device
                $is_mobile = true;
            }

            if ($is_mobile) {
                // Stacked card layout, one for each reservation
                while ($row = $rewards_result->fetch_assoc()) {
                    $reservation_id = $row['reservation_id'];
                    $location = $row['hotel_id'];
                    $checkin_date = $row['check_in_date'];
                    $checkout_date = $row['check_out_date'];
                    $points_earned = $row['points_earned'];
                    $total_points += $points_earned;

                    // switch statement for hotel id
                    switch ($location) {
                        case 1:
                            $location_text = "Springfield, Massachusetts";
                            break;
                        case 2:
                            $location_text = "Mobile, Alabama";
                            break;
                        case 3:
                            $location_text = "West Palm Beach, Florida";
                            break;
                        case 4:
                            $location_text = "Owego, New York";
                            break;
                        default:
                            $location_text = "Unknown";
                    }

                    echo "<div class='rwds-card'>";
                    echo "<div class='rwds-card-header'>Reservation ID: $reservation_id</div>";
                    echo "<div class='rwds-card-content'>";
                    echo "<div><b>Location:</b> $location_text</div>";
                    echo "<div><b>Check-in Date:</b> $checkin_date</div>";
                    echo "<div><b>Check-out Date:</b> $checkout_date</div>";
                    echo "<div><b>Points Earned:</b> $points_earned</div>";
                    echo "</div>"; // close card content
                    echo "</div>"; // close card
                }

                echo "<div class='rwds-card'>";
                echo "<div class='rwds-card-header'>Total Points</div>";
                echo "<div class='rwds-card-content'>";
                echo "<div>$total_points</div>";
                echo "</div>"; // close card content
                echo "</div>"; // close card

            } else {
                // Table layout, one row for each reservation
                echo "<table class='center' id='rwds-table'>";
                echo "<tr>";
                echo "<th>reservation id</th>";
                echo "<th>location</th>";
                echo "<th>check-in date</th>";
                echo "<th>check-out date</th>";
                echo "<th>points earned</th>";
                echo "</tr>";

                // Loop through rewards data
                while ($row = $rewards_result->fetch_assoc()) {
                    $reservation_id = $row['reservation_id'];
                    $location = $row['hotel_id'];
                    $checkin_date = $row['check_in_date'];
                    $checkout_date = $row['check_out_date'];
                    $points_earned = $row['points_earned'];
                    $total_points += $points_earned;

                    // switch statement for hotel id
                    switch ($location) {
                        case 1:
                            $location_text = "Springfield, Massachusetts";
                            break;
                        case 2:
                            $location_text = "Mobile, Alabama";
                            break;
                        case 3:
                            $location_text = "West Palm Beach, Florida";
                            break;
                        case 4:
                            $location_text = "Owego, New York";
                            break;
                        default:
                            $location_text = "Unknown";
                    }

                    // Table row, one for each reservation
                    echo "<tr>";
                    echo "<td>$reservation_id</td>";
                    echo "<td>$location_text</td>";
                    echo "<td>$checkin_date</td>";
                    echo "<td>$checkout_date</td>";
                    echo "<td>$points_earned</td>";
                    echo "</tr>";
                }

                // Total points row, at the bottom of the table
                echo "<tr class='total'>";
                echo "<td colspan='4'>Total Points:</td>";
                echo "<td>$total_points</td>";
                echo "</tr>";
                echo "</table>";
            }
        }
        ?>

    </div>

    <footer>
        <p>1000 Galvin Road South, Bellevue NE 68005 <br> 402.293.2000 | 1.800.756.7920</p><br>
        &copy; 2023 Provisio Booking | Website by Bravo Team
    </footer>
</body>

</html>