<?php
// Start the session
session_start();
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
        <a href="contact.php">Contact Us</a>
        <button id="login-btn" class="login-btn" onclick="checkLogin()"><?php echo isset($_SESSION['email']) ? 'Logout' : 'Login'; ?></button>

        <button onclick="window.location.href='reservation.php';" class="book-now-btn">Book Now</button>
    </nav>
    <div class="nav2">
        <p>
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
            <tr>
                <td>PROV123456</td>
                <td>West Palm Beach, FL</td>
                <td>03/21/2022</td>
                <td>03/23/2022</td>
                <td>300</td>
            </tr>
            <tr>
                <td>PROV987654</td>
                <td>Springfield, MA</td>
                <td>12/18/2022</td>
                <td>12/21/2022</td>
                <td>450</td>
            </tr>
            <tr class="total">
                <td colspan="4">Total Points:</td>
                <td>750</td>
            </tr>
        </table>
    </div>



    <footer>
        <p>1000 Galvin Road South, Bellevue NE 68005 <br> 402.293.2000 | 1.800.756.7920</p><br>
        &copy; 2023 Provisio Booking | Website by Bravo Team
    </footer>
</body>

</html>