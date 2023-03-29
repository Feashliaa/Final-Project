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
    <link rel="stylesheet" href="../css/registration.css" type="text/css">
    <link rel="stylesheet" href="../css/log-reg.css" type="text/css">
    <link rel="icon" type="image/png" href="../favicons/letter_p.png" />
    <script src="../js/registration.js" async></script>
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
        <h1>Members Earn Points For Every Stay!</h1>
        <p style="text-align: center">Click the link above to learn more!</p>
    </div>

    <div id="registration_container">
        <div id="booking_image"></div>
        <div id="login-signup-container">
            <div id="login-container">
                <a href="login.php" id="login_link">
                    <div id="login-text">Login</div>
                </a>
            </div>
            <div id="sign-up-container">
                <div id="sign-up-text">Sign Up</div>
            </div>
        </div>
        <div id="header_subheader_container">
            <div id="header">Start Booking Hotels At Provisio </div>
        </div>
        <form method="POST" action="signup.php">
            <div id="input_fields_container">
                <div id="firstName">
                    <label for="firstName">First Name <span>*</span>
                    </label>
                    <input type="text" id="firstname" name="firstname" required>
                </div>
                <div id="lastName">
                    <label for="lastName">Last Name <span>*</span>
                    </label>
                    <input type="text" id="lastname" name="lastname" required>
                </div>
                <div id="email_input">
                    <label for="email">Email Address<span>*</span>
                    </label>
                    <input type="email" id="email" name="email" required placeholder="example@domain.com">
                </div>
                <div id="phoneNumber">
                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" name="phone" placeholder="(XXX) XXX-XXXX">
                </div>
                <div id="password_input">
                    <label for="password">Password <span>*</span>
                    </label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div id="password_confirm">
                    <label for="confirm_password">Confirm Password <span>*</span>
                    </label>
                    <input type="password" id="confirm_password" name="confirm_password" required>
                </div>
                <!-- Add the pop-up box element -->
                <div id="password-criteria-box">
                    <button id="close-password-criteria-box">X</button>
                    <p>Password must be at least 8 characters long</p>
                    <p>Include at least one uppercase letter</p>
                    <p>Include one lowercase letter</p>
                    <p>Include one number</p>
                </div>
            </div>
            <button id="signup-login_button" onclick="signup(event)">Sign Up</button>
        </form>
        <div id="dont_have_account_container">
            <div id="dont_have_account_text">Have an account? <a href="login.php" id="signup_link">Login</a>
            </div>
        </div>
    </div>


    <footer>
        <p>1000 Galvin Road South, Bellevue NE 68005 <br> 402.293.2000 | 1.800.756.7920</p><br>
        &copy; 2023 Provisio Booking | Website by Bravo Team
    </footer>

</body>

</html>