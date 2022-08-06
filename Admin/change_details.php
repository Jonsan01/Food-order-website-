<?php
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['is_admin'])) {
    if (!$_SESSION['is_admin']) {
        echo "<script>alert('Please Login First')</script>";
        header("Refresh:0; url='./index.php'");
        exit();
    }
} else {
    if (!$_SESSION['is_admin']) {
        echo "<script>alert('Please Login First')</script>";
        header("Refresh:0; url='./index.php'");
        exit();
    }
}

if (!isset($_POST['change'])) {
?>
    <script>
        alert('SomeThing Wrong Please Try Again');
    </script>
<?php
    $url = './user_info.php';
    header("Refresh:0; url=$url");
}


require_once('../phps/database.php');
$con = connectdb();

$email = $_POST['email'];


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin (Details)</title>
    <style>
        @import url("https://fonts.googleapis.com/css?family=Rajdhani:500,700&display=swap");

        * {
            font-family: "Rajdhani", sans-serif;
        }
    </style>
    <script src="https://kit.fontawesome.com/734e943091.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/admin_nav_with_boot.css">
</head>

<body>
    <?php
    include_once('./admin_nav.php');
    ?>
    <div>

        <?php
        $sql = "SELECT * FROM `user_info` WHERE `user_email` = '$email'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            $user_fname = $row['fname'];
            $user_lname = $row['lname'];
            $user_password = $row['password'];
            $user_email = $row['user_email'];
        ?>
            <div style="padding:0 250px;margin-top:100px" class="container text-center" style="align-items: center;">
                <form action="./update.php" method="POST">
                    <div class="row">
                        <div class="col">
                            <label>First Name</label>
                        </div>
                        <div class="col">
                            <label>Last Name</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="text" style="width: 100%;" name="final_fname" value="<?php echo $user_fname ?>" required>
                        </div>
                        <div class="col">
                            <input type="text" style="width: 100%;" name="final_lname" value="<?php echo $user_lname ?>" required><br>
                        </div>
                    </div>
                    <label class="mt-3">Email</label><br>
                    <input type="email" style="width: 100%;" name="final_email" value="<?php echo $user_email ?>" required><br>
                    <label class="mt-3">Password</label><br>
                    <input type="hidden" name="old_email" value="<?php echo $user_email ?>" required>
                    <input type="text" style="width: 100%;" name="final_password" value="<?php echo $user_password ?>" required><br>
                    <input class="mt-3 btn btn-success" style="width: 100%;" type="submit" value="Update">
                </form>
            </div>
        <?php
        }
        ?>
    </div>
</body>

</html>