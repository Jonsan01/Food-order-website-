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
if (isset($_POST['order_delivered'])) {
    $order_id = $_POST['order_id'];
    $sql = "UPDATE `order_manager` SET `Status`='1' WHERE `Order_id` = '$order_id'";
    mysqli_query($con, $sql);
    header("Refresh:0; url='./orders.php'");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin (Orders)</title>
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
    <div class="container mt-3" style="align-items: center;">
        <table class="table caption-top text-center">
            <caption class="text-center mb-3" style="font-weight: 700; font-size:20px">Order Details</caption>
            <thead>
                <tr>
                    <th scope="col">Order Id</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Pincode</th>
                    <th scope="col">Mobile Number</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">#</th>
                    <th scope="col">#</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM `order_manager` WHERE `Status` = '0'";
                $result = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $Order_id = $row['Order_id'];
                    $email = $row['email'];
                    $fname = $row['f_name'];
                    $lname = $row['l_name'];
                    $Address = $row['Address'];
                    $pincode = $row['Picode'];
                    $number = $row['Phone Number'];
                    $fatch_order_sql = "SELECT * FROM `user_order` WHERE `Order_id` = '$Order_id'";
                    $result1 = mysqli_query($con, $fatch_order_sql);
                    $row1 = mysqli_fetch_assoc($result1);
                    $time = $row1['Time'];
                    $date = $row1['Date'];
                    echo '<tr>
                    <td>' . $Order_id . '</td>
                    <td>' . $fname . '</td>
                    <td>' . $lname . '</td>
                    <td>' . $Address . '</td>
                    <td>' . $pincode . '</td>
                    <td>' . $number . '</td>
                    <td>' . $date . '</td>
                    <td>' . $time . '</td>
                    <td>
                        <form action="order_details.php" method="post">
                            <input type="hidden" name="order_id" value="' . $Order_id . '">
                            <input type="submit" name="Order_datails" value="details" class="btn btn-danger">
                        </form>
                    </td>
                    <td>
                    <form action="orders.php" method="post">
                            <input type="hidden" name="order_id" value="' . $Order_id . '">
                            <input type="submit" name="order_delivered" value="Delivered" class="btn btn-success">
                        </form>
                    </td>
                </tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>