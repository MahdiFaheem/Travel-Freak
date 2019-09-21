<?php
session_start();


if (!isset($_SESSION['personId'])) {
    header("Location: Home.php");
}
else
{
    header("Location: welcome.php");
}

?>