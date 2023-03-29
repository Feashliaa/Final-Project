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
        <button onclick="window.location.href='../php/reservation.php';" class="book-now-btn">Book Now</button>
    </nav>
    <div class="nav2">
        <p>
            Earn 150 points for every night booked!&nbsp;&nbsp;
            <button onclick="window.location.href='rewards_summary.php';" class="rewards-btn">View Rewards</button>
        </p>
    </div>

    <div class="hero-image">
        <div class="hero-text">
            <h1>Premier Hotel Booking</h1>
        </div>
    </div>

    <div>
        <h1>Learn More About Us</h1>
    </div>

    <div class="about">
        <img src="../images/reserved.jpg" alt="reservation" class="align-left" />
        <p><br>
            Founded in 2023, Provisio has been voted as top choice for booking hotel accommodations for a number of
            locations!<br><br>
            With our specialized booking system we provide reliable access for you to choose the dates for travel,
            the room size that suits your needs and even select amenities!
            <br>
            Earn loyalty points for each night you choose to book with Provisio, saving you money!
            <br>
            Create a secure login to track your previous reservations and loyalty points!
            <br><br>
            We offer :
        <ul class="bullet-right">
            <li>an easy to navigate site</li>

            <li>choice of available locations</li>

            <li>registration once you're ready</li>

            <li>secure login to protect your information</li>

            <li>room selection</li>

            <li>add-on amenities for what you need, when you need it</li>

            <li>provisio rewards club</li>
        </ul>

        Book with us and enjoy hassle-free reservation from the comfort of your home, or book while
        you're traveling.
        </p><br>
    </div>

    <div>
        <h2>We are here for you, whenever and wherever you need us!</h2>
    </div>

    <footer>
        <p>1000 Galvin Road South, Bellevue NE 68005 <br> 402.293.2000 | 1.800.756.7920</p><br>
        &copy; 2023 Provisio Booking | Website by Bravo Team
    </footer>
</body>

</html>