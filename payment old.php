<?php
session_start();
$id = $_SESSION['personId'];
$user = $_SESSION['name'];
$pass = $_SESSION['password'];
$dname = $_SESSION['txtDes'];

if (!isset($_SESSION['personId'])) {
    session_destroy();
    header("Location: Home.php");
}

echo $id;
echo $dname;

$con = mysqli_connect("localhost", "root", "", "travel");
if ($con->connect_error) {
    exit('Could not connect');
}
$sql = "SELECT * from plan where personId='$id'";
$result = mysqli_query($con, $sql);
echo $id;

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        if ($row['personId'] == $id) {

            $td = $row['totalDate'];

        }

    }
}

/*   if($dname=="Cox's Bazar")
{ $sql1="SELECT * from placecox";
$result1=mysqli_query($con,$sql1);
if (mysqli_num_rows($result1)>0)
{
while($row=mysqli_fetch_array($result1))

{
$place=$row['placeId'];
$dstName=$row['dstName'];
$popular=$row['popularity'];
$description=$row['description'];
$image=$row['image'];
}

}
}*/

$con->close();

?>


<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="css/paymentstyle.css">
<body>

<div class="sbg_img">

     <nav  class="navOpacity">
      <div id="opac">

        <ul>
          <li>
            <a class="logo" href="welcome.php"></a>
          </li>
          <li>
            <a href="#" id="help">Help</a>
            <ul>
              <li><a href="faq.html" class="hlp">FAQ</a><br><hr>
              <a href="feedback.html" class="hlp">Give Feedback</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>


  <form action="#">
    <div class="container">
      <h1>Total Cost</h1>
      <br>
      <hr><br>
      <label for="txtDes"><b>Destination:</b></label><br>

      <label for="srtDate"><b>Start Date:</b></label><br>

      <label for="endDtae"><b>End Date:</b></label><br>

      <label for="ttlDate"><b>Total Date:</b></label><br>

      <label for="ttlPrsn"><b>Total Persons:</b></label><br>

      <label for="pkgType"><b>Package Type:</b></label><br>

      <label for="htlInfo"><b>Hotel Info:</b></label><br>

      <label for="HtlName"><b>Hotel Name:</b></label><br>

      <label for="htlBill"><b>Hotel Bill:</b></label><br>

      <label for="fdBill"><b>Food Bill:</b></label><br>

      <label for="others"><b>Others:</b></label><br>
      <hr>

      <label for="ttlBill"><b>Total Bill:</b></label><br>

      <div class="clearfix">
        <a style="text-decoration:none" href="Home.php">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
        <button type="submit" class="signupbtn">Pay Bill</button>
      </div>
    </div>
  </form>
</div>

</body>
</html>
