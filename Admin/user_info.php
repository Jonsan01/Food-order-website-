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

require_once('../phps/database.php');
$con = connectdb();
$url = './user_info.php';
if (isset($_POST['Remove'])) {
    $removed_email = $_POST['email'];
    $remove_sql = "DELETE FROM `user_info` WHERE `user_email` = '$removed_email'";
    mysqli_query($con, $remove_sql);
?><script>
        alert('Item Removed...')
    </script>
<?php
    header("Refresh:0; url=$url");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin (User Info)</title>
    <style>
        @import url("https://fonts.googleapis.com/css?family=Rajdhani:500,700&display=swap");

        * {
            font-family: "Rajdhani", sans-serif;
        }

        td {
            padding-top: auto;
            padding-bottom: auto;
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
    <div class="container mt-3" style="align-items: center;">
        <table class="table caption-top text-center">
            <caption class="text-decoration-underline text-center mb-3" style="font-weight: 700; font-size:20px">Users Informations</caption>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email Id</th>
                    <th scope="col">Password</th>
                    <th scope="col">Remove</th>
                    <th scope="col">Change</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 1;
                $sql = "SELECT * FROM `user_info`";
                $result = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $fname = $row['fname'];
                    $lname = $row['lname'];
                    $email = $row['user_email'];
                    $password = $row['password'];
                    echo '<tr>
                    <th scope="row">' . $count . '</th>
                    <td>' . $fname . '</td>
                    <td>' . $lname . '</td>
                    <td>' . $email . '</td>
                    <td>' . $password . '</td>
                    <td>
                        <form action="user_info.php" method="post">
                            <input type="hidden" name="email" value="' . $email . '">
                            <input type="submit" name="Remove" value="Remove" class="btn btn-danger">
                        </form>
                    </td>
                    <td>
                        <form action="change_details.php" method="post">
                            <input type="hidden" name="email" value="' . $email . '">
                            <input type="submit" name="change" value="Change" class="btn btn-warning">
                        </form>
                    </td>
                </tr>';
                    $count = $count + 1;
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>