<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="./css/login_style.css">
</head>

<body>
    <?php
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $url = "./login.php";


        //DataBase Connection
        include("./phps/database.php");

        $con = connectdb();

        if ($con->connect_errno) {
            die("Failed To Connect : " . $con->connect_error);
        } else {
            $sql_e = "SELECT * FROM user_info WHERE user_email = '$email'";
            $res_e = mysqli_query($con, $sql_e);
            if (mysqli_num_rows($res_e) == 0) {
                echo "<script>alert('User Does Not Exist !')</script>";
                header("Refresh:0; url=$url");
            } else {
                $add_query = "UPDATE `user_info` SET `password` = '$password' WHERE `user_info`.`user_email` = '$email'";
                $results = mysqli_query($con, $add_query);
                echo "<script>alert('Password Updated !')</script>";
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
                <h2 style="font-family: 'Supermercado One', cursive;">Forget Your Password</h2>
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" onsubmit="return validateForm()" method="post">
                    <div class="email">
                        <label for="number">Email Address</label><br>
                        <input type="text" name="email" id="email" autocomplete="off" required>
                    </div>
                    <div class="password">
                        <label for="password">New Password</label><br>
                        <input type="password" name="password" id="password" autocomplete="off" required>
                    </div>
                    <div class="password">
                        <label for="c_password">Confirm Password</label><br>
                        <input type="password" name="c_password" id="c_password" autocomplete="off" required>
                    </div>
                    <input type="submit" value="Forget Password" id="submit">
                </form>
            </div>
        </div>
    </section>

    <script>
        function validateForm() {
            var email = document.getElementById("email");
            var password = document.getElementById("password");
            var conpassword = document.getElementById("c_password");

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

            if (!validemail() || !validpassword() || !validcpassword()) {
                return false;
            } else return true;

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