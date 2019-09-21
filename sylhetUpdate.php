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
$brkPrice = 0;
$lunPrice = 0;
$dnrPrice = 0;
$nodays = $_SESSION['totalDate'];

$con = mysqli_connect("localhost", "root", "", "travel");
if ($con->connect_error) {
    exit('Could not connect');
}

if (isset($_POST['checkBillBtn'])) {
    $htlname = $_POST['HotelCmb'];
    $brk = $_POST['BreakfastCmb'];
    $lunch = $_POST['LunchCmb'];
    $dinner = $_POST['DinnerCmb'];
    $htl = $_POST['HotelCmb'];
    $htlsg = $_POST['HotelSRoomQuantityChk'];
    $htldb = $_POST['HotelDRoomQuantityChk'];

    $sqlhtlsg = "SELECT sPrice,htlId FROM hotelsylhet WHERE htlName='$htl'";
    $result = mysqli_query($con, $sqlhtlsg);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $htlSPrice = $row['sPrice'];
            $HotelId = $row['htlId'];

        }
        $htlSPrice *= $htlsg;
        //echo $htlSPrice;

    }

    $sqlhtldb = "SELECT dPrice,htlId FROM hotelsylhet WHERE htlName='$htl'";
    $result = mysqli_query($con, $sqlhtldb);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $htlDPrice = $row['dPrice'];
            $HotelId = $row['htlId'];
        }
        $htlDPrice *= $htldb;

    }
    $totalHtlBills = ($htlSPrice + $htlDPrice) * $nodays;

    $sqlbrk = "SELECT foodPrice, foodId FROM foodcox WHERE foodName='$brk' and foodType='Breakfast'";
    $result = mysqli_query($con, $sqlbrk);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $brkPrice = $row['foodPrice'];
            $FoodID = $row['foodId'];

        }
        //echo $brkPrice;
    }

    $sqlLunch = "SELECT foodPrice, foodId FROM foodcox WHERE foodName='$lunch' and foodType='lunch'";
    $result = mysqli_query($con, $sqlLunch);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $lunPrice = $row['foodPrice'];
            $FoodID = $row['foodId'];
        }
        // echo $lunPrice;
    }

    $sqldinner = "SELECT foodPrice, foodId FROM foodcox WHERE foodName='$dinner' and foodType='Dinner'";
    $result = mysqli_query($con, $sqldinner);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $dnrPrice = $row['foodPrice'];
            $FoodID = $row['foodId'];
        }
        // echo $dnrPrice;
    }
    $totalFoodBill = ($brkPrice + $lunPrice + $dnrPrice) * $nodays;
    $_SESSION['foodbill'] = $totalFoodBill;
    $_SESSION['hotelbill'] = $totalHtlBills;

    $totalPrc = $totalFoodBill + $totalHtlBills;
    $_SESSION['totalbill'] = $totalPrc;
    $_SESSION['hotelid'] = $HotelId;
    $_SESSION['foodid'] = $FoodID;
    // echo $totalPrc;

    /* $sql="UPDATE plan set htlBill=10,foodBill=10,totalBill=10 where personId=2";
$result=mysqli_query($con,$sql);
session_start();
$dname=$_POST['txtDes'];

$_SESSION['txtDes']=$dname;

header("Location: seeplan.php");
header("Location: seeplan.php"); */

}
$con->close();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Sylhet</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="js/jquery.js"></script>
  <script src="js/ajex.jquery.js"></script>
  <link rel="stylesheet" href="js/bootstrap-3.3.7-dist/bootstrap.min.css" />



</head>
<body>
		<nav  class="navOpacity navbar navbar-expand-lg">
				<div id="opac">


				<ul>
					<li>
						<a class="logo" href="welcome.php"></a>
					</li>
					<li>

					</li>
					<li id="search">
						<form class="navbar-form navbar-right" action="new.php" method="POST">
					         <div class="form-group">
					             <input type="text" class="form-control" placeholder="Search" id="coun" autocomplete="off" name="name">
					         </div>
					         <button type="submit" class="btn btn-danger" name="submit">Search</button>
					    </form>
					</li>

					<li >
						<a href="Myplans.php">My Plan</a>

					</li>
					<li>
						<a href="saved.php" id="Saved">Saved</a>
					</li>


					<li >
						<a  href="#">Settings</a>
						<ul>
							<li><a href="#" class="hlp">Profile</a><hr>

							<a href="logout.php" class="hlp">Logout</a>
						</li>
						</ul>
					</li>

					<li>
						<a href="#">Help</a>
						<ul>
							<li><a href="faq.html" class="hlp">FAQ</a><hr>
							<a href="feedback.html" class="hlp">Give Feedback</a></li>
						</ul>
					</li>
				</ul>

				</div>
			</nav>


			<div>
					<img class="mySlides" src="images/inanibeach.jpg" >
					<img class="mySlides" src="images/cxs.jpg" >
					<img class="mySlides" src="images/sangu.jpg">
			</div>

			<script>
					var myIndex = 0;
					carousel();

					function carousel() {
					  var i;
					  var x = document.getElementsByClassName("mySlides");
					  for (i = 0; i < x.length; i++) {
						x[i].style.display = "none";
					  }
					  myIndex++;
					  if (myIndex > x.length) {myIndex = 1}
					  x[myIndex-1].style.display = "block";
					  setTimeout(carousel, 2000); // Change image every 2 seconds
					}
					</script>


		<div >
			<br>
			<h2 class="flowDescription" style="color: black">Book Your Hotel</h2>

		</div>
		<form name="myForm" action="coxpaymentupdate.php" method="Post">

		<div class="flowDescription" style="color: black;text-align: left">
			<br><br>

			<div class="flowDescription">

				<div id="hotel">
				<h3 id=>Total Hotel Cost: Tk <?=$totalHtlBills?> </h3>
				</div>
				<br>
				<br>
				<hr>
			</div>
		</div>


		</div>

		<div >
				<br>
				<h2 class="flowDescription" style="color: black">Plan Your Meal</h2>

			</div>

			<div class="flowDescription" style="color: black;text-align: center">
				<br><br>



				<br>
				<div id="meal">
				<h3 id=>Total Meal Cost: Tk <?=$totalFoodBill?></h3>
				</div>
				<div id="totalbill">
				<h3 id=>Total total Cost: Tk <?=$totalPrc?> </h3>
				</div>

				<br>
				<br>
				<div>

				<input type="button" onclick="location.href='cox\'s.php'" class="button" name="BackBtn" value="Back" style="background: red; text-decoration:none" href="cox's.php" >
				<input type="submit" class="button" name="paymentBtn" value="Go To Payment" style="background: green" >

				</div>

				</div>
			</div>


				</select>
			</div>
		</form>

		<?php require_once 'designTemplate.php';

footer();
?>
</body>
</html>
<script>
$(document).ready(function(){

 $('#coun').typeahead({
  source: function(query, result)
  {
   $.ajax({
    url:"fetch.php",
    method:"POST",
    data:{query:query},
    dataType:"json",
    success:function(data)
    {
     result($.map(data, function(item){
      return item;
     }));
    }
   })
  }
 });

});
</script>