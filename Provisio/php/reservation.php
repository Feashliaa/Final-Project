<?php
// Start the session
session_start();
if (!isset($_SESSION['email'])) {
    // user is not logged in, redirect to page that they were previously on
    header("Location: " . $_SERVER['HTTP_REFERER']);
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
    <link rel="stylesheet" type="text/css" href="../css/styles2.css">
    <link rel="icon" type="image/png" href="../favicons/letter_p.png" />
    <script src="../js/reservation.js"></script>
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
                <option>Springfield</option>
                <option>Mobile</option>
                <option>West Palm Beach</option>
                <option>Owego</option>
            </select><br>

            <label for="guest">GUEST COUNT:</label><br>
            <select name="guest" id="guest">
                <option hidden selected></option>
                <option>1-2 Guests</option>
                <option>3-5 Guests</option>
            </select><br>

            <label for="guest">ROOMS:</label><br>
            <select name="Room" id="room">
                <option hidden selected></option>
                <option>Double Full Beds - $110/night</option>
                <option>Queen - $125/night</option>
                <option>Double Queen Beds - $150/night</option>
                <option>King - $165/night</option>
            </select>
            <button class="submit-btn" id="look-up-btn" style=" max-width:450px; margin-top: 46px;">Look Up</button>
        </div>

        <div id="res-center">
            <label for="checkin">CHECK IN DATE</label><br>
            <input type="date" id="checkin" name="checkin" type="datetime-local"><br>

            <label for="checkout">CHECK OUT DATE</label><br>
            <input type="date" id="checkout" name="checkout" type="datetime-local"><br>

            <div id="rescheck">
                <label for="amenities">Choose your Amenities:</label><br>
                <input type="checkbox" name="amenities" value="wifi"> WI-FI ($12.99)</input><br>
                <input type="checkbox" name="amenities" value="breakfast"> Breakfast ($8.99/night)</input><br>
                <input type="checkbox" name="amenities" value="parking"> Parking ($19.99/night)</input><br>
            </div>

            <button class="submit-btn" id="submit-btn" style=" max-width:450px; margin-top: 87.5px;" disabled>Submit</button>

        </div>
    </div>

    <footer>
        <p>1000 Galvin Road South, Bellevue NE 68005 <br> 402.293.2000 | 1.800.756.7920</p><br>
        &copy; 2023 Provisio Booking | Website by Bravo Team
    </footer>
</body>

</html>