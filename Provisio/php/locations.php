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

            <button onclick="window.location.href='../php/reservation.php?source=book-now-btn';" class="book-now-btn">Reservation</button>

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

    <h1>Multiple Locations</h1>

    <div class="location-container">
        <div class="align-center">
            <div class="location-desc">
                <img src="../images/owego_ny.jpg">
                <p class="twn-desc"><b>The town that means "Where The Valley Widens..."</b></p>
                <h2 style="margin-top: auto;">Owego, NY</h2>
                <p>
                    <strong>Amenities Available:</strong><br>
                    High-Speed WI-FI<br>
                    Secure Parking<br>
                    Continental Breakfast<br><br>
                    <strong>Attractions:</strong><br>
                    <a href="https://tiogadowns.com/site.xml/" class="link" target="_blank">Tioga Downs Casino Resort</a><br>
                    <a href="https://www.milb.com/binghamton" class="link" target="_blank">Binghamton Rumble Ponies</a><br>
                    <a href="https://www.gobroomecounty.com/community/carousels" class="link" target="_blank">Broome County Carousels</a><br>
                    <a href="https://rossparkzoo.org/" class="link" target="_blank">Ross Park Zoo</a>
                </p>
                <button id="locations-button" onclick="window.location.href='reservation.php?source=Owego'" name="owego">Book Here</button>
            </div>
        </div>
        <div class="align-center">
            <div class="location-desc">
                <img src="../images/springfield_ma.jpg">
                <p class="twn-desc"><b>This "City of Firsts" has so much history to explore!</b></p>
                <h2 style="margin-top: auto;">Springfield, MA</h2>
                <p>
                    <strong>Amenities Available:</strong><br>
                    High-Speed WI-FI<br>
                    Secure Parking<br>
                    Continental Breakfast<br><br>
                    <strong>Attractions:</strong><br>
                    <a href="https://springfieldmuseums.org/about/dr-seuss-sculpture-garden/" class="link" target="_blank">Dr. Seuss National Memorial Sculpture Garden</a><br>
                    <a href="https://www.hoophall.com/" class="link" target="_blank">Naismith Memorial Basketball Hall of Fame</a><br>
                    <a href="https://indianofspringfield.com/" class="link" target="_blank">Indian Motorcycles</a><br>
                </p>
                <button id="locations-button" onclick="window.location.href='reservation.php?source=Springfield'" name="springfield">Book Here</button>
            </div>
        </div>
        <div class="align-center">
            <div class="location-desc">
                <img src="../images/westpalmbeach.jpg">
                <p class="twn-desc"><b>So much beach, so little time!</b></p>
                <h2 style="margin-top: 10%;">West Palm Beach, FL</h2>
                <p>
                    <strong>Amenities Available:</strong><br>
                    High-Speed WI-FI<br>
                    Secure Parking<br>
                    Continental Breakfast<br><br>
                    <strong>Attractions:</strong><br>
                    <a href="https://www.norton.org/" class="link" target="_blank">The Norton Museum of Art</a><br>
                    <a href="https://www.rapidswaterpark.com/" class="link" target="_blank">The Rapids Waterpark</a><br>
                    <a href="https://www.lioncountrysafari.com/" class="link" target="_blank">Lion Country Safari</a>
                </p>
                <br>
                <button id="locations-button" onclick="window.location.href='reservation.php?source=West Palm Beach'" name="west palm beach">Book Here</button>
            </div>
        </div>
        <div class="align-center">
            <div class="location-desc">
                <img src="../images/mobile.jpg">
                <p class="twn-desc"><b>This port city has so much to offer!</b></p>
                <h2 style="margin-top: 10%;">Mobile, AL</h2>
                <p>
                    <strong>Amenities Available:</strong><br>
                    High-Speed WI-FI<br>
                    Secure Parking<br>
                    Continental Breakfast<br><br>
                    <strong>Attractions:</strong><br>
                    <a href="https://www.mobile.org/listing/mobile-carnival-museum/394/" class="link" target="_blank">Birthplace of Mardi Gras -- Carnival Muesum</a><br>
                    <a href="https://www.ussalabama.com/" class="link" target="_blank">USS Alabama Battleship Memorial Park</a><br>
                    <a href="https://www.mobilemuseumofart.com/" class="link" target="_blank">Mobile Museum of Art</a><br>
                </p>
                <button id="locations-button" onclick="window.location.href='reservation.php?source=Mobile'" name="mobile">Book Here</button>
            </div>
        </div>
    </div>

    <footer>
        <p>1000 Galvin Road South, Bellevue NE 68005 <br> 402.293.2000 | 1.800.756.7920</p><br>
        &copy; 2023 Provisio Booking | Website by Bravo Team
    </footer>
</body>

</html>