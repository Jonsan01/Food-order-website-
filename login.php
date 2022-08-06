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

        //DataBase Connection
        include("./phps/database.php");

        $con = connectdb();

        if ($con->connect_errno) {
            die("Failed To Connect : " . $con->connect_error);
        } else {
            $stmt = $con->prepare("select * from user_info where user_email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();

            $stmt_result = $stmt->get_result();

            if ($stmt_result->num_rows > 0) {
                $data = $stmt_result->fetch_assoc();
                if ($data['password'] === $password) {
                    // Creating Session
                    session_start();
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $password;
                    $_SESSION['fname'] = $data['fname'];
                    $_SESSION['lname'] = $data['lname'];

                    //redirect index page
                    $url = "./index.php";
                    echo "<script>alert('Login Sucessfull')</script>";
                    header("Refresh:0; url=$url");
                } else {
                    echo "<script>alert('Wrong Password !');</script>";
                }
            } else {
                echo "<script>alert('Wrong Email');</script>";
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
                <h2 style="font-family: 'Supermercado One', cursive;">Login Your Account</h2>
                <p style="text-align: center;font-family: 'Quintessential', cursive;margin-bottom: 20px;">Please
                    Enter Your Email Address And <br> Password For Login.</p>
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" onsubmit="return validateForm();">
                    <div class="email">
                        <label for="number">Email Address</label><br>
                        <input type="text" name="email" id="email">
                    </div>
                    <div class="password">
                        <label for="password">Password</label><br>
                        <input type="password" name="password" id="password">
                    </div>
                    <input type="submit" value="Login Account" id="submit">
                </form>
                <a href="./forget_password.php">
                    <p style="text-align: center;">Forget Password</p>
                </a>
                </form>
                <p style="margin-top: 10px; text-align: center; font-family: 'Quintessential', cursive;">Don't have
                    an account ?<a style="color: crimson;" href="./signup.php">
                        Create an account</a></p>
            </div>
        </div>
    </section>

    <script>
        function validateForm() {
            var email = document.getElementById("email");
            var password = document.getElementById("password");

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

            if (!validemail() || !validpassword()) {
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

        }
    </script>

</body>

</html>