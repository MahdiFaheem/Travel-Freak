<?php
session_start();
$id = $_SESSION['personId'];
//$user = $_SESSION['uname'];

if (!isset($_SESSION['personId'])) {
    session_destroy();
    header("Location: Home.php");
}

$fn = "";
$ln = "";
$nd;
$gn;
$pn;
?>

<!DOCTYPE html>
<html>
<head>
	<title>Cox's Bazar</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script src="js/jquery.js"></script>
  <script src="js/ajex.jquery.js"></script>  
  <link rel="stylesheet" href="js/bootstrap-3.3.7-dist/bootstrap.min.css" />  

	<script>
		function validate() {
			if($("#hotelSelectCmb").val()=="" || $("#BrkCmb").val()=="" || $("#LunCmb").val()=="" || $("#DinCmb").val()=="")
			{
				alert(" Select the options!");
				return false;
			}
		}
	</script>


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
							<a  href="logout.php">Logout</a>
						</li>
						<li>
							<a href="faq.html" id="help">Help</a>

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
		<form name="myForm" onsubmit="return validate()" action="coxsupdate.php" method="Post">

		<div class="flowDescription" style="color: black;text-align: left">
			<br><br>

			<div class="flowDescription">
				Choose Hotel:
				<select id="hotelSelectCmb" name="HotelCmb" >
					<option value="">---------------------Select Hotel--------------------</option>
					<option value="Sayeman Beach Resort">Sayeman Beach Resort</option>
					
					<option value="Hotel Prime park">Hotel Prime park</option>
					<option value="Orchid Blue">Orchid Blue</option>
					<option value="Hotel Marine Plaza">Hotel Marine Plaza</option>
					<option value="Hotel Sea Crown">Hotel Sea Crown</option>
				</select>
				<br>
				Select Rooms:
					<table  style="width:100% ;height:20%; text-align: center;align-items: center">
						<tr>
							<td>
							 Room Type:
							</td>
							<td>
								Quantity:
							</td>
							<td>
								Rate:
							</td>
						</tr>
						<tr>
							<td>
								Single Room
							</td>
							<td>
								<select  name="HotelSRoomQuantityChk">
									<option value="0">0</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
								</select>
							</td>
							<td>
							Tk <span id="singleRate">0000</span>
							</td>

						</tr>
						<tr>
							<td>
								Double Room
							</td>
							<td>
								<select name="HotelDRoomQuantityChk">
									<option value="0">0</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>

								</select>
							</td>
							<td>
							Tk <span id="doubleRate">0000</span>
							</td>
						</tr>
						

					</table>

				<!-- Single room
					&nbsp  &nbsp &nbsp &nbsp
				Quantity:
				<select  name="HotelSRoomQuantityChk">
					<option value="0">0</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
				</select>&nbsp &nbsp &nbsp 
				Rate: Tk <span id="singleRate">00</span>


				<br>  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
				Double room
					&nbsp  &nbsp &nbsp
				Quantity:
				<select name="HotelDRoomQuantityChk">
					<option value="0">0</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>

				</select>
				&nbsp &nbsp &nbsp 
				Rate: Tk <span id="doubleRate">00</span>
				
			</div>-->
				<br>
				<br>
				<hr>
			</div>
		</div>

			</select>
		</div>
	

		<div >
				<br>
				<h2 class="flowDescription" style="color: black">Plan Your Meal</h2>

			</div>

			<div class="flowDescription" style="color: black;text-align: center">
				<br><br>


					Breakfast:
					<select id="BrkCmb" name="BreakfastCmb">
					<option value="">--------Select Food--------</option>
							<option value="Bengali (parata, curry etc.)">Bengali(parata, curry etc.)</option>
							<option value="Western(bread, butter, etc)">Western(bread, butter, etc)</option>
						</select>


					 &nbsp  &nbsp  &nbsp &nbsp &nbsp  &nbsp  &nbsp
					Lunch:
					<select id="LunCmb"  name="LunchCmb">
					<option value="">--------Select Food--------</option>
							<option value="Bengali">Bengali</option>
							<option value="Sea Food">Sea Food</option>
							<option value="Chinese">Chinese</option>
						</select>
						&nbsp  &nbsp &nbsp &nbsp
					Dinner:
					<select id="DinCmb" name="DinnerCmb">
					<option value="">--------Select Food--------</option>
							<option value="Bengali">Bengali</option>
							<option value="Sea Food">Sea Food</option>
							<option value="Chinese">Chinese</option>
					</select>
					<br>
				<br>
				<br>
			
				<input type="submit"  class="button" name="checkBillBtn" value="Go Check Bill" style="background: red" >


				</div>
			</div>


			
			</div>
		</form>
		<script type="text/javascript" src="js/hotelRate.js"></script>
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