<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-up</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="./css/signup_style.css">
</head>

<body>
    <?php

    if (!isset($_SESSION)) {
        session_start();
    }

    if (!isset($_SESSION['email'])) {
        $url = "./login.php";
        echo "<script>alert('You Are Not Login. Please Login')</script>";
        header("Refresh:0; url=$url");
    } else {
        $email = $_SESSION['email'];
    }
    if (isset($_POST['fname'])) {
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $number = $_POST["number"];
        $address = $_POST["address"];
        $city = $_POST["city"];
        $State = $_POST["State"];
        $pincode = $_POST["pincode"];

        $url = "./login.php";

        $aline = "$address, $city, $State";

        //connect database
        include("./phps/database.php");

        $db = connectdb();

        if ($db->connect_errno) {
            die("Failed To Connect : " . $con->connect_error);
        } else {
            $sql_e = "SELECT * FROM address_details WHERE email = '$email'";
            $res_e = mysqli_query($db, $sql_e);
            $u = "./cart.php";
            if (mysqli_num_rows($res_e) > 0) {
                $sql = "UPDATE address_details SET email='$email',fname='$fname',lname='$lname',aline='$aline',pincode='$pincode',number='$number' WHERE email = '$email'";
                $results = mysqli_query($db, $sql);
                echo "<script>alert('Address Updated Success !')</script>";
                header("Refresh:0; url=$u");
            } else {
                $add_query = "INSERT INTO address_details (email,fname,lname,aline,pincode,number) values ('$email','$fname','$lname','$aline','$pincode','$number')";
                $results = mysqli_query($db, $add_query);
                echo "<script>alert('Address Set Success !')</script>";
                header("Refresh:0; url=$u");
            }
        }
    }
    ?>
    <?php
    include("./phps/navbar.php");
    ?>

    <!-- Signup Section -->
    <section class="signup" id="signup">
        <div class="max-width">
            <div class="signup-content animate__animated animate__backInDown">
                <h2 style="font-family: 'Supermercado One', cursive;">Set Address</h2>
                <p style="text-align: center;font-family: 'Quintessential', cursive;margin-bottom: 20px;">Please
                    Enter Your Basic
                    Information For<br> Set Your Address</p>
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" onsubmit="return validateForm()" method="post">
                    <div class="row">
                        <div class="fname">
                            <label for="fname">First Name</label><br>
                            <input type="text" autocomplete="off" name="fname" id="fname">
                        </div>
                        <div class="lname">
                            <label for="fname">Last Name</label><br>
                            <input type="text" autocomplete="off" name="lname" id="lname">
                        </div>
                    </div>
                    <div class="email">
                        <label for="number">Mobile Number</label><br>
                        <input type="number" name="number" autocomplete="off" id="number">
                    </div>
                    <div class="address" style="margin-top: 20px; width: 100%;">
                        <label for="address">Address Line</label><br>
                        <input type="text" style="width: 100%;" name="address" autocomplete="off" id="address">
                    </div>
                    <div style="margin-top: 20px; width: 100%;">
                        <label for="city">City</label><br>
                        <input type="text" style="width: 100%;" name="city" autocomplete="off" id="city">
                    </div>
                    <div class="State" style="margin-top: 20px; width: 100%;">
                        <label for="number">State</label><br>
                        <input type="text" style="width: 100%;" name="State" autocomplete="off" id="State">
                    </div>
                    <div class="pincode" style="margin-top: 20px; width: 100%;">
                        <label for="number">Pincode</label><br>
                        <input type="number" style="width: 100%;" name="pincode" autocomplete="off" id="pincode">
                    </div>
                    <input type="submit" value="Set Address" id="submit">
                </form>
            </div>
        </div>
    </section>

    <!-- form validation java script -->
    <script>
        function validateForm() {
            var fname = document.getElementById("fname");
            var lname = document.getElementById("lname");
            var number = document.getElementById("number");
            var address = document.getElementById("address");
            var city = document.getElementById("city");
            var state = document.getElementById("State");
            var pin = document.getElementById("pincode");

            function space(x) {
                var flag = 0;
                if (x != "") {
                    var strArr = new Array();
                    strArr = x.split(" ");
                    if (strArr.length > 1) {
                        flag = 1;
                    }
                }
                return flag
            }

            var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

            if (!validfname() || !validlname() || !validnumber() || !validaddress() || !validcity() || !validstate() || !validpincode()) {
                return false;
            } else if (!document.getElementById("t_and_c").checked) {
                alert("Please agree to the terms and conditions.")
                return false;
            } else return true;

            function validfname() {
                if (fname.value == "") {
                    fname.focus();
                    alert("First Name Can Not Be Empty");
                    fname.style.borderColor = "Red";
                    return false;
                } else if (space(fname.value) == 1) {
                    fname.focus();
                    alert("First Name Does Not Contain Whait Space");
                    fname.style.borderColor = "Red";
                    return false;
                } else {
                    fname.style.borderColor = "Black";
                    return true;
                }
            }

            function validlname() {
                if (lname.value == "") {
                    lname.focus();
                    alert("Last Name Can Not Be Empty");
                    lname.style.borderColor = "Red";
                    return false;
                } else if (space(lname.value) == 1) {
                    lname.focus();
                    alert("Last Name Does Not Contain Whait Space");
                    lname.style.borderColor = "Red";
                    return false;
                } else {
                    lname.style.borderColor = "Black"
                    return true;
                }
            }

            function validnumber() {
                if (number.value == "") {
                    number.focus();
                    alert("Number Can Not Be Empty");
                    number.style.borderColor = "Red";
                    return false;
                } else if (space(number.value) == 1) {
                    number.focus();
                    alert("Number Does Not Contain Whait Space");
                    number.style.borderColor = "Red";
                    return false;
                } else if (number.value.length != 10) {
                    number.focus();
                    alert("Number Length Is Only 10");
                    number.style.borderColor = "Red";
                    return false
                } else {
                    number.style.borderColor = "Black"
                    return true;
                }
            }

            function validaddress() {
                if (address.value == "") {
                    address.focus();
                    alert("Address Can Not Be Empty");
                    address.style.borderColor = "Red";
                    return false;
                } else if (address.vale.length < 5) {
                    address.focus();
                    alert("Enter Valid Address");
                    address.style.borderColor = "Red";
                    return false;
                } else {
                    address.style.borderColor = "Black"
                    return true;
                }
            }

            function validcity() {
                if (city.value == "") {
                    city.focus();
                    alert("City Can Not Be Empty");
                    city.style.borderColor = "Red";
                    return false;
                } else {
                    city.style.borderColor = "Black";
                    return true;
                }
            }

            function validstate() {
                if (state.value == "") {
                    state.focus();
                    alert("State Can Not Be Empty");
                    state.style.borderColor = "Red";
                    return false;
                } else {
                    state.style.borderColor = "Black";
                    return true;
                }
            }

            function validpincode() {
                if (pin.value == "") {
                    pin.focus();
                    alert("Pincode Can Not Be Empty");
                    pin.style.borderColor = "Red";
                    return false;
                } else if (space(pin.value) == 1) {
                    pin.focus();
                    alert("Pincode Does Not Contain Whait Space");
                    pin.style.borderColor = "Red";
                    return false;
                } else if (pin.value.length != 6) {
                    pin.focus();
                    alert("Pincode Length Is Only 10");
                    pin.style.borderColor = "Red";
                    return false
                } else {
                    pin.style.borderColor = "Black"
                    return true;
                }
            }


        }
    </script>
</body>

</html>