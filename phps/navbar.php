<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<nav class="navbar">
    <div class="max-width">
        <div class="logo"><a href="./index.php#home">Zometo</a></div>
        <ul class="menu">
            <li><a href="./index.php#home" class="menu-btn">Home</a></li>
            <li><a href="./cart.php" class="menu-btn">Your Cart<?php
                                                                if (isset($_SESSION['cart'])) {
                                                                    $count = count($_SESSION['cart']);
                                                                    echo '<span style="font-family: "Barlow Condensed", sans-serif;"> (' . $count . ')</span>';
                                                                } else echo '<span style="font-family: "Barlow Condensed", sans-serif;"> (0)</span>';
                                                                ?></a></li>
            <li><a href="./order.php" class="menu-btn">Order Food</a></li>
            <?php
            if (isset($_SESSION['email'])) {
                echo '<li><a href="./phps/logout.php" class="menu-btn">Logout</a></li>';
                echo '<li><a href="./Profile.php" class="menu-btn">Profile</a></li>';
            } else {
                echo '<li><a href="./login.php" class="menu-btn">Login</a></li>';
                echo '<li><a href="./signup.php" class="menu-btn">signup</a></li>';
                echo '<li><a href="./index.php#contect" class="menu-btn">Contact</a></li>';
            }
            ?>
        </ul>
    </div>
</nav>