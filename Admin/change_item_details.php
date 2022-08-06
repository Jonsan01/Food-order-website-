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

$p_id = $_POST['p_id'];


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
    <div>

        <?php
        $sql = "SELECT * FROM `cart_products` WHERE `id` = '$p_id'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            $item_name = $row['product_name'];
            $item_prize = $row['prize'];
            $item_discription = $row['Discription'];
            $item_img = $row = $row['image'];
        ?>
            <div style="padding:0 250px;" class="container my-5 text-center" style="align-items: center;">
                <form action="./update_item.php" method="POST">
                    <table style="margin:0 auto;" class="caption-top text-center">
                        <img class="rounded mb-4" src="../image/carts/<?php echo $item_img ?>" width="200px" height="150px" alt="">
                        <tr>
                            <td style="font-weight: 600; font-size:17px">Item Name : </td>
                            <td><input class="mt-2 ms-3" type="text" name="item_name" value="<?php echo $item_name ?>"></td>
                        </tr>
                        <tr>
                            <td style="font-weight: 600; font-size:17px">Item Prize : </td>
                            <td><input class="mt-2 ms-3" type="number" name="iten_prize" value="<?php echo $item_prize ?>" required></td>
                        </tr>
                        <tr>
                            <td style="font-weight: 600; font-size:17px">Discription : </td>
                            <td><input class="mt-2 ms-3" type="text" name="item_discription" value="<?php echo $item_discription ?>" required></td>
                        </tr>
                    </table>
                    <input type="hidden" name="item_id" value="<?php echo $p_id ?>" required>
                    <tr>
                        <td colspan="2">
                            <input style="width: 50%;" class="mt-3 btn btn-success" name="item_update" type="submit" value="Update">
                        </td>
                    </tr>
                </form>
            </div>
        <?php
        }
        ?>
    </div>
</body>

</html>