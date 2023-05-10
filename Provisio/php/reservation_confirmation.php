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
    <script src="../js/checks.js"></script>
    <script src="../js/reservation.js"></script>
    <script src="../js/reservation_confirmation.js"></script>
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
        <h1>Reservation Confirmation</h1>
    </div>

    <div class="respic"></div>

    <br><br>

    <div class="res-summary-box">
        <div id="grid-item-1">
            <h3 style="text-align:center">Reservation Summary:</h3>
            <div id="summary"></div>
        </div>
        <div id="grid-item-2">
            <button class="confirm-btn-reservation-confirmation" id="cancel-reservation">Cancel</button>
            <button class="confirm-btn-reservation-confirmation" id="confirm-reservation">Confirm</button>
        </div>
    </div>



    <footer>
        <p>1000 Galvin Road South, Bellevue NE 68005 <br> 402.293.2000 | 1.800.756.7920</p><br>
        &copy; 2023 Provisio Booking | Website by Bravo Team
    </footer>
</body>

</html>