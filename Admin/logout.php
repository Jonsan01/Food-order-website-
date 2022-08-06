<script>
    alert('Admin Logout Sucessfull...');
</script>
<?php
if (!isset($_SESSION)) {
    session_start();
}
unset($_SESSION['is_admin']);
header("Refresh:0; url='../index.php'");
?>