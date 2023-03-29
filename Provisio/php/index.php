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
    <script src="../js/popup.js"></script>
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

    <div class="align-center">
        <h1>Top Choice For Hotel Accomodations</h1>
        <img src="../images/locations.jpg" alt="locations">
        <h4>Multiple Locations</h4>
    </div>


    <!--icon block--->
    <div class="icon-grid">
        <div class="align-center">
            <img alt="wifi icon" class="img-icon" src="../images/wifi.png">
            <h4>wifi</h4>
        </div>
        <div class="align-center">
            <img alt="keys icon" class="img-icon" src="../images/key.png">
            <h4>room service</h4>
        </div>
        <div class="align-center">
            <img alt="parking icon" class="img-icon" src="../images/car.png">
            <h4>parking</h4>
        </div>
        <div class="align-center">
            <img alt="dinner plate icon" class="img-icon" src="../images/breakfast.png">
            <h4>breakfast</h4>
        </div>
        <div class="align-center">
            <img alt="customer support icon" class="img-icon" src="../images/user.png">
            <h4>front desk support</h4>
        </div>
    </div>
    <p></p>

    <!--rooms block-->
    <div class="room-grid">
        <div class="align-center">
            <img src="../images/dbl_full.jpg" onclick="onClick(this)">
            <h4 class="room-font">Double Full</h4>
        </div>
        <div class="align-center">
            <img src="../images/queen.jpg" onclick="onClick(this)">
            <h4 class="room-font">Queen</h4>
        </div>
        <div class="align-center">
            <img src="../images/dbl_queen.jpg" onclick="onClick(this)">
            <h4 class="room-font">Double Queen</h4>
        </div>
        <div class="align-center">
            <img src="../images/king.jpg" onclick="onClick(this)">
            <h4 class="room-font">King</h4>
        </div>
    </div>

    <div class="overlay" style="display:none;"></div>

    <div class="popup-parent">
        <div id="popup" onclick="this.style.display='none'; document.querySelector('.caption').style.display='none'; document.querySelector('.overlay').style.display = 'none';">
            <span class="close">&times;</span>
            <img id="popup_image" style="max-width: 100%; max-height: 100%;" onclick="onClick(this)">
            <div class="caption" style="display:none">
                <h1>Provisio Hotel Booking</h1>
            </div>
        </div>
    </div>

    <footer>
        <p>1000 Galvin Road South, Bellevue NE 68005 <br> 402.293.2000 | 1.800.756.7920</p><br>
        &copy; 2023 Provisio Booking | Website by Bravo Team
    </footer>
</body>

</html>