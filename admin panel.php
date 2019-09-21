<?php
session_start();
$id = $_SESSION['personId'];
$user = $_SESSION['name'];
if (!isset($_SESSION['personId'])) {
    session_destroy();
    header("Location: Home.php");
}

?>
<html>

	<head>
		<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    
	</head>
	<body>
			<nav  class="navOpacity navbar navbar-expand-lg">
			

					<ul>
						<li>
							<a class="logo" href="admin panel.php"></a>
						</li>
						<li>
							
						</li>

	
						<!--<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Settings
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="#">Profile</a>
							<a class="dropdown-item" href="#">Delete Account</a>
							<a class="dropdown-item" href="logout.php">Logout</a>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Help
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="faq.html">FAQ</a>
							<a class="dropdown-item" href="feedback.html">Give Feedback</a>
							</div>
						</li>-->
						<li >
							<a  href="#">Settings</a>
							<ul>
								<li><a href="profileadmin.php" class="hlp">Profile</a><br><hr>
								
								<a href="logout.php" class="hlp">Logout</a>
							</li>
							</ul>
						</li>
						
					</ul>
				
			</nav>

			

			<br>
			<br> <br>
			<br> <br>
			<br>
			
				<h2>ADMIN PANEL</h2>
				
				<div class="input">
                    <br>
                    <a style="text-decoration:none" href="traveler.php">
					<button class="button" style="vertical-align:middle"
                    onclick = "">
                    <span>Traveller's Info </span>
                    </button>
                    <br>
                    <br>
                    <a style="text-decoration:none" href="feedpage.php">
                    <button class="button" style="vertical-align:middle" >
                    <span>Feedbacks</span>
                    </button>

				</div>	

		
	</body>
</html>