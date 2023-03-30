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
            <button onclick="window.location.href='rewards_summary.html';" class="rewards-btn">View Rewards</button>
        </p>
    </div>

    <div class="hero-image">
        <div class="hero-text">
            <h1>Premier Hotel Booking</h1>
        </div>
    </div>

    <div>
        <h1>Amenities & Services</h1>
        <p style="text-align: center">Book Provisio and enjoy heated pools at all locations</p>
    </div>

    <div class="pool"></div>

    <div class="amenities-grid">
        <div class="align-center">
            <img alt="wifi icon" class="img-icon" src="../images/wifi.png">
            <h4>wifi</h4>
            <p><b>$12.99 flat fee<br>for your entire stay!</b></p>
            <p>Enjoy access to our high-speed<br>WI-FI where you can access<br>your emails, stream content<br>and much
                more!</p>
        </div>

        <div class="align-center">
            <img alt="parking icon" class="img-icon" src="../images/car.png">
            <h4>parking</h4>
            <p><b>$19.99 per night<br>24/7 access</b></p>
            <p>Our secure parking ensures<br>our guests have a worry free stay<br>when booking with Provisio!</p>
        </div>
        <div class="align-center">
            <img alt="dinner plate icon" class="img-icon" src="../images/breakfast.png">
            <h4>breakfast</h4>
            <p><b>$8.99 per night<br>available 7am-11am</b></p>
            <p>Start your morning off right with<br>our continental breakfast.<br>Enjoy a variety of items to<br>choose
                from!</p>
        </div>
    </div>

    <footer>
        <p>1000 Galvin Road South, Bellevue NE 68005 <br> 402.293.2000 | 1.800.756.7920</p><br>
        &copy; 2023 Provisio Booking | Website by Bravo Team
    </footer>
</body>

</html>