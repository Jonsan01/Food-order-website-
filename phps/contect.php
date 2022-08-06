<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?php

    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $url = "../index.php";

    //DataBase Connection
    include("database.php");

    $con = connectdb();

    if ($con->connect_errno) {
        die("Failed To Connect : " . $con->connect_error);
    } else {
        $add_query = "INSERT INTO contact (name,email,subject,message) values ('$name','$email','$subject','$message')";
        $results = mysqli_query($con, $add_query);
        echo "<script>alert('Your Message Is Sended. We Are Contect Within 24 hour.')</script>";
        header("Refresh:0; url=$url");
    }
    ?>
</body>

</html>