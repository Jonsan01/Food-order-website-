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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin (home)</title>
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
                    <th scope="col">Item Id</th>
                    <th scope="col">Item Name</th>
                    <th scope="col">Item Quntity</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!isset($_POST['order_id'])) {
                    exit();
                }
                $order_id = $_POST['order_id'];
                $sql = "SELECT * FROM `user_order` WHERE `Order_id` = '$order_id'";
                $result = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $item_id = $row['Item id'];
                    $quntity = $row['Quntity'];
                    $sql1 = "SELECT `product_name` FROM `cart_products` WHERE `id` = '$item_id'";
                    $result1 = mysqli_query($con, $sql1);
                    $row1 = mysqli_fetch_array($result1);
                    if ($row1) {
                        $item_name = $row1['product_name'];
                    }
                    echo '<tr>
                    <td>' . $order_id . '</td>
                    <td>' . $item_id . '</td>
                    <td>' . $item_name . '</td>
                    <td>' . $quntity . '</td>
                </tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>