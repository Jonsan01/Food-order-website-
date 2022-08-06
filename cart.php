<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once('./phps/display_product.php');
require_once('./phps/database.php');
$con = connectdb();
if (!isset($_SESSION['email'])) {
    $url = "./login.php";
    echo "<script>alert('You Are Not Login. Please Login')</script>";
    header("Refresh:0; url=$url");
} else {
    $email = $_SESSION['email'];
    $sql_a = "SELECT * FROM address_details WHERE email = '$email'";
    $res_e = mysqli_query($con, $sql_a);
    if (mysqli_num_rows($res_e) == 0) {
        $u = "./set_address.php";
        echo "<script>alert('You Are Not Set Your Address. Please Set Address')</script>";
        header("Refresh:0; url=$u");
    } else {
        $stmt = $con->prepare("select * from address_details where email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if ($stmt_result->num_rows > 0) {
            $data = $stmt_result->fetch_assoc();
            $fname = $data['fname'];
            $lname = $data['lname'];
            $aline = $data['aline'];
            $pincode = $data['pincode'];
            $number = $data['number'];
        }
    }
}
$total = 0;
$old_total = 0;
if (isset($_POST['remove'])) {
    if ($_GET['action'] == 'remove') {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['product_id'] == $_GET['id']) {
                $product_name = $_POST['p_name'];
                unset($_SESSION['cart'][$key]);
                echo "<script>alert('$product_name Has Been Removed')</script>";
                $url = "./cart.php";
                header("Refresh:0; url=$url");
            }
        }
    }
}

if (isset($_POST['change_quntity'])) {
    $quntity = $_POST['quntity'];
    if ($quntity < 1) {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['product_id'] == $_POST['pid']) {
                $_SESSION['cart'][$key]['quntity'] = 1;
            }
        }
        echo "<script>alert('Quntity Must Be More Then 0')</script>";
        $url = "./cart.php";
        header("Refresh:0; url=$url");
    } else if ($quntity > 10) {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['product_id'] == $_POST['pid']) {
                $_SESSION['cart'][$key]['quntity'] = 10;
            }
        }
        echo "<script>alert('Maximum Quntity Is 10')</script>";
        $url = "./cart.php";
        header("Refresh:0; url=$url");
    } else {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['product_id'] == $_POST['pid']) {
                $_SESSION['cart'][$key]['quntity'] = $quntity;
            }
        }
        $url = "./cart.php";
        header("Refresh:0; url=$url");
    }
}

