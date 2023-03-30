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
        <p style="font-size:1.5rem;">
            Earn 150 points for every night booked!&nbsp;&nbsp;
            <button onclick="window.location.href='rewards_summary.php';" class="rewards-btn">View Rewards</button>
        </p>
    </div>

    <div class="hero-image">
        <div class="hero-text">
            <h1>Premier Hotel Booking</h1>
        </div>
    </div>

    <h1>Multiple Locations</h1>
    <div class="location-container">
        <div class="align-center">
            <div class="location-desc">
                <img src="../images/owego_ny.jpg">
                <p class="twn-desc"><b>The town that means "Where The<br>Valley Widens..."</b></p>
                <h2>Owego, NY</h2>
                <p>Included Amenities and Services:<br>Indoor Heated Pool<br>24/7 Front Desk Support<br>Room
                    Service<br><br>Additional Amenities Available:<br>
                    High-Speed WI-FI<br>Secure Parking<br>Continental Breakfast</p>
            </div>
        </div>
        <div class="align-center">
            <div class="location-desc">
                <img src="../images/springfield_ma.jpg">
                <p class="twn-desc"><b>This "City of Firsts" has so much<br>history to explore!"</b></p>
                <h2>Springfield, MA</h2>
                <p>Included Amenities and Services:<br>Indoor Heated Pool<br>24/7 Front Desk Support<br>Room
                    Service<br><br>Additional Amenities Available:<br>
                    High-Speed WI-FI<br>Secure Parking<br>Continental Breakfast</p>
            </div>
        </div>
        <div class="align-center">
            <div class="location-desc">
                <img src="../images/westpalmbeach.jpg">
                <p class="twn-desc"><b>So much beach, so little time!</b></p>
                <h2>West Palm Beach, FL</h2>
                <p>Included Amenities and Services:<br>Indoor Heated Pool<br>24/7 Front Desk Support<br>Room
                    Service<br><br>Additional Amenities Available:<br>
                    High-Speed WI-FI<br>Secure Parking<br>Continental Breakfast</p>
            </div>
        </div>
        <div class="align-center">
            <div class="location-desc">
                <img src="../images/mobile.jpg">
                <p class="twn-desc"><b>This port city has so much to offer!</b></p>
                <h2>Mobile, AL</h2>
                <p>Included Amenities and Services:<br>Indoor Heated Pool<br>24/7 Front Desk Support<br>Room
                    Service<br><br>Additional Amenities Available:<br>
                    High-Speed WI-FI<br>Secure Parking<br>Continental Breakfast</p>
            </div>
        </div>
    </div>


    <footer>
        <p>1000 Galvin Road South, Bellevue NE 68005 <br> 402.293.2000 | 1.800.756.7920</p><br>
        &copy; 2023 Provisio Booking | Website by Bravo Team
    </footer>
</body>

</html>