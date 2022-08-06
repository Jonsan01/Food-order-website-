<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Order Website</title>
    <script src="https://kit.fontawesome.com/734e943091.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/index_style.css">
    <link rel="stylesheet" href="./css/loader.css">
    <script src="./js/loader.js"></script>
  	
</head>

<body onload="loder_diable()"> 
  	<script>
        let details = navigator.userAgent;

        let regexp = /android|iphone|kindle|ipad/i;

        let isMobileDevice = regexp.test(details);

        if (isMobileDevice) {
          	alert("This Site is Proper Work Only desktop mode");
        }
    </script>
  	<div id="body">
    <div class="loader" id="loader">
        <div class="cube-grid">
            <div class="cube cube2"></div>
            <div class="cube cube3"></div>
            <div class="cube cube1"></div>
            <div class="cube cube4"></div>
            <div class="cube cube5"></div>
            <div class="cube cube6"></div>
            <div class="cube cube7"></div>
            <div class="cube cube8"></div>
            <div class="cube cube9"></div>
        </div>
        <div class="loadertext">
            Loading...
        </div>
    </div>
    <!-- Nav Bar Section -->
    <?php
    include("./phps/navbar.php");
    ?>
    <!-- Home Section -->
    <section class="home" id="home">
        <div class="max-width">
            <div class="home-content">
                <div class="text-1">Are You Hungry?</div>
                <div class="text-2">Good, We Are Here To Serve You </div>
                <a href="./order.php">Order Food</a>
            </div>
        </div>
    </section>

    <!-- offers section -->
    <section class="offers" id="offers">
        <div class="title">Top Offers For You</div>
        <div class="max1">
            <div class="offer">
                <img src="image/Offers/offer1.jpg" alt="">
            </div>
            <div class="offer">
                <img src="image/Offers/offer2.jpg" alt="">
            </div>
            <div class="offer">
                <img src="image/Offers/offer3.jpg" alt="">
            </div>
            <div class=" offer">
                <img src="image/Offers/offer4.jpg" alt="">
            </div>
        </div>
        <div class="max2">
            <div class="offer">
                <img src="image/Offers/offer5.jpg" alt="">
            </div>
            <div class="offer">
                <img src="image/Offers/offer6.jpg" alt="">
            </div>
            <div class="offer">
                <img src="image/Offers/offer7.jpg" alt="">
            </div>
            <div class="offer">
                <img src="image/Offers/offer8.jpg" alt="">
            </div>
        </div>
    </section>

    <!-- contect section -->
    <section class="contect" id="contect">
        <div class="main">
            <div class="right">
                <h2>Write Your Message</h2><br>
                <form action="./phps/contect.php" onsubmit="return validateForm()" method="post">
                    <input type="text" name="name" id="name" placeholder="Name" autocomplete="off" required><br>
                    <input type="email" name="email" id="email" placeholder="Email" autocomplete="off" required><br>
                    <input type="text" name="subject" id="subject" placeholder="Subject" autocomplete="off" required><br>
                    <textarea name="message" class="form-control" id="message" cols="30" rows="6" placeholder="Message" autocomplete="off" required></textarea>
                    <input type="submit" id="submit" value="Submit">
                </form>
            </div>
            <div class="left">
                <h2>Contact Information</h2><br>
                <p id="p">We're open for any suggestion or just to have a chat</p>
                <div style="display: flex;">
                    <i class="fa fa-map-marker"></i>
                    <p><Span>Address : </Span>01, Silver Stone Arced, Ved road, Katargam, Surat, Gujrat 395004</p>
                </div>
                <div style="display: flex;">
                    <i class="fa fa-phone"></i>
                    <p><Span>Number : </Span>+91 99999 99999</p>
                </div>
                <div style="display: flex;">
                    <i class="fa fa-envelope"></i>
                    <p><Span>Email : </Span>info.abc@xyz.com</p>
                </div>
                <div style="display: flex;">
                    <i class="fa fa-globe"></i>
                    <p><Span>Website : </Span>abc.xyz.com</p>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <span>Created By <a href="#home">Website Name</a> | <span class="far fa-copyright"></span> 2020 All
            rights reserved.</span>
    </footer>


    <script>
        function validateForm() {

            var name = document.getElementById("name");
            var email = document.getElementById("email");
            var subject = document.getElementById("subject");
            var msg = document.getElementById("message");

            var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;


            if (!validname() || !validemail()) {
                return false;
            } else return true;


            function validname() {
                if (name.value == "") {
                    alert("Name Can Not Be Empty !");
                    name.style.borderColor = "Red";
                    name.focus();
                    return false;
                } else {
                    name.style.borderColor = "Black";
                    return true;
                }
            }

            function validemail() {
                if (email.value == "") {
                    email.focus();
                    alert("Email Address Can Not Be Emptry");
                    email.style.borderColor = "Red";
                    return false;
                } else if (space(email.value) == 1) {
                    email.focus();
                    alert("Email Address Does Not Contain Whait Space");
                    email.style.borderColor = "Red";
                    return false;
                } else if (!email.value.match(validRegex)) {
                    email.focus();
                    alert("Enter Valid Email");
                    email.style.borderColor = "Red";
                    return false;
                } else {
                    email.style.borderColor = "Black";
                    return true;
                }
            }


        }
    </script>
  </div>
</body>

</html>