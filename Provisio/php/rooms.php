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
    <link rel="icon" type="image/png" href="../favicons/letter_p.png" />
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
        <h1>Available Rooms</h1>
    </div>


    <figure class="gallery">
        <img src="../images/dbl_full.jpg" class="dbl_full" alt="dbl full beds" />
        <figcaption>
            <table width="100%">
                <th class="title">Double Full Room</th>
                <tr>
                    <td>Maximum Occupancy 5</td>
                </tr>
                <tr>
                    <td width="30%" height="50px;">Includes:</td>
                    <td width="30%">Additional Information:</td>
                    <td width="30%">Available Amenities:</td>
                </tr>
                <tr>
                    <td>
                        <li>Sofa Bed</li><br>
                        <li>Microwave</li><br>
                        <li>Mini Fridge</li><br>
                        <li>Iron</li>
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
                        <li style="list-style-type: none"><span>1-2 Guests: $115/night</span></li><br>
                        <li style="list-style-type: none"><span>3-5 Guests: $150/night</span></li>
                    </td>
                </tr>
            </table>
        </figcaption>
    </figure>



    <figure class="gallery">
        <img src="../images/queen.jpg" class="sngl_qn" alt="queen bed" />
        <figcaption>
            <table width="100%">
                <th class="title">Queen Room</th>
                <tr>
                    <td>Maximum Occupancy 3</td>
                </tr>
                <tr>
                    <td width="30%" height="50px;">Includes:</td>
                    <td width="30%">Additional Information:</td>
                    <td width="30%">Available Amenities:</td>
                </tr>
                <tr>
                    <td>
                        <li>Sofa Bed</li><br>
                        <li>Microwave</li><br>
                        <li>Mini Fridge</li><br>
                        <li>Iron</li>
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
                        <li style="list-style-type: none"><span>1-2 Guests: $115/night</span></li><br>
                        <li style="list-style-type: none"><span>3-5 Guests: $150/night</span></li>
                    </td>
                </tr>
            </table>
        </figcaption>
    </figure>



    <figure class="gallery">
        <img src="../images/dbl_queen.jpg" class="dbl_qn" alt="double queen beds" />
        <figcaption>
            <table width="100%">
                <th class="title">Double Queen Room</th>
                <tr>
                    <td>Maximum Occupancy 5</td>
                </tr>
                <tr>
                    <td width="30%" height="50px;">Includes:</td>
                    <td width="30%">Additional Information:</td>
                    <td width="30%">Available Amenities:</td>
                </tr>
                <tr>
                    <td>
                        <li>Sofa Bed</li><br>
                        <li>Microwave</li><br>
                        <li>Mini Fridge</li><br>
                        <li>Iron</li>
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
                        <li style="list-style-type: none"><span>1-2 Guests: $115/night</span></li><br>
                        <li style="list-style-type: none"><span>3-5 Guests: $150/night</span></li>
                    </td>
                </tr>
            </table>
        </figcaption>
    </figure>



    <figure class="gallery">
        <img src="../images/king.jpg" class="sngl_kng" alt="king bed" />
        <figcaption>
            <table width="100%">
                <th class="title">King Room</th>
                <tr>
                    <td>Maximum Occupancy 3</td>
                </tr>
                <tr>
                    <td width="30%" height="50px;">Includes:</td>
                    <td width="30%">Additional Information:</td>
                    <td width="30%">Available Amenities:</td>
                </tr>
                <tr>
                    <td>
                        <li>Sofa Bed</li><br>
                        <li>Microwave</li><br>
                        <li>Mini Fridge</li><br>
                        <li>Iron</li>
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
                        <li style="list-style-type: none"><span>1-2 Guests: $115/night</span></li><br>
                        <li style="list-style-type: none"><span>3-5 Guests: $150/night</span></li>
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