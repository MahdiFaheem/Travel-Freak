<?php

session_start();
$id = $_SESSION['personId'];
//  $user=$_SESSION['uname'];

if (!isset($_SESSION['personId'])) {
    session_destroy();
    header("Location: Home.php");
}

$con = mysqli_connect("localhost", "root", "", "travel");
if ($con->connect_error) {
    exit('Could not connect');
}

$sql = "DELETE FROM `plan` where personId='$id'";
$result = mysqli_query($con, $sql);

$sql = "DELETE FROM `feedback` where personId='$id'";
$result = mysqli_query($con, $sql);

$sql = "DELETE FROM `person` where personId='$id'";
$result = mysqli_query($con, $sql);
$sql = "DELETE FROM `uplace` where personId='$id'";
$result = mysqli_query($con, $sql);

echo '<script>alert("Account deleted successfully!")</script>';
echo "<script>setTimeout(\"location.href = 'Home.php';\",100);</script>";

?>