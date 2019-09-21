<?php
session_start();
$id = $_SESSION['personId'];
//  $user=$_SESSION['uname'];

if (!isset($_SESSION['personId'])) {
    session_destroy();
    header("Location: Home.php");
}

$fn = "";
$ln = "";
$nd;
$gn;
$pn;

$htlSPrice = 0;
$htlDPrice = 0;
$brkPrice = 0;
$lunPrice = 0;
$dnrPrice = 0;

$con = mysqli_connect("localhost", "root", "", "travel");
if ($con->connect_error) {
    exit('Could not connect');
}

if (!isset($_POST['payment'])) {

    $sql = "UPDATE plan set pay=1 where personId='$id' and pay =0";
    $result = mysqli_query($con, $sql);
    $sql1 = "UPDATE uplace set pay=1 where personId='$id' and pay =0";
    $result1 = mysqli_query($con, $sql1);

    echo '<script>alert("Payment completed successfully!")</script>';
    echo "<script>setTimeout(\"location.href = 'welcome.php';\",100);</script>";

}
$con->close();
