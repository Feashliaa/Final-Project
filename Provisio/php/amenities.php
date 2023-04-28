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
        <h1>Amenities & Services</h1>
    </div>

    <div class="pool"></div>

    <div class="amenities-grid">
        <div class="align-center">
            <img alt="customer service icon" src="../images/user.png">
            <h4>front desk</h4>
            <p>Our front desk is available<br>24/7. Just dial 0 from<br>the room phone.</p>
        </div>
        <div class="align-center">
            <img alt="pool icon" src="../images/pool.png">
            <h4>indoor pool</h4>
            <p>Guests can enjoy the<br>heated indoor pool<br>available 8am-10pm</p>
        </div>
        <div class="align-center">
            <img alt="key icon" src="../images/key.png">
            <h4>services</h4>
            <p>We offer breakfast delivered<br>to your room as well<br> as cleaning services.</p>
        </div>
    </div>

    <div class="amenities-grid">
        <div class="align-center">
            <img alt="wifi icon" src="../images/wifi.png">
            <h4>wifi</h4>
            <p><b>$12.99 flat fee<br>for your entire stay!</b></p>
            <p>Enjoy access to our high-speed<br>WI-FI where you can access<br>your emails, stream content<br>and much more!</p>
        </div>

        <div class="align-center">
            <img alt="parking icon" src="../images/car.png">
            <h4>parking</h4>
            <p><b>$19.99 per night<br>24/7 access</b></p>
            <p>Our secure parking ensures<br>our guests have a worry free stay<br>when booking with Provisio!</p>
        </div>
        <div class="align-center">
            <img alt="dinner plate icon" src="../images/breakfast.png">
            <h4>breakfast</h4>
            <p><b>$8.99 per night<br>available 7am-11am</b></p>
            <p>Start your morning off right with<br>our continental breakfast.<br>Enjoy a variety of items to<br>choose from!</p>
        </div>
    </div>
    <footer>
        <p>1000 Galvin Road South, Bellevue NE 68005 <br> 402.293.2000 | 1.800.756.7920</p><br>
        &copy; 2023 Provisio Booking | Website by Bravo Team
    </footer>
</body>

</html>