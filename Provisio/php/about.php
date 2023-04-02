<?php
// Start the session
session_start();

// check for $_SESSION['message'] = "You must be logged in to view this page.";
if (isset($_SESSION['message'])) {
    echo "<script>alert('" . $_SESSION['message'] . "');</script>";
    unset($_SESSION['message']);
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
    <link rel="stylesheet" type="text/css" href="../css/styles2.css">
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


    <div id="imgtitleholder">
        <div class="header-text" style="background-image: url('../images/lobby.jpeg'); background-size: cover; height: 200px;">
            <h1>About Provisio Hotels</h1>
        </div>
    </div>

    <p id="details"><span id="aboutsize">About Us</span><br>Hotel Reservation Site</p>
    <p id="details"><span id="ptitlesize">Top Choice For Hotel Booking</span><br><br>
        <span id="pfontweight">Founded in 2023, Provisio currently has four locations located along the East Coast.
            Each location provides a selection of rooms to choose from as well as add-on amenities.
            Provisio's exclusive brand includes heated indoor pools at all locations. <br><br>

            With Provisio's loyalty program customers earn points for each night booked.
            Points can be used for future stays at any of the Provisio locations and customers can view a
            summary of their accumulated points through their login.<br><br>

            Provisio's easy-to-navigate site allows customers to check out all the options before
            placing a reservation. The simplified registration process makes enrollment with Provisio
            easy while providing high-end security features to protect customer data. <br><br>

            <h3 id="abouttagline">Book with Provisio and let us handle the rest!</h3>
        </span>
    </p>
    </div><!--end content-->

    <footer>
        <p>1000 Galvin Road South, Bellevue NE 68005 <br> 402.293.2000 | 1.800.756.7920</p><br>
        &copy; 2023 Provisio Booking | Website by Bravo Team
    </footer>
</body>

</html>