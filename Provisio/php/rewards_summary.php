<?php
// Start the session
session_start();
if (!isset($_SESSION['email'])) {
    // user is not logged in, redirect to page that they were previously on
    header("Location: " . $_SERVER['HTTP_REFERER']);
    $_SESSION['message'] = "You must be logged in to view this page.";
    exit();
}

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

    <nav class="nav">
        <a href="index.php">Home</a>
        <a href="about.php">About</a>
        <a href="locations.php">Locations</a>
        <a href="rooms.php">Rooms</a>
        <a href="amenities.php">Amenities</a>
        <button id="login-btn" class="login-btn" onclick="checkLogin()"><?php echo isset($_SESSION['email']) ? 'Logout' : 'Login'; ?></button>
        <button onclick="window.location.href='../php/reservation.php';" class="book-now-btn">Book Now</button>
    </nav>
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
        <table class="center" id="rwds-table">
            <tr>
                <th>reservation id</th>
                <th>location</th>
                <th>check-in date</th>
                <th>check-out date</th>
                <th>points earned</th>
            </tr>
            <?php
            // Loop through rewards data and generate table rows dynamically
            $total_points = 0;
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
                        $location = "Springfield, Massachusetts";
                        break;
                    case 2:
                        $location = "Mobile, Alabama";
                        break;
                    case 3:
                        $location = "West Palm Beach, Florida";
                        break;
                    case 4:
                        $location = "Owego, New York";
                        break;
                    default:
                        $location = "Unknown";
                }

                echo "<tr>";
                echo "<td>$reservation_id</td>";
                echo "<td>$location</td>";
                echo "<td>$checkin_date</td>";
                echo "<td>$checkout_date</td>";
                echo "<td>$points_earned</td>";
                echo "</tr>";
            }
            ?>
            <tr class="total">
                <td colspan="4">Total Points:</td>
                <td><?php echo $total_points; ?></td>
            </tr>
        </table>
    </div>

    <footer>
        <p>1000 Galvin Road South, Bellevue NE 68005 <br> 402.293.2000 | 1.800.756.7920</p><br>
        &copy; 2023 Provisio Booking | Website by Bravo Team
    </footer>
</body>

</html>