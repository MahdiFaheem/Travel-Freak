<?php
session_start();
$id = $_SESSION['personId'];
$user = $_SESSION['name'];
$pass = $_SESSION['password'];
$dname = $_SESSION['txtDes'];
$std = $_SESSION['strtDate'];
$end = $_SESSION['endDate'];
//$np=$_SESSION['noOfpeople'];

if (!isset($_SESSION['personId'])) {
    session_destroy();
    header("Location: Home.php");
}

$con = mysqli_connect("localhost", "root", "", "travel");
if ($con->connect_error) {
    exit('Could not connect');
}
echo $user;

if ("Cox's Bazar" == $dname) {
    $check = $_POST['dn'];

    if (isset($_POST['confirm'])) {
        $sql1 = "SELECT * from placecox";
        $result1 = mysqli_query($con, $sql1);
        if (mysqli_num_rows($result1) > 0) {
            while ($row = mysqli_fetch_array($result1)) {
                $place = $row['placeId'];
                $dstName = $row['dstName'];

                $description = $row['description'];
                $image = $row['image'];

                for ($i = 0; $i < sizeof($check); $i++) {
                    if ($check[$i] == $dstName) {
                        echo $check[$i];
                        $sql = "INSERT INTO uplace (pid, placeName, personId,strtDate, endDate, totalBill,pay) VALUES('','" . $check[$i] . "','$id','$std','$end','','')";
                        $result = mysqli_query($con, $sql);

                        header("Location: cox_s.php");

                    }
                }
            }
        }
    }

}

if ("Sylhet" == $dname) {
    $check = $_POST['dn'];

    if (isset($_POST['confirm'])) {
        $sql1 = "SELECT * from placesylhet";
        $result1 = mysqli_query($con, $sql1);
        if (mysqli_num_rows($result1) > 0) {
            while ($row = mysqli_fetch_array($result1)) {
                $place = $row['placeId'];
                $dstName = $row['dstName'];

                $description = $row['description'];
                $image = $row['image'];

                for ($i = 0; $i < sizeof($check); $i++) {
                    if ($check[$i] == $dstName) {
                        echo $check[$i];
                        $sql = "INSERT INTO uplace (pid, placeName, personId,strtDate, endDate, totalBill,pay) VALUES('','" . $check[$i] . "','$id','$std','$end','','')";
                        $result = mysqli_query($con, $sql);

                        header("Location: sylhetHotel.php");

                    }
                }
            }
        }
    }

}
