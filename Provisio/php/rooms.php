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
    <script src="../js/popup.js"></script>
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
        <h1>Available Rooms</h1>
    </div>

    <!-- Add the HTML code for the popup -->
    <div id="popup">
        <span class="close" onclick="closeImage()">&times;</span>
        <img id="popup_image">
        <div class="caption">
            <h1>Book with Provisio!</h1>
        </div>
    </div>

    <!-- Add an overlay that covers the entire page -->
    <div class="overlay"></div>

    <figure class="gallery">
        <img src="../images/double.jpeg" id="full" alt="dbl full beds" onclick="onClick(this)" />
        <figcaption class="gallery-items">
            <table width="100%">
                <th class="title">Double Full Room</th>
                <tr style="font-weight: bold;">
                    <td width="30%" height="30px;">Includes:</td>
                    <td width="30%">Available Amenities:</td>
                    <td width="30%">Additional Information:</td>
                </tr>
                <tr>
                    <td>
                        <li>Full Size Sofa Sleeper</li><br>
                        <li>Microwave</li><br>
                        <li>Mini Fridge</li><br>
                        <li>Work Desk</li>
                    </td>
                    <td>
                        <li>High-Speed WI-FI</li><br>
                        <li>Room Service</li><br>
                        <li>Secure Parking</li><br>
                        <li>Continental Breakfast</li>
                    </td>
                    <td>
                        <li>Non-Smoking</li><br>
                        <li style="visibility: hidden;"></li><br>
                        <li><span id="guestbold">$110/night</span></li>
                    </td>
                </tr>
            </table>
        </figcaption>
    </figure>



    <figure class="gallery">
        <img src="../images/queen.jpeg" id="queen" alt="queen bed" onclick="onClick(this)" />
        <figcaption class="gallery-items">
            <table width="100%">
                <th class="title">Queen Room</th>
                <tr style="font-weight: bold;">
                    <td width="30%" height="30px;">Includes:</td>
                    <td width="30%">Available Amenities:</td>
                    <td width="30%">Additional Information:</td>
                </tr>
                <tr>
                    <td>
                        <li>Full Size Sofa Sleeper</li><br>
                        <li>Microwave</li><br>
                        <li>Mini Fridge</li><br>
                        <li>Work Desk</li>
                    </td>
                    <td>
                        <li>High-Speed WI-FI</li><br>
                        <li>Room Service</li><br>
                        <li>Secure Parking</li><br>
                        <li>Continental Breakfast</li>
                    </td>
                    <td>
                        <li>Non-Smoking</li><br>
                        <li style="visibility: hidden;"></li><br>
                        <li><span id="guestbold">$125/night</span></li>
                    </td>
                </tr>
            </table>
        </figcaption>
    </figure>



    <figure class="gallery">
        <img src="../images/dblqueen.jpeg" id="dblqueen" alt="double queen beds" onclick="onClick(this)" />
        <figcaption class="gallery-items">
            <table width="100%">
                <th class="title">Double Queen Room</th>
                <tr style="font-weight: bold;">
                    <td width="30%" height="30px;">Includes:</td>
                    <td width="30%">Available Amenities:</td>
                    <td width="30%">Additional Information:</td>
                </tr>
                <tr>
                    <td>
                        <li>Full Size Sofa Sleeper</li><br>
                        <li>Microwave</li><br>
                        <li>Mini Fridge</li><br>
                        <li>Work Desk</li>
                    </td>
                    <td>
                        <li>High-Speed WI-FI</li><br>
                        <li>Room Service</li><br>
                        <li>Secure Parking</li><br>
                        <li>Continental Breakfast</li>
                    </td>
                    <td>
                        <li>Non-Smoking</li><br>
                        <li style="visibility: hidden;"></li><br>
                        <li><span id="guestbold">$150/night</span></li>
                    </td>
                </tr>
            </table>
        </figcaption>
    </figure>



    <figure class="gallery">
        <img src="../images/kingsuite.jpeg" id="king" alt="king bed" onclick="onClick(this)" />
        <figcaption class="gallery-items">
            <table width="100%">
                <th class="title">King Room</th>
                <tr style="font-weight: bold;">
                    <td width="30%" height="30px;">Includes:</td>
                    <td width="30%">Available Amenities:</td>
                    <td width="30%">Additional Information:</td>
                </tr>
                <tr>
                    <td>
                        <li>Full Size Sofa Sleeper</li><br>
                        <li>Microwave</li><br>
                        <li>Mini Fridge</li><br>
                        <li>Work Desk</li>
                    </td>
                    <td>
                        <li>High-Speed WI-FI</li><br>
                        <li>Room Service</li><br>
                        <li>Secure Parking</li><br>
                        <li>Continental Breakfast</li>
                    </td>
                    <td>
                        <li>Non-Smoking</li><br>
                        <li style="visibility: hidden;"></li><br>
                        <li><span id="guestbold">$165/night</span></li>
                    </td>
                </tr>
            </table>
        </figcaption>
    </figure>

    <footer>
        <p>1000 Galvin Road South, Bellevue NE 68005 <br> 402.293.2000 | 1.800.756.7920</p><br>
        &copy; 2023 Provisio Booking | Website by Bravo Team
    </footer>
</body>

</html>