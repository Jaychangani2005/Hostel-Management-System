<!DOCTYPE html>
<html lang="en">

<title>Darshan Hostel</title>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- TEXT -->
    <link href="https://fonts.googleapis.com/css?family=Michroma" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Rajdhani" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Michroma" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Jost" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Poiret One" rel="stylesheet" type="text/css">

    <!-- Footer -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

    <!-- Rooms -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&family=Roboto:wght@300&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />


</head>

<div class="container-fluid" style="background-color: #282d40;">
    <nav class="navbar navbar-inverse" style="border-color: #282d40; margin-bottom:0;background-color: #282d40; font-size: 20px;margin: 6px;font-family: auto;">
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
                    <!-- <li class="active"><a href="#">Home</a></li> -->
                    <!-- <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Services<span
                            class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">dropdown</a></li>
                                <li><a href="#">dropdown</a></li>
                                <li><a href="#">dropdown</a></li>
                                <li><a href="#">dropdown</a></li>
                            </ul>
                        </li> -->
                    <li class=""><a href="#">Home</a></li>
                    <li><a href="#" onclick="scrollToSection('about')">About Us</a></li>
                    <li><a href="#" onclick="scrollToSection('facility')">Facility</a></li>
                    <li><a href="#" onclick="scrollToSection('rooms')">Rooms</a></li>
                    <li><a href="Contact.php" onclick="scrollToSection('contact')">Contact Us</a></li>

                </ul>

                <ul class="nav navbar-nav navbar-right">

                    <!-- <li><a href="/freedemo">Free Demo</a></li> -->

                    <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                </ul>


                </li>
                </ul>
            </div>
        </div>
    </nav>
</div>



<!-- Slider -->
<div class="slider">
    <div class="slides">
        <img src="img/151428288502.jpg" alt="Image 1">
        <img src="img/gymslider2.avif" alt="Image 2">
        <img src="img/sportsroomslider.jpg" alt="Image 3">
        <img src="img/tvroomslider.jpg" alt="Image 4">
        <img src="img/gardenslider.jpg" alt="Image 5">
        <img src="img/massslider.png" alt="Image 6">

    </div>
    <button class="prev_button">&larr;</button>
    <button class="next_button">&rarr;</button>
    <div class="pagination">
        <span class="active"></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
    <div class="slider_texts">
        <div class="active">Darshan Hostel</div>
        <div>GYM </div>
        <div>Sport's Room</div>
        <div>TV Room</div>
        <div>Garden Area</div>
        <div>Hostel Dinning Area</div>
    </div>
</div>

<script src="script.js"></script>



<section id="about">
    <div class="content content-about" data-aos="zoom-in">
        <div class="about-description">
            <div class="paragraph">
                <h1>About Hostel</h1>
                <p>
                    [Hostel Name] is a student-focused hostel offering a safe, comfortable, and friendly environment.
                    Located near Changa, we provide modern rooms, study areas, and all the amenities you need for a
                    successful student life. Our supportive staff and vibrant community make it easy to feel at home.
            </div>
            <div class="image">
                <img src="img/151428288501.jpg" alt="groceries_image">
            </div>
        </div>
    </div>
</section>


<div class="spacer" style="margin-top: 6%;"> </div>

<!-- Why You Choose us -->
<section id="facility">
    <h2 class="section-title" style="text-align: center; margin-bottom:2%;">Why You Choose us.</h2>

    <div class="container_Choose_us">

        <div class="box" id="box1">
            <img src="img/wifi.jpg" alt="">
            <h3>24x7 wi-fi connectivity</h3>
        </div>
        <div class="box" id="box2">
            <img src="img/24x7 security.jpg" alt="">
            <h3>24x7 security guard</h3>
        </div>
        <div class="box" id="box3">
            <img src="img/gym.jpg" alt="">
            <h3>Gymnasium</h3>
        </div>
        <div class="box" id="box4">
            <img src="img/sports.svg" alt="">
            <h3>Sport Room</h3>
        </div>
        <div class="box" id="box5">
            <img src="img/laundry.jpg" alt="">
            <h3>Laundry</h3>
        </div>
        <div class="box" id="box6">
            <img src="img/electricity backup.webp" alt="">
            <h3>electricity backup</h3>
        </div>
    </div>

</section>



