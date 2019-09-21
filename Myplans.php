<?php
session_start();
$id = $_SESSION['personId'];
$user = $_SESSION['name'];
$pass = $_SESSION['password'];
$dname = $_SESSION['txtDes'];
$std;
$end;
$np;
$hb;
$fb;
$tb;
$pname;
$hname;
if (!isset($_SESSION['personId'])) {
    session_destroy();
    header("Location: Home.php");
}

$con = mysqli_connect("localhost", "root", "", "travel");
if ($con->connect_error) {
    exit('Could not connect');
}

$sql = "SELECT plan.strtDate, plan.endDate, plan.noOfpeople, plan.htlBill, plan.foodBill, plan.totalBill, uplace.placeName FROM plan,uplace WHERE plan.endDate=uplace.endDate and plan.strtDate=uplace.strtDate and plan.pay='1' and uplace.personId='$id' and plan.personId='$id'";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        $std = $row['strtDate'];
        $end = $row['endDate'];
        $np = $row['noOfpeople'];
        $hb = $row['htlBill'];
        $fb = $row['foodBill'];
        $tb = $row['totalBill'];
        $pname[] = $row['placeName'];

    }
} else {
    echo '<script>alert("No plan exists!")</script>';
    echo "<script>setTimeout(\"location.href ='welcome.php';\",20);</script>";
}
if ("Cox's Bazar" == $dname) {
    $sql1 = "SELECT hotelcox.htlName, plan.htlId FROM hotelcox,plan WHERE plan.endDate='$end'and plan.strtDate='$std' and plan.pay='1' and plan.personId='$id' and plan.htlId=hotelcox.htlId";
    $result1 = mysqli_query($con, $sql1);
    if (mysqli_num_rows($result1) > 0) {
        while ($row = mysqli_fetch_array($result1)) {
            $hname = $row['htlName'];
        }
    } else {
        $hname = "No hotel selected";
    }
}

if ("Sylhet" == $dname) {
    $sql1 = "SELECT hotelsylhet.htlName, plan.htlId FROM hotelsylhet,plan WHERE plan.endDate='$end'and plan.strtDate='$std' and plan.pay='1' and plan.personId='$id' and plan.htlId=hotelsylhet.htlId";
    $result1 = mysqli_query($con, $sql1);
    if (mysqli_num_rows($result1) > 0) {
        while ($row = mysqli_fetch_array($result1)) {
            $hname = $row['htlName'];
        }
    } else {
        $hname = "No hotel selected";
    }
}

$sql1 = "SELECT foodcox.foodName FROM foodcox,plan WHERE plan.endDate='$end'and plan.strtDate='$std' and plan.pay='1' and plan.personId='$id' and plan.foodId=foodcox.foodId";
$result1 = mysqli_query($con, $sql1);
if (mysqli_num_rows($result1) > 0) {
    while ($row = mysqli_fetch_array($result1)) {
        $breakname = $row['foodName'];
    }
} else {
    $breakname = "No food selected";
}

$sql1 = "SELECT foodcox.foodName FROM foodcox,plan WHERE plan.endDate='$end'and plan.strtDate='$std' and plan.pay='1' and plan.personId='$id' and plan.lunFoodId=foodcox.foodId";
$result1 = mysqli_query($con, $sql1);
if (mysqli_num_rows($result1) > 0) {
    while ($row = mysqli_fetch_array($result1)) {
        $lunchname = $row['foodName'];
    }
} else {
    $lunchname = "No food selected";
}
$sql1 = "SELECT foodcox.foodName FROM foodcox,plan WHERE plan.endDate='$end'and plan.strtDate='$std' and plan.pay='1' and plan.personId='$id' and plan.dinFoodId=foodcox.foodId";
$result1 = mysqli_query($con, $sql1);
if (mysqli_num_rows($result1) > 0) {
    while ($row = mysqli_fetch_array($result1)) {
        $dinname = $row['foodName'];
    }
} else {
    $dinname = "No food selected";
}

?>



<!DOCTYPE html>
<html>
<head>
	<title>My Plans</title>
	<link rel="stylesheet" type="text/css" href="css/myplanstyle.css">
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


							<a href="logout.php" class="hlp">Logout</a>


					</li>
					<li>
						<a href="faq.html" class="help">Help</a>

					</li>
				</ul>
			</div>
		</nav>
<div class="place">
		<br><br>
		<h1 class="h1">Your Recent Plan</h1>


		<br>


		<table class="info" >

			<tr class="row">
				<td class="col">Tour Start: </td>
				<td class="col"> <?php echo $std; ?></td>
			</tr>
			<tr class="row">
				<td class="col">Tour End: </td>
				<td class="col"> <?php echo $end; ?></td>
			</tr>
			<tr class="row">
				<td class="col">Total people: </td>
				<td class="col"> <?php echo $np; ?></td>
			</tr>
			<tr class="row">
				<td class="col">Tour places: </td>
				<td class="col"> <?php for ($i = 0; $i < sizeof($pname); $i++) {
    echo $pname[$i];
    echo "<br>";}?></td>
			</tr>
			<tr class="row">
				<td class="col">Hotel: </td>
				<td class="col"> <?php echo $hname; ?></td>
			</tr>
			<tr class="row">
				<td class="col">Breakfast: </td>
				<td class="col"> <?php echo $breakname; ?></td>
			</tr>
			<tr class="row">
				<td class="col">Lunch: </td>
				<td class="col"> <?php echo $lunchname; ?></td>
			</tr>
			<tr class="row">
				<td class="col">Dinner: </td>
				<td class="col"> <?php echo $dinname; ?></td>
			</tr>
			<tr class="row">
				<td class="col">Hotel Bill: </td>
				<td class="col">Tk <?php echo $hb; ?></td>
			</tr>
			<tr class="row">
				<td class="col">Food Bill: </td>
				<td class="col">Tk <?php echo $fb; ?></td>
			</tr>
			<tr class="row">
				<td class="col">Total Cost: </td>
				<td class="col">Tk <?php echo $tb; ?></td>
			</tr>

		</table>


<form action="plandelete.php">
	<button type="submit" name="delete" class="pay">Delete plan</button>
</form>
	</div>






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