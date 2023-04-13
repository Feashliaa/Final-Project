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
    <link rel="stylesheet" href="../css/login.css" type="text/css">
    <link rel="stylesheet" href="../css/log-reg.css" type="text/css">
    <link rel="icon" type="image/png" href="../favicons/letter_p.png" />
    <script src="../js/login.js" defer></script>
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
        <h1>Welcome Provisio Member!</h1>
        <p style="text-align: center">Login below or click the sign up to get started.</p>
    </div>

    <div id="notification">User Logged in Successfully</div>

    <br>

    <div id="registration_container">
        <div id="booking_image"></div>
        <div id="login-signup-container">
            <div id="login-container">
                <div id="login-text">Login</div>
            </div>
            <div id="sign-up-container">
                <a href="registration.php" id="registration_link">
                    <div id="sign-up-text">Sign Up</div>
                </a>
            </div>
        </div>
        <div id="header_subheader_container">
            <div id="header">Start Booking Hotels At Provisio </div>
            <div id="subheader"> Start Booking Now with the Great Tool Provisio!</div>
        </div>
        <form method="POST" action="signin.php">
            <div id="input_fields_container">
                <div id="email_input">
                    <label for="email">Email<span>*</span></label>
                    <input type="email" id="email" name="email" required placeholder="example@domain.com">
                </div>
                <div id="password_input">
                    <label for="password">Password<span>*</span></label>
                    <input type="password" id="password" name="password" required class="password-input">
                </div>
                <label>
                    <input type="checkbox" onclick="togglePasswordVisibility()" id="showPasswordCheckbox"> Show Password
                </label>
            </div>

            <button id="signup-login_button" onclick="login(event)">Login</button>
        </form>
        <div id="dont_have_account_container">
            <div id="dont_have_account_text">Don't have an account? <a href="registration.php" id="signup_link">Sign
                    Up</a></div>
        </div>
    </div>


    <footer>
        <p>1000 Galvin Road South, Bellevue NE 68005 <br> 402.293.2000 | 1.800.756.7920</p><br>
        &copy; 2023 Provisio Booking | Website by Bravo Team
    </footer>
</body>

</html>