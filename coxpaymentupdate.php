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

if (isset($_POST['paymentBtn'])) {
    $foodBill = $_SESSION['foodbill'];
    $hotelBill = $_SESSION['hotelbill'];
    $totalBill = $_SESSION['totalbill'];

    $breakFoodID = $_SESSION['brkfoodid'];
    $lunchFoodID = $_SESSION['lunfoodid'];
    $dinnerFoodID = $_SESSION['dinfoodid'];
    $hotelid = $_SESSION['hotelid'];

    $sql = "UPDATE plan set htlBill='$hotelBill',foodBill='$foodBill',totalBill='$totalBill', htlId='$hotelid', foodId='$breakFoodID', lunFoodId='$lunchFoodID', dinFoodId='$dinnerFoodID' where personId='$id' and pay=0";

    $result = mysqli_query($con, $sql);

    $sql1 = "UPDATE uplace set totalBill='$totalBill' where personId='$id' and pay=0";
    $result1 = mysqli_query($con, $sql1);

    $sqlPlan = "SELECT strtDate,endDate,totalDate,noOfpeople,htlBill,foodBill,totalBill from plan where personId='$id'";
    $result = mysqli_query($con, $sqlPlan);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $srtDt = $row['strtDate'];
            $endDt = $row['endDate'];
            $totalDt = $row['totalDate'];
            $noOfPeople = $row['noOfpeople'];
            $htlBill = $row['htlBill'];
            $fdBill = $row['foodBill'];
            $ttlBill = $row['totalBill'];

        }
    }

}
$con->close();

?>








<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="css/paymentstyle.css">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>



     <nav  class="navOpacity navbar navbar-expand-lg">
      <div id="opac">

        <ul>
          <li>
            <a class="logo" href="welcome.php"></a>
          </li>
          <li>
            <a href="faq.html" id="help">Help</a>

          </li>
        </ul>
      </div>
    </nav>

  <div class="container">
  <h2></h2>
  <table class="table table-striped" style="width: 1000px" style="position: relative;">
    <thead>
      <tr>
        <th style="width: 500px">Title</th>
        <th>Amount</th>
      </tr>
    </thead>
    <tbody>
        <td>Start Date</td>
        <td><?=$srtDt;?></td>
      </tr>
      <tr>
        <td>End Date</td>
        <td><?=$endDt;?></td>
      </tr>
      <tr>
        <td>Total Date</td>
        <td><?=$totalDt;?></td>
      </tr>
      <tr>
        <td>Total Person</td>
        <td><?=$noOfPeople;?></td>
      </tr>
      <tr>
        <td>Hotel Bill</td>
        <td><?=$htlBill;?></td>
      </tr>
      <tr>
        <td>Food Bill</td>
        <td><?=$fdBill;?></td>
      </tr>
      <tr>
        <td>Others</td>
        <td>0</td>
      </tr>
      <tr></tr>
      <tr>
        <td>Total Bill</td>
        <td><?=$ttlBill;?></td>
      </tr>
      <form action="payConfirm.php">
      <tr>
        <td><a style="text-decoration:none" href="welcome.php">
          <button type="button" class="btn btn-danger" >Cancel</button></a></td>
          <td><button type="submit" class="btn btn-success">Pay Bill</button></td>
      </tr>
      </form>
    </tbody>
  </table>
  </div>

</body>
</html>
