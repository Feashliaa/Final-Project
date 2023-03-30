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

    <div class="hero-image">
        <div class="hero-text">
            <h1>Premier Hotel Booking</h1>
        </div>
    </div>

    <div>
        <h1>Contact Us</h1>
    </div>

    <div class="contact-grid">
        <div>
            <form class="contact" action="post">
                <p class="contact-p"><span>Thank you for your interest in Provisio!<br>
                        Have comments or questions for us?</span><br>
                    Please use the form below and we will be in touch!</p>
                <label for="name">Name:</label><br>
                <input type="text" id="name" name="name" value="" style="width: 450px; height: 25px;"><br>
                <label for="email">E-mail:</label><br>
                <input type="text" id="email" name="email" value="" style="width: 450px; height: 25px;"><br>
                <label for="message">Message:</label><br>
                <input type="text" id="message" name="message" value="" style="width: 450px; height: 125px;"><br><br>
                <input type="submit" value="Submit" style="width: 125px; height: 50px;">
            </form>
        </div>
        <div class="contact">
            <h2>Reservations</h2>
            <p>To Make A Reservation, Give Us A Call!<br><br><span id="tollphone">1.800.756.7920</span></p><br>
            <h2>Visit Us</h2>
            <p><span id="address">1000 Galvin Road South<br>South Bellevue, NE 68005</span></p>
        </div>

    </div>

    <footer>
        <p>1000 Galvin Road South, Bellevue NE 68005 <br> 402.293.2000 | 1.800.756.7920</p><br>
        &copy; 2023 Provisio Booking | Website by Bravo Team
    </footer>
</body>

</html>