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

if (isset($_POST['uplode_product'])) {
    $file_type = substr($_FILES['p_image']['type'], 6);

    $new_item_name = $_POST['item_name'];
    $new_itm_prize = $_POST['item_prize'];
    $new_item_discription = $_POST['discription'];
    $sql_1 = "SELECT MAX(`id`) AS `max_id` FROM `cart_products`";
    $result_1 = mysqli_query($con, $sql_1);
    if ($result_1) {
        $row = mysqli_fetch_assoc($result_1);
        $max_id = $row['max_id'];
        $id_for_db = (int)$max_id + 1;
        $img_for_db = (int)$max_id + 2;
        $img_path_for_db = strval($img_for_db) . "" . $file_type;
        $sql_2 = "INSERT INTO `cart_products`(`id`, `product_name`, `prize`, `image`, `Discription`) VALUES ('$id_for_db','$new_item_name','$new_itm_prize','$img_path_for_db','$new_item_discription')";
        $result_2 = mysqli_query($con, $sql_2);
        if ($result_2) {
            $file_dir = "../image/cart";
            $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
            move_uploaded_file($p_image_tmp_name, "../image/carts/" . $img_path_for_db);
?>
            <script>
                alert("Item Added Sucesfull");
                window.location.href = "./items.php"
            </script>
        <?php
        }
    }
}


if (isset($_POST['Remove'])) {
    $item_id = $_POST['pid'];
    $sql1 = "DELETE FROM `cart_products` WHERE `id` = '$item_id'";
    $result1 = mysqli_query($con, $sql1);
    if ($result1) {
        ?>
        <script>
            alert("Item Removed Sucessfull");
        </script>
    <?php
    }
    ?>
    <script>
        window.location.href = "./items.php"
    </script>
<?php
}
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
    <div class="container">
        <form action="./items.php" method="post" enctype="multipart/form-data">
            <table style="margin:0 auto;" class="caption-top mt-3 text-center">
                <caption class="text-center mb-3 text-decoration-underline" style="font-weight: 700; font-size:20px">Add New Product</caption>
                <tr>
                    <td style="font-weight: 600; font-size:17px">Item Name :</td>
                    <td><input class="mt-1" type="text" name="item_name" placeholder="Enter New Item Name" required autocomplete="off"></td>
                </tr>
                <tr>
                    <td style="font-weight: 600; font-size:17px">Item Prize : </td>
                    <td><input class="mt-1" type="number" name="item_prize" placeholder="Enter Item Prize" required autocomplete="off"></td>
                </tr>
                <tr>
                    <td style="font-weight: 600; font-size:17px">Item Discription : </td>
                    <td><input class="mt-1" type="text" name="discription" placeholder="Enter Item Discription" required autocomplete="off"></td>
                </tr>
                <tr>
                    <td style="font-weight: 600; font-size:17px">Item Image : </td>
                    <td>
                        <input type="file" name="p_image" accept="image/png, image/jpg, image/jpeg" class="mt-3 ms-5" required>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><input class="mt-4 btn btn-info" style="width: 100%;" type="submit" name="uplode_product" value="Add New Product"></td>
                </tr>
            </table>
            <table class="px-3 mt-5 table caption-top text-center">
                <caption class="text-center mb-3 text-decoration-underline" style="font-weight: 700; font-size:20px">Existed Products</caption>
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Product Image</th>
                        <th scope="col">Product Prize</th>
                        <th scope="col">Product Discription</th>
                        <th scope="col">Remove</th>
                        <th scope="col">Change</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 1;
                    $sql = "SELECT * FROM `cart_products`";
                    $result = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $p_img = $row['image'];
                        $p_id = $row['id'];
                        $product_name = $row['product_name'];
                        $product_prize = $row['prize'];
                        $discription = $row['Discription'];
                        echo '<tr>
                    <th scope="row">' . $count . '</th>
                    <td>' . $product_name . '</td>
                    <td><img width="130" height="70" src="../image/carts/' . $p_img . '"></td>
                    <td>' . $product_prize . ' ₹</td>
                    <td>' . $discription . '</td>
                    <td>
                        <form action="items.php" method="post">
                            <input type="hidden" name="pid" value="' . $p_id . '">
                            <input type="submit" name="Remove" value="Remove" class="btn btn-danger">
                        </form>
                    </td>
                    <td>
                        <form action="change_item_details.php" method="post">
                            <input type="hidden" name="p_id" value="' . $p_id . '">
                            <input type="submit" name="change" value="Edit" class="btn btn-warning">
                        </form>
                    </td>
                </tr>';
                        $count = $count + 1;
                    }
                    ?>
                </tbody>
            </table>
        </form>
    </div>
</body>

</html>