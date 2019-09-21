<?php
session_start();
$id = $_SESSION['personId'];
$user = $_SESSION['uname'];
$pass = $_SESSION['password'];
if (!isset($_SESSION['personId'])) {
    session_destroy();
    header("Location: Home.php");
}



$con = mysqli_connect("localhost", "root", "", "travel");
if ($con->connect_error) {
    exit('Could not connect');
}
//    echo $user;

if (isset($_POST['submitBtn'])) {
    $rating = $_POST['popilarRadio'];
    $cmnt = $_POST['comment'];

    //$cmnt = $_POST['comment'];
    $sql = "INSERT INTO feedback (fbackId, rating, comment, personId) VALUES (NULL, '$rating', '$cmnt', '$id');";

    $result = mysqli_query($con, $sql);
    session_start();
    $dname = $_POST['txtDes'];

    $_SESSION['txtDes'] = $dname;

    header("Location: welcome.php");

} else {
    $newl = "not working";
    echo "<h4>$newl</h4> ";
}

$con->close();
