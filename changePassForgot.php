<?php

$con = mysqli_connect("localhost", "root", "", "travel");
if ($con->connect_error) {
    exit('Could not connect');
}


if (isset($_POST['changePassBtn'])) {
    
    $email=$_POST['email'];
    $pass=$_POST['psw'];
    
   $sql = "UPDATE `person` SET `password`='$pass' WHERE `email`='$email'";
    $result = mysqli_query($con, $sql);

    echo '<script>alert("Password changed successfully!")</script>';
    echo "<script>setTimeout(\"location.href = 'Home.php';\",100);</script>";
    
}

$con->close();
?>