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
    if (isset($_POST['email'])) {
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $email = $_POST["email"];
        $passwords = $_POST["password"];

        $url = "./login.php";

        //connect database
        include("./phps/database.php");

        $db = connectdb();

        if ($db->connect_errno) {
            die("Failed To Connect : " . $con->connect_error);
        } else {
            $sql_e = "SELECT * FROM user_info WHERE user_email = '$email'";
            $res_e = mysqli_query($db, $sql_e);
            if (mysqli_num_rows($res_e) > 0) {
                echo "<script>alert('User Alredy Exist !')</script>";
                header("Refresh:0; url=$url");
            } else {
                $add_query = "INSERT INTO user_info (fname,lname,user_email,password) values ('$fname','$lname','$email','$passwords')";
                $results = mysqli_query($db, $add_query);
                echo "<script>alert('User Registration Success !')</script>";
                header("Refresh:0; url=$url");
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
                <h2 style="font-family: 'Supermercado One', cursive;">Create an account</h2>
                <p style="text-align: center;font-family: 'Quintessential', cursive;margin-bottom: 20px;">Please
                    Enter Your Basic
                    Information For<br>Creating New Account.</p>
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
                        <label for="number">Email Address</label><br>
                        <input type="text" name="email" autocomplete="off" id="email">
                    </div>
                    <div class="password">
                        <label for="number">New Password</label><br>
                        <input type="password" style="width: 100%;" name="password" autocomplete="off" id="password">
                    </div>
                    <div class="c_password" style="margin:20px 0;">
                        <label for="c_number">Confirm Password</label><br>
                        <input type="password" style="width: 100%;" name="c_password" autocomplete="off" id="cpassword">
                    </div>
                    <input type="checkbox" name="t_and_c" id="t_and_c">
                    <label for="t_and_c">I agree to the terms and conditions.</label>
                    </p>
                    <input type="submit" value="Create Account" id="submit">
                </form>
                <p style="margin-top: 10px; text-align: center; font-family: 'Quintessential', cursive;">Alredy
                    have
                    an account ?<a style="color: crimson;" href="./login.php">
                        Login</a></p>

            </div>
        </div>
    </section>

    <!-- form validation java script -->
    <script>
        function validateForm() {
            var fname = document.getElementById("fname");
            var lname = document.getElementById("lname");
            var email = document.getElementById("email");
            var password = document.getElementById("password");
            var conpassword = document.getElementById("cpassword");

            console.log(password + conpassword);

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

            if (!validfname() || !validlname() || !validemail() || !validpassword() || !validcpassword()) {
                return false;
            } else if (!document.getElementById("t_and_c").checked) {
                alert("Please agree to the terms and conditions.")
                return false;
            } else return true;

            function validfname() {
                if (fname.value == "") {
                    fname.focus();
                    alert("First Name Can Not Be Emptry");
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
                    alert("Last Name Can Not Be Emptry");
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

            function validpassword() {
                if (password.value == "") {
                    password.focus();
                    alert("Password Can Not Be Emptry");
                    password.style.borderColor = "Red";
                    return false;
                } else if (space(password.value) == 1) {
                    password.focus();
                    alert("Password Does Not Contain Whait Space");
                    password.style.borderColor = "Red";
                    return false;
                } else {
                    password.style.borderColor = "Black";
                    return true;
                }
            }

            function validcpassword() {
                if (password.value != conpassword.value) {
                    conpassword.focus();
                    conpassword.style.borderColor = "Red";
                    alert("Password Are Not Matched");
                    return false;
                } else {
                    conpassword.style.borderColor = "Black";
                    return true;
                }
            }
        }
    </script>
</body>

</html>