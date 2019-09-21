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
	<div class="bg-Bksylhet">

		<nav  class="navOpacity navbar navbar-expand-lg">
			<div id="opac">

				<ul>
					<li>
           				<a class="logo" href="checkLogin.php"></a>
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
						<a href="saved.php#" id="Saved">Saved</a>
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
		<div class="headline">
			<h1>Sylhet</h1><br>
			<h4>Sylhet stands on the banks of Surma river surrounded by Khasia and the Jaintia hills on the north, and the Tripura hills on the south. This hilly region adds a variation to the flat land Bangladesh. The terraced tea -gardens, winding mountainous rivers, thick tropical forest and country side extending to the horizon combine to make greater Sylhet a major tourist attraction of the country. </h4>
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