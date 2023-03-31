<?php
// Start the session
session_start();
if (!isset($_SESSION['email'])) {
    // user is not logged in, redirect to login page
    header("Location: index.php");
    // send to the index page a message that the user is not logged in
    $_SESSION['message'] = "You must be logged in to view this page.";
    exit();
}

$email = $_SESSION['email'];
$mysqli = new mysqli('localhost', 'root', 'root', 'probrav');
$result = $mysqli->query("SELECT * FROM customers WHERE email = '$email'");
if ($result->num_rows == 0) {
    // user does not exist, redirect to registration page
    session_destroy();
    header("Location: registration.php");
    exit();
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
    <script src="../js/functions.js" async></script>
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

    <div>
        <h1>Reservation</h1>
    </div>

    <div class="respic"></div>

    <div>
        <h2 id="res-title">LOOK UP OR MODIFY RESERVATION</h2>
    </div>

    <div class="res-box">
        <div id="res-left">
            <label for="id">RESERVATION ID: (enter only ID to locate booked reservation)</label><br>
            <input type="text" id="id" name="id" value=""><br>

            <label for="location">LOCATION:</label><br>
            <select name="location" id="location">
                <option hidden selected></option>
                <option>Owego, NY</option>
                <option>Springfield, MA</option>
                <option>West Palm Beach, FL</option>
                <option>Mobile, AL</option>
            </select><br>

            <label for="guest">GUEST COUNT:</label><br>
            <select name="guest" id="guest">
                <option hidden selected></option>
                <option>1-2 Guests</option>
                <option>3-5 Guests</option>
            </select><br>
        </div>

        <div id="res-center">
            <label for="checkin">CHECK IN DATE</label><br>
            <input type="date" id="checkin" name="checkin"><br>

            <label for="checkout">CHECK OUT DATE</label><br>
            <input type="date" id="checkout" name="checkout"><br>

            <div id="rescheck">
                <label for="amenities">Choose your Amenities:</label><br>
                <input type="checkbox" name="amenities" value="wifi">WI-FI ($12.99)</label><br>
                <input type="checkbox" name="amenities" value="breakfast">Breakfast ($8.99/night)</label><br>
                <input type="checkbox" name="amenities" value="parking">Parking ($19.99/night)</label><br>
            </div>
        </div>

        <div id="res-right">
            <h3>Reservation Summary:</h3>
            <textarea id="summary" rows="10" cols="20"></textarea>
        </div>
    </div>
    <div>
        <br>
        <button class="submit-btn" onclick="reservationSummary()">Submit</button>
        <button class="confirm-btn">Confirm</button>
        <br>
    </div>


    <footer>
        <p>1000 Galvin Road South, Bellevue NE 68005 <br> 402.293.2000 | 1.800.756.7920</p><br>
        &copy; 2023 Provisio Booking | Website by Bravo Team
    </footer>
</body>

</html>