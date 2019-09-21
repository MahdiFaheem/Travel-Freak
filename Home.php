<!DOCTYPE html>
<html>

<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="js/jquery.js"></script>
  <script src="js/ajex.jquery.js"></script>  
  <link rel="stylesheet" href="js/bootstrap-3.3.7-dist/bootstrap.min.css" /> 
</head>

<body>
	<div class="bg-img">

		<nav class="navOpacity navbar navbar-expand-lg">
			<div id="opac">

				<ul>
					<li>
						<a class="logo" href="Home.php"></a>
					</li>
					<li id="search">
						<form class="navbar-form navbar-right" action="new.php" method="POST" id="form">
					         <div class="form-group">
					             <input type="text" class="form-control" placeholder="Search" id="coun" autocomplete="off" name="name">
					         </div>
					         <button type="submit" class="btn btn-danger" name="submit">Search</button>
					    </form>
					</li>

					<li>
						<a href="#">My Plan</a>

					</li>
					<li>
						<a href="#" id="Saved">Saved</a>
					</li>
					<li>
						<a href="Login.php">Login</a>
					</li>
					<li>
						<a href="#" id="help">Help</a>
						<ul>
							<li><a href="faq.html" class="hlp">FAQ</a><br>
								<hr>

						</ul>
					</li>
				</ul>
			</div>
		</nav>
		<div class="headline">
			<h1>The new way to plan your next Trip</h1><br>
			<h2>Create your own customized Trip here</h2>
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