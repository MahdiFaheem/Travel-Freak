
<?php
session_start();
$id = $_SESSION['personId'];
$user = $_SESSION['name'];
if (!isset($_SESSION['personId'])) {
    session_destroy();
    header("Location: Home.php");
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script src="js/jquery.js"></script>
  <script src="js/ajex.jquery.js"></script>
  <link rel="stylesheet" href="js/bootstrap-3.3.7-dist/bootstrap.min.css" />
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script>
		function validateDate() {
			var d = new Date();
			var presentDate = d.getFullYear() + "/" + (d.getMonth()+1) + "/" + d.getDate();
			var fit_start_time  = $("#startDate").val();
			var fit_end_time    = $("#end_Date").val();
			var people = $("#peopleId").val();

			if(!isNaN(people))
			{
				if(people==0)
				{
					alert("Number of person can not be 0!");
					return false;
				}
			}
			else
			{
				alert("Please input a number value in no. of people!");
				return false;
			}

			if(Date.parse(presentDate)>= Date.parse(fit_start_time)  || Date.parse(presentDate)>= Date.parse(fit_end_time))
			{
				alert("Selected date is before present date!");
				return false;
			}
			else if(Date.parse(fit_start_time)>= Date.parse(fit_end_time))
			{
				alert("End date is before start date or on the same date!");
				return false;
			}
			else
			{

			}



		}


	</script>

</head>
<body>


	<div class="bg-img">

	<nav  class="navOpacity navbar navbar-expand-lg">


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
							<li><a href="profileview.php" class="hlp">Profile</a><hr>

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

		</nav>
		<div class="headline">
			<h1>The new way to plan your next Trip</h1><br>
			<h2>Create your own customized Trip here</h2>
		</div>




		<div class="destination">
			<form action="solve.php"  onsubmit="return validateDate()" method="POST">
				<h2>Plan Your Trip</h2>
				<table class="demo">
				<tr class="tr"> <td class="td"> Enter Destination: </td> <td class="td"><input type="text" id="country" name="txtDes" class="form-control input-lg" autocomplete="off" required /></td></tr>

				<tr class="tr"> <td class="td">No. of People:</td> <td class="td"><input type="text" id="peopleId" name="people" class="black" required /></td></tr>

				<tr class="tr"><td class="td"> Start Date:</td> <td class="td"> <input type="Date" id="startDate" name="srtDate" class="black" required></td></tr>
				<tr class="tr"><td class="td">End date: </td> <td class="td">   <input type="Date" id="end_Date" name="endDate" class="black" required/><br></td></tr>


				 </table>



				Popularity: <br>
				<input type="radio" name="popilarRadio" value="1" required/>Most Popular &nbsp
							<input type="radio" name="popilarRadio" value="2"/>Balanced <br><br>



				<input type="submit" class="button" name="submitPlan"  value="See your Plan"  style="background: orange"/>
			</form>
		</div>


	</div>

	<?php require_once 'designTemplate.php';
destinationDesign();
footer();
?>
</body>
</html>

<script>
$(document).ready(function(){

 $('#country').typeahead({
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