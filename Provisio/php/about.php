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
    <script src="../js/contact_us_email.js" async></script>
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

            <div class="contact-grid">
                <form class="contact" id="contact-form">
                    <p class="contact-p"><span>Thank you for your interest in Provisio!<br>
                            Have comments or questions for us?</span><br>
                        Use the form below <br> Or email us at <a class="email_text" href="mailto:provisiobravo@gmail.com">provisiobravo@gmail.com</a> and we will be in touch!</p>
                    <label for="name" style="font-weight: bold; color:teal; text-align: center; display: block;">Name:</label><br>
                    <input type="text" id="name" name="name" value=""><br>
                    <label for="email" style="font-weight: bold; color:teal; text-align: center; display: block;">E-Mail:</label><br>
                    <input type="text" id="contact-email" name="contact-email" value=""><br>
                    <label for="message" style="font-weight: bold; color:teal; text-align: center; display: block;">Message:</label><br>
                    <textarea id="message" name="message" maxlength="1000"></textarea> <br><br>
                    <button class="submit_btn_contact_form" type="submit">Send Email</button>
                </form>
                <div class="contact">
                    <h2>Reservations</h2>
                    <p>To Make A Reservation, Give Us A Call!<br><br><span id="tollphone">1.800.756.7920</span></p><br>
                    <h2>Visit Us</h2>
                    <p><span id="address">1000 Galvin Road South<br>South Bellevue, NE 68005</span></p>
                </div>
            </div>

            <h3 id="abouttagline">Book with Provisio and let us handle the rest!</h3>
        </span>
    </p>

    <footer>
        <p>1000 Galvin Road South, Bellevue NE 68005 <br> 402.293.2000 | 1.800.756.7920</p><br>
        &copy; 2023 Provisio Booking | Website by Bravo Team
    </footer>
</body>

</html>