if (isset($_POST['submit_order'])) {
    $email = $_SESSION['email'];
    $quary_1 = "INSERT INTO `order_manager`(`email`, `f_name`,`l_name`, `Address`, `Picode`, `Phone Number`, `Status`) VALUES ('$email','$fname','$lname','$aline','$pincode','$number','0')";
    if (mysqli_query($con, $quary_1)) {
        $Order_id = mysqli_insert_id($con);
        $quary_2 = "INSERT INTO `user_order`(`Order_id`, `Item id`, `Quntity`, `Date`, `Time`) VALUES (?,?,?,?,?)";
        $stmt = mysqli_prepare($con, $quary_2);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 'iiiss', $Order_id, $product_id, $quntity, $date, $time);
            foreach ($_SESSION['cart'] as $key => $value) {
                date_default_timezone_set('Asia/Kolkata');
                $date = date("jS F, Y");
                $time = date("h:i:s A");
                $product_id = $value['product_id'];
                $quntity = $value['quntity'];
                mysqli_stmt_execute($stmt);
            }
            unset($_SESSION['cart']);
            echo "<script>alert('Order Submited...')</script>";
            $url = "./cart.php";
            header("Refresh:0; url=$url");
        } else {
            echo "<script>alert('SQL Quary Preper Error !...')</script>";
            $url = "./cart.php";
            header("Refresh:0; url=$url");
        }
    } else {
        echo "<script>alert('SQL Error !...')</script>";
        $url = "./cart.php";
        header("Refresh:0; url=$url");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>

    <style>
        @import url("https://fonts.googleapis.com/css?family=Rajdhani:500,700&display=swap");

        * {
            font-family: "Rajdhani", sans-serif;
        }
    </style>
    <script src="https://kit.fontawesome.com/734e943091.js" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/order_style.css">
    <link rel="stylesheet" href="./css/loader.css">
    <script src="./js/loader.js"></script>
    <style>
        .main_name,
        h5,
        .h6_main {
            font-weight: 700;
        }
    </style>
</head>

<body onload="loder_diable()">
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

    <?php
    include("./phps/navbar.php");
    ?>
    <div class="container-fluid">
        <div class="row px-5">
            <div class="col-md-7">
                <div class="shopping-cart" style="padding: 3% 0;">
                    <h4 style="font-weight: 1000;">My Cart</h4>
                    <hr>
                    <?php
                    if (isset($_SESSION['cart'])) {
                        if (count($_SESSION['cart']) > 0) {
                            foreach ($_SESSION['cart'] as $key => $value) {
                                $cart_product_id = $value['product_id'];
                                $quntity = $value['quntity'];
                                $sql = "SELECT * FROM cart_products where id = '$cart_product_id'";
                                $result = mysqli_query($con, $sql);
                                $row = mysqli_fetch_assoc($result);
                                $old = (int)$row['prize'] * 1.25;
                                cartElement($row['image'], $row['product_name'], $row['prize'], $old, $row['id'], $quntity);
                            }
                        } else {
                            echo "<div class='pt-5' style='height: 200px;'><h2 class='fw-bolder text-center my-auto'>Your Cart Is Empty !</div><h2>";
                        }
                    } else {
                        echo "<div class='pt-5' style='height: 200px;'><h2 class='fw-bolder text-center my-auto'>Your Cart Is Empty !</div><h2>";
                    }
                    ?>
                </div>
            </div>

            <div class="col-md-4 offset-md-1 rounded mt-5 bg-white" style="height: 100%;">
                <div class="pt-4 border bg-light" style="padding: 20px; border-radius:12px">
                    <h6 class="h6_main">Price Details</h6>
                    <hr>
                    <div class="row price-details">
                        <div class="col-md-6">
                            <h6 class="h6_main">Price<span>
                                    <?php
                                    if (isset($_SESSION['cart'])) {
                                        $count = count($_SESSION['cart']);
                                        echo "($count items)";
                                    }
                                    ?></span></h6>
                            <h6 class="h6_main">Delivary Charges</h6>
                            <hr>
                            <h6 class="h6_main">Amount Payable</h6>

                        </div>
                        <div class="col-md-6">
                            <h6>
                                <small><s class="text-secondary gtotal_old">₹ <?php echo $old_total; ?></s></small>
                                <span class="price gtotal">₹ <?php echo $total; ?></span>
                            </h6>
                            <h6><span class="text-success"><?php echo "FREE"; ?></span></h6>
                            <hr>
                            <h6>
                                <small><s class="text-secondary gtotal_old">₹ </s></small>
                                <span class="price gtotal">₹ <?php echo $total; ?></span>
                            </h6>

                        </div>
                    </div>
                </div>
                <div class="pt-4 border bg-light" style="margin-top: 30px;padding: 20px;border-radius:12px">
                    <h6 class="h6_main">Address Details</h6>
                    <hr>
                    <h6>
                        <span class=" fw-bold"> Name : </span><?php echo "$fname $lname"; ?>
                    </h6>
                    <h6>
                        <span class=" fw-bold"> Address :</span><?php echo "$aline, $pincode"; ?>
                    </h6>
                    <h6>
                        <span class=" fw-bold"> Number : </span>+91 <?php echo "$number"; ?>
                    </h6>
                    <h6><a href="./set_address.php"><button class="btn btn-warning" style="width: 100%;">Change Address</button></a></h6>
                </div>
                <div class="submit" style="text-align: center;">
                    <form action="cart.php" method="post">
                        <?php
                        if (isset($_SESSION['cart'])) {
                            if (count($_SESSION['cart']) > 0) {
                                echo '<input type="hidden" name="submit_order">';
                                echo '<input type="submit" style="padding: 5px;margin-top:30px;margin-bottom:30px;width:100%" class="btn btn-success" value="Place My Order">';
                            } else {
                                echo '<input type="submit" style="padding: 5px;margin-top:30px;margin-bottom:30px;width:100%" class="btn btn-success" value="Place My Order" disabled>';
                            }
                        } else {
                            echo '<input type="submit" style="padding: 5px;margin-top:30px;margin-bottom:30px;width:100%" class="btn btn-success" value="Place My Order" disabled>';
                        }
                        ?>
                    </form>

                </div>
            </div>

        </div>
    </div>
    <script>
        var gt = 0;
        var gtotal = document.getElementsByClassName("gtotal");
        var gtotal_old = document.getElementsByClassName("gtotal_old");

        var itotal = document.getElementsByClassName("itotal");
        var iquntity = document.getElementsByClassName("iquntity");
        var iprize = document.getElementsByClassName("iprize");

        function subtotal() {
            gt = 0;
            for (i = 0; i < iprize.length; i++) {
                itotal[i].innerHTML = (iquntity[i].value) * (iprize[i].value);
                gt = gt + (iquntity[i].value) * (iprize[i].value);
            }
            console.log(gt);
            for (j = 0; j < gtotal.length; j++) {
                gtotal[j].innerHTML = "₹ " + gt.toString();
                var gt_old = gt * 1.25;
                gtotal_old[j].innerHTML = "₹ " + gt_old.toString();
            }
        }
        subtotal()
    </script>
</body>

</html>