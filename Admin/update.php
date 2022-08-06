<?php
if (isset($_POST['final_email'])) {

    require_once('../phps/database.php');
    $con = connectdb();
    $email = $_POST['old_email'];
    $f_email = $_POST['final_email'];
    $f_fname = $_POST['final_fname'];
    $f_lname = $_POST['final_lname'];
    $f_password = $_POST['final_password'];
    $final_s = "UPDATE `user_info` SET `fname`='$f_fname',`lname`='$f_lname',`user_email`='$f_email',`password`='$f_password' WHERE `user_email` = '$email'";
    $result = mysqli_query($con, $final_s);
?>
    <script>
        alert("User Details Updated...")
    </script>
<?php
    $url = './user_info.php';
    header("Refresh:0; url=$url");
}
