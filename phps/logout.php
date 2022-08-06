    <?php
    $url = "../index.php";
    session_start();
    session_unset();
    session_destroy();
    echo "<script>alert('Logout Sucessfull')</script>";
    header("Refresh:0; url=$url");
    ?>