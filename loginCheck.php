<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "travel");

$msg = "";
if ($con->connect_error) {
    exit('Could not connect');
}
$msg = "";
$emc = '';
$passc = "";

if (isset($_POST['login'])) {

    $em = $_POST['uname'];
    $pass = $_POST['psw'];
    $type = $_POST['userType'];

    //echo "hffjjhg";
    if ("" == $em) {
        $emc = "Enter User Name";
    } elseif ("" == $pass) {
        $passc = "Enter Password";

    } else {
        $sql = "select * from person where name='$em' and password='$pass'";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                echo $type;
                session_start();

                $id = $row['personId'];
                $em = $row['name'];
                $type = $row['type'];
                $pass = $row['password'];
                $_SESSION['personId'] = $id;
                $_SESSION['name'] = $em;
                $_SESSION['type'] = $type;
                $_SESSION['password'] = $pass;

            }
            if (1 == $type) {
                header("Location: admin panel.php");
            } else {
                header("Location: welcome.php");
            }
        } else {
            echo '<script>alert("Invalid name or password!")</script>';
            echo "<script>setTimeout(\"location.href = 'Home.php';\",100);</script>";
        }
    }
}
$con->close();