<!-- Rooms -->
<div class="spacer" style="margin-top: 6%;"> </div>
<section id="rooms">
    <div class="room">

        <div class="room1">
            <h2 class="section-title" style="text-align: center; margin-bottom:2%;">Types of Rooms Available.</h2>

        </div>
        <div class="room2">


            <main>
                <!-- <div class="bg"> <img src="/Portal/img/bg.jpg" alt=""></div>
            <!-- <img src="/Portal/img/Delux Room.jpg" alt=""> -->
                <div class="card">
                    <img src="img/Hostel-1.jpg" alt="">
                    <div class="card-content">
                        <h2>
                            Super Delux Room
                        </h2>
                        <p>
                            Enjoy our Super Deluxe Room with a TV, air conditioning, fridge, and other features to make
                            your stay extra comfortable.

                        </p>
                        <a href="Super_Delux_Room.php" class="button">
                            Find out more
                            <span class="material-symbols-outlined">
                                arrow_right_alt
                            </span>
                        </a>
                    </div>
                </div>


                <div class="card">
                    <img src="img/js-girls-hostel-chhawani-indore-hostels-for-women-diq8pze4h6.avif" alt="">
                    <div class="card-content">
                        <h2>
                            Delux Room
                        </h2>
                        <p>
                            Stay cool and relaxed in our Deluxe Room, which comes with air conditioning for a pleasant
                            experience.

                        </p>
                        <a href="Delux_Room.php" class="button">
                            Find out more
                            <span class="material-symbols-outlined">
                                arrow_right_alt
                            </span>
                        </a>
                    </div>
                </div>




                <div class="card">
                    <img src="img/219-Thumbnail_1.jpg" alt="">
                    <div class="card-content">
                        <h2>
                            Standard Room
                        </h2>
                        <p>
                            Our Standard Room is a budget-friendly option with all the basics you need, but without air
                            conditioning.

                        </p>
                        <a href="Standard_Room.php" class="button">
                            Find out more
                            <span class="material-symbols-outlined">
                                arrow_right_alt
                            </span>
                        </a>
                    </div>
                </div>
            </main>

        </div>
    </div>

</section>



<section id="contact">
    <div class="contact">
        <div class="info">
            <h1>Contact Us</h1>
            <hr>
            <!-- <p>EXPLORE IND</p> -->

            <div class="bottom-logo">
                <img src="img/151428288501.jpg" alt="">
            </div>
        </div>

        <div class="main">
            <!-- <span class="heading">Contact Us</span> -->
            <form action="https://formspree.io/f/mrgnbybn" method="POST">
                <div class="form-group">
                    <label for="name">Name*</label>
                    <input type="text" required="">
                </div>

                <div class="form-group">
                    <label for="email">Email*</label>
                    <input type="email" id="email" name="email" required="">
                </div>

                <div class="form-group">
                    <label for="mnumber">Mobile No </label>
                    <input type="number" name="mnumber">
                </div>

                <div class="form-group">
                    <label for="message">Message*</label>
                    <textarea id="message" name="message" required=""></textarea>
                </div>

                <div class="form-submit">
                    <button type="submit">Submit</button>
                </div>

            </form>
        </div>
    </div>
</section>


<section>

    <footer class="footer-distributed">

        <div class="footer-left">

            <h3>Darshan <span>Hostel</span></h3>

            <p>The Perfect Home Base for Your Academic Journey!</p>

            <p class="footer-links">
                <a href="#">Home</a>
                <!-- <a href="#" onclick="scrollToSection('about')">About Us</a>
            <a href="#" onclick="scrollToSection('facility')">Facility</a> -->
                <a href="Delux_Room.php" onclick="scrollToSection('rooms')">Rooms</a>
                <a href="Contact.php" onclick="scrollToSection('contact')">Contact Us</a>

            </p>

            <!-- <p class="footer-company-name">Company Name © 2015</p> -->
        </div>

        <div class="footer-center">

            <div>
                <i class="fa fa-map-marker"></i>
                <p><span>Off Charusat University changa</span> Valetva cross road, Changa,<span>Gujarat 388421</span>
                </p>
            </div>
            <br>
            <div>
                <i class="fa fa-phone"></i>
                <p><span>JC ~</span>+91 94088 42056</p>
            </div>

            <div>
                <i class="fa fa-envelope"></i>
                <p><a href="mailto:jaychangani2005@gmail.com">jaychangani2005@gmail.com</a></p>
            </div>

        </div>

        <div class="footer-right">

            <p class="footer-company-about">
                <!-- <span>About the company</span> -->
                Experience premium living with modern amenities at our hostel. Your comfort and convenience are our top
                priority.
                <br>
                Contact as for inquiries and bookings.
            </p>
            <hr>
            <!-- <div class="footer-icons">

                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
                <a href="#"><i class="fa fa-github"></i></a>

            </div> -->

        </div>

    </footer>
</section>



<!-- back to top -->
<a class="back-to-top js-back-to-top" href="#" data-offset="100">
    <svg class="cd-icon" viewBox="0 0 20 20">
        <polyline points="2 13 10 5 18 13" fill="none" stroke="currentColor" stroke-linecap="round"
            stroke-linejoin="round" stroke-width="2" />
    </svg>
</a>

<head>

    </body>

</html>
