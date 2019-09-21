<?php

$con = mysqli_connect("localhost", "root", "", "travel");
if ($con->connect_error)
{
    exit('Could not connect');
}

if (isset($_POST['signBtn'])) 
{

    $name = $_POST['name'];
    $number = $_POST['number'];
    $mail = $_POST['email'];
    $pass = $_POST['psw_repeat'];

    $sql = "INSERT INTO `person` (`personId`, `name`, `password`, `phone`, `email`, `type`) VALUES (NULL, '$name', '$pass', '$number', '$mail', '2')";

    $result = mysqli_query($con, $sql);
   
    echo '<script>alert("Account created successfully!")</script>';
    echo "<script>setTimeout(\"location.href = 'Home.php';\",100);</script>";

} 
else 
{
    $newl = "not working";
    echo "<h4>$newl</h4> ";
}

$con->close();
