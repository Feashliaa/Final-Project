<?php
/* CSD 460 Capstone in Software Development
Bravo Team: Riley Dorrington, Kelly Bordonhos, Robin Tageant, Christopher Morales
03/13/2023 - 05/14/2023 */


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

    <div class="nav-wrapper">
        <nav class="nav">
            <a href="index.php">Home</a>
            <a href="about.php">About</a>
            <a href="locations.php">Locations</a>
            <a href="rooms.php">Rooms</a>
            <a href="amenities.php">Amenities</a>

            <button onclick="window.location.href='../php/reservation.php';" class="book-now-btn">Book Now</button>

            <div class="login-container">
                <button id="login-btn" class="login-btn" onclick="checkLogin()">
                    <?php echo isset($_SESSION['email']) ? 'Logout' : 'Login'; ?>
                </button>
                <div class="dropdown-form">
                    <form id="signin-form" action="signin.php" method="post">
                        <div id="error-message" style="display: none;"></div>
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" placeholder="Email" required />

                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" placeholder="Password" required />

                        <button type="submit">Submit</button>

                        <div id="noAccount">
                            <button type="button" onclick="window.location.href='registration.php'">Don't have an account?</button>
                        </div>
                    </form>
                </div>
            </div>
        </nav>
    </div>


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
        <h2 id="res-title">LOOK UP OR CREATE RESERVATION</h2>
    </div>

    <div class="res-box">
        <div id="res-left">


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
                <option disabled>Holidays are subject to 5% increased rates</option>
                <option>Double Full Beds - $115.50/night</option>
                <option>Queen - $131.25/night</option>
                <option>Double Queen Beds - $157.50/night</option>
                <option>King - $173.25/night</option>
            </select>
        </div>

        <div id="res-center">
            <label for="checkin">CHECK IN DATE</label><br>
            <input type="date" id="checkin" name="checkin"><br>

            <label for="checkout">CHECK OUT DATE</label><br>
            <input type="date" id="checkout" name="checkout"><br>

            <div id="rescheck">
                <label for="amenities">Choose your Amenities:</label><br>
                <input type="checkbox" name="amenities" id="wifi" value="wifi"> WI-FI ($12.99)</input><br>
                <input type="checkbox" name="amenities" id="breakfast" value="breakfast"> Breakfast ($8.99/night)</input><br>
                <input type="checkbox" name="amenities" id="parking" value="parking"> Parking ($19.99/night)</input><br>
            </div>

            <br>
            <br>

        </div>

        <div>
            <button class="submit-btn" id="submit-btn" disabled>Submit</button>
        </div>

        <div>
            <hr>
            <div id="reservation_lookup">
                <label for="id">RESERVATION ID: Must be Logged in to Check Reservation</label>
                <input type="text" id="id" name="id" value="">
                <button class="submit-btn" id="look-up-btn">Look Up</button>
            </div>
        </div>

    </div>

    <footer>
        <p>1000 Galvin Road South, Bellevue NE 68005 <br> 402.293.2000 | 1.800.756.7920</p><br>
        &copy; 2023 Provisio Booking | Website by Bravo Team
    </footer>
</body>

</html>