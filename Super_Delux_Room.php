<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super_Delux_Room</title>
    <link rel="stylesheet" href="Rooms.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>

<body style="background-color: #0e1a22;">

    <div class="container-fluid" style="background-color: #282d40;">
        <nav class="navbar navbar-inverse" style="border-color: #282d40; margin-bottom:0;background-color: #282d40; font-size: 20px;margin: 3px;font-family: auto;">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button class="navbar-toggle" data-target="#mobile_menu" data-toggle="collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- <a href="index.html" class="navbar-brand">Staffscan</a> -->
                </div>
                <div class="navbar-collapse collapse" id="mobile_menu">
                    <ul class="nav navbar-nav">
                        <!-- <li class="active"><a href="#">Home</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Services<span
                                class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">dropdown</a></li>
                                    <li><a href="#">dropdown</a></li>
                                    <li><a href="#">dropdown</a></li>
                                    <li><a href="#">dropdown</a></li>
                                </ul>
                            </li> -->
                        <li class=""><a href="index.php">Home</a></li>
                        <!-- <li><a href="#" onclick="scrollToSection('about')">About Us</a></li> -->
                        <!-- <li><a href="#" onclick="scrollToSection('facility')">Facility</a></li> -->
                        <!-- <li><a href="#" onclick="scrollToSection('rooms')">Rooms</a></li> -->
                        <li><a href="Contact.php" onclick="scrollToSection('contact')">Contact Us</a></li>

                    </ul>

                    <ul class="nav navbar-nav navbar-right">

                        <!-- <li><a href="/freedemo">Free Demo</a></li> -->

                        <!-- <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li> -->
                    </ul>


                    </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <h1 style="    font-size: 45px;
    font-weight: bolder;
"> Hostel Packages </h1>

    <div class="">
        <!-- <h1>Choose a Room Type</h1> -->
        <div class="buttons">
            <a href="Super_Delux_Room.php">
                <button> <span>Super Deluxe Room</span></button>
            </a>

            <a href="Delux_Room.php">
                <button><span>Deluxe Room</span></button>
            </a>

            <a href="Standard_Room.php">
                <button><span>Standard Room</span></button>
            </a>

        </div>

        <div id="superDeluxe" class="room-info">
            <h1>Super Deluxe Room</h1>
            <!-- <h2 class="h2">Super Deluxe Room</h2> -->

            <div class="center">
                <div class="carousel-wrapper">
                    <!-- abstract radio buttons for slides -->
                    <input id="slide1" type="radio" name="controls" checked="checked" />
                    <input id="slide2" type="radio" name="controls" />
                    <input id="slide3" type="radio" name="controls" />
                    <input id="slide4" type="radio" name="controls" />
                    <input id="slide5" type="radio" name="controls" />

                    <!-- navigation dots -->
                    <label for="slide1" class="nav-dot"></label>
                    <label for="slide2" class="nav-dot"></label>
                    <label for="slide3" class="nav-dot"></label>
                    <label for="slide4" class="nav-dot"></label>
                    <label for="slide5" class="nav-dot"></label>

                    <!-- arrows -->
                    <label for="slide1" class="left-arrow">
                        < </label>
                            <label for="slide2" class="left-arrow">
                                < </label>
                                    <label for="slide3" class="left-arrow">
                                        < </label>
                                            <label for="slide4" class="left-arrow">
                                                < </label>
                                                    <label for="slide5" class="left-arrow">
                                                        < </label>

                                                            <label for="slide1" class="right-arrow"> > </label>
                                                            <label for="slide2" class="right-arrow"> > </label>
                                                            <label for="slide3" class="right-arrow"> > </label>
                                                            <label for="slide4" class="right-arrow"> > </label>
                                                            <label for="slide5" class="right-arrow"> > </label>

                                                            <div class="carousel">
                                                                <ul>
                                                                    <li><img src="img/151428288501.jpg" /></li>
                                                                    <li><img src="img/gardenslider.jpg" alt="">
                                                                    </li>
                                                                    <li><img src="img/gymslider.jpg" /></li>
                                                                    <li><img src="img/massslider.png"></li>
                                                                    <li><img src="img/tvroomslider.jpg" alt="">
                                                                    </li>
                                                                </ul>
                                                            </div>
                </div>
            </div>

        </div>


        <div class="info">
            <!-- <h2 style="text-align: center;">Super Deluxe Room:</h2> -->

            <div class="info_para">
                <p>
                    Enjoy our Super Deluxe Room with a TV, air conditioning, fridge, and other features to make your stay extra comfortable.
                </p>
            </div>
            <table class="fees-table">
                <thead>
                    <tr>
                        <th rowspan="2">Rooms</th>
                        <th>At the time of Admission</th>
                        <th>Up to 31st Dec. 2024</th>
                        <th rowspan="2">Total Fees</th>
                    </tr>
                    <tr>
                        <th>Boarding + Dining</th>
                        <th>Boarding + Dining</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Super Deluxe (3 Students)</td>
                        <td>73,350/-</td>
                        <td>29,000/-</td>
                        <td class="highlight">102,350/-</td>
                    </tr>
                </tbody>
            </table>

            <div class="note">
                <p>Security Deposit 5000/- Refundable</p>
                <p>For Semester 7th and 8th full-year fees paid at the time of admission</p>
                <p><strong>Please note:</strong> Admission will be given for 1 year (two semesters) only</p>
            </div>
        </div>


        <script src="Rooms.js"></script>
</body>

</html>