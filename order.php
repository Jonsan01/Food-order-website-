<?php
session_start();
if (isset($_POST['add'])) {

    $url = "./order.php";

    $item_name = $_POST['name'];

    if (isset($_SESSION['cart'])) {
        $item_array_id = array_column($_SESSION['cart'], "product_id");

        if (in_array($_POST['p_id'], $item_array_id)) {
            echo "<script>alert('$item_name Is Alredy Added In Your Cart ...')</script>";
            header("Refresh:0; url=$url");
        } else {
            $count = count($_SESSION['cart']);
            $item_arr = array(
                'item_name' => $item_name,
                'quntity' => 1,
                'product_id' => $_POST['p_id']
            );
            echo "<script>alert('$item_name Add In Your Cart')</script>";
            $_SESSION['cart'][$count] = $item_arr;
            header("Refresh:0; url=$url");
        }
    } else {
        $item_arr = array(
            'item_name' => $item_name,
            'quntity' => 1,
            'product_id' => $_POST['p_id']
        );
        echo "<script>alert('$item_name Add In Your Cart')</script>";
        $_SESSION['cart'][0] = $item_arr;
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
    <title>Items</title>
    <script src="https://kit.fontawesome.com/734e943091.js" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/order_style.css">
    <link rel="stylesheet" href="./css/loader.css">
    <script src="./js/loader.js"></script>
    <style>
        @import url("https://fonts.googleapis.com/css?family=Rajdhani:500,700&display=swap");

        .cardtext,
        .card-title,
        .btn,
        .prize {
            font-family: "Rajdhani", sans-serif;
        }

        .card-title,
        .price {
            font-weight: 900;
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
    <div>
        <div id="main_content" class="row text-center py-5 px-3">
            <?php
            require_once('./phps/database.php');
            $con = connectdb();
            $sql = "SELECT * FROM cart_products";
            $result = mysqli_query($con, $sql);

            include("./phps/display_product.php");

            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $name = $row['product_name'];
                $new_prize = $row['prize'];
                $old_prize = $new_prize * 1.25;
                $img = $row['image'];
                $dis = $row['Discription'];

                display_product($name, $old_prize, $new_prize, $img, $id, $dis);
            }

            ?>
        </div>
    </div>
    <script>
        var main_contente = document.getElementById("main_content").innerHTML;
        window.addEventListener('scroll', () => {
            const {
                scrollHeight,
                scrollTop,
                clientHeight
            } = document.documentElement;
            if (scrollTop + clientHeight >= scrollHeight) {
                document.getElementById("main_content").innerHTML = document.getElementById("main_content").innerHTML + main_contente;
            }
        })
    </script>
</body>

</html>