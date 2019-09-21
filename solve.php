<?php
session_start();
$id = $_SESSION['personId'];
$user = $_SESSION['name'];

if (!isset($_SESSION['personId'])) {
    session_destroy();
    header("Location: Home.php");
}

$fn = "";
$ln = "";
$nd;
$gn;
$pn;

$con = mysqli_connect("localhost", "root", "", "travel");
if ($con->connect_error) {
    exit('Could not connect');
}

if (isset($_POST['submitPlan'])) {
    $dname = $_POST['txtDes'];
    $np = $_POST['people'];
    $a = strtotime($_POST['srtDate']);
    $b = strtotime($_POST['endDate']);
    $c = $b - $a;
    $td = $c / (60 * 60 * 24);

    $sql = "SELECT * from plan where personId='$id'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo '<script>alert("Complete previous plan first!")</script>';
        echo "<script>setTimeout(\"location.href = 'welcome.php';\",100);</script>";
    } else {
        $sql = "INSERT INTO plan (strtDate, endDate, totalDate, noOfpeople, personId) VALUES ('$_POST[srtDate]','$_POST[endDate]','$td','$np','$id')";

        $result = mysqli_query($con, $sql);
        session_start();
        $dname = $_POST['txtDes'];

        $_SESSION['txtDes'] = $dname;

        header("Location: seeplan.php");
        header("Location: seeplan.php");
    }

} else {
    $newl = "not working";
    echo "<h4>$newl</h4> ";
}
$con->close();
