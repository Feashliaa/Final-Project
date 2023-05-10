<?php
/* 
CSD 460 Capstone in Software Development
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
    <script src="../js/popup.js"></script>
    <script src="../js/checks.js"></script>
    <script src="../js/login.js"></script>
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

            <button onclick="window.location.href='../php/reservation.php';" class="book-now-btn">Reservation</button>

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

    <h2 id="h2title">Let Provisio Welcome You At Your Next Stay</h2>

    <p id="details">Choose from one of several locations Provisio has to offer. Each
        location has several room types as well as the option to choose what amenities suit your needs.
        When booking Provisio all members earn Provisio Rewards
        points for every night booked!
    </p>

    <div id="locationcontainer">
        <h3 id="h3title">Beach Access, Shopping & Entertainment</h3>
        <img id="imgcenter" src="../images/westpalmbeach.jpeg" alt="" style="width:100%; height: 400px">
        <p id="details">Our West Palm Beach, Florida location offers guests
            access to exquisite shops, fine dining, art museums and more! Located along Florida's
            Atlantic Ocean coast, this location provides sandy beaches for those who love the water
            and for those who love to shop, the Palm Beach Outlets provide high-end retail at low cost.
        </p>
        <div id="buttoncenter">
            <button id="featurebutton" onclick="window.location.href='locations.php';">See More Locations</button>
        </div>
    </div>

    <div id="roomscontainer">
        <h3 id="h3title">Style Fit For a King</h3>
        <img id="imgcenter" src="../images/kingsuite.jpeg" alt="" style="width:100%; height: 400px">
        <p id="details">Enjoy your stay in a room fit for a king! These rooms offer pillow-top
            beds with luxury hotel bedding, ensuring your slumber is well... fit for a king. Also
            available is our full-size sofa-sleeper for your extra guests and dedicated work desk
            in all our rooms.
        </p>
        <div id="buttoncenter">
            <button id="featurebutton" onclick="window.location.href='rooms.php';">See More Rooms</button>
        </div>
    </div>

    <div id="amenitiescontainer">
        <h3 id="h3title">Worked Up An Appetite?</h3>
        <img id="imgcenter" src="../images/breakfast.jpeg" alt="" style="width:100%; height: 400px">
        <p id="details">Provisio offers guests several amenities to choose from when booking
            with our state-of-the-art reservation system. Our continental breakfast is available every morning for those
            looking for convenient on-site amenities.
        </p>
        <div id="buttoncenter">
            <button id="featurebutton" onclick="window.location.href='amenities.php';">See More Amenities</button>
        </div>
    </div>
    <footer>
        <p>1000 Galvin Road South, Bellevue NE 68005 <br> 402.293.2000 | 1.800.756.7920</p><br>
        &copy; 2023 Provisio Booking | Website by Bravo Team
    </footer>
    </div><!--end content-->
</body>

</html>