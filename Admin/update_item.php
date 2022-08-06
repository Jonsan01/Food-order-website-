<?php
if (isset($_POST['item_update'])) {

    require_once('../phps/database.php');
    $con = connectdb();
    $i_name = $_POST['item_name'];
    $i_prize = $_POST['iten_prize'];
    $i_discription = $_POST['item_discription'];
    $i_id = $_POST['item_id'];
    $final_s = "UPDATE `cart_products` SET `product_name`='$i_name',`prize`='$i_prize',`Discription`='$i_discription' WHERE `id` = '$i_id'";
    $result = mysqli_query($con, $final_s);
    $url = './items.php';
?>
    <script>
        alert("Details Updated Sucessfull")
    </script>
<?php
    header("Refresh:0; url=$url");
}
