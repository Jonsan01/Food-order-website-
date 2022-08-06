<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<div class="navbar">
    <div class="max-width">
        <div class="logo"><a href="./index.php#home">Zometo</a></div>
        <ul class="menu">
            <li><a href="./home.php" class="menu-btn">Home</a></li>
            <li><a href="./user_info.php" class="menu-btn">User Info</a></li>
            <li><a href="./orders.php" class="menu-btn">Orders</a></li>
            <li><a href="./items.php" class="menu-btn">Items</a></li>
            <li><a href="./quary.php" class="menu-btn">Customer Care</a></li>
            <li><a href="./logout.php" class="menu-btn">Logout</a></li>
        </ul>
    </div>
</div>