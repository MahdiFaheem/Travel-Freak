<?php
session_start();
$id = $_SESSION['personId'];
// $user=$_SESSION['uname'];

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

$con = mysqli_connect("localhost", "root", "", "travel");
if ($con->connect_error) {
    exit('Could not connect');
}

if (isset($_POST['uHotel'])) {

    $hotelName = $_POST['uHotel'];
    $sqlhtlsg = "SELECT sPrice,dPrice FROM hotelsylhet WHERE htlName='$hotelName'";
    $result = mysqli_query($con, $sqlhtlsg);
    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_array($result)) {
            $htlSPrice = $row['sPrice'];
            $htlDPrice = $row['dPrice'];
        }
        $arr = array(
            "value_1" => $htlSPrice,
            "value_2" => $htlDPrice,
        );

        echo json_encode($arr);

    }
}
$con->close();
