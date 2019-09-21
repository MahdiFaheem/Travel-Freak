<?php
    session_start();
    $id=$_SESSION['personId'];
    $user=$_SESSION['name'];
    $pass=$_SESSION['password'];
    $dname=$_SESSION['txtDes'];
    $td=""; $std;$end; $np;$pid;
    if (!isset($_SESSION['personId'])) {
    session_destroy();
    header("Location: Home.php");
}

  
    
   $con = mysqli_connect("localhost","root","","travel");
	if($con->connect_error) {
		exit('Could not connect');
	}

$sql="SELECT * from plan where personId='$id'";
    $result=mysqli_query($con,$sql);
  
    
    if (mysqli_num_rows($result)>0) 
        {
            while($row=mysqli_fetch_array($result))
			{
                if($row['personId']==$id)
                {
                   
                	$td=$row['totalDate']; 
                    $std=$row['strtDate'];
                        $end=$row['endDate'];
                        $np=$row['noOfpeople'];
             			$_SESSION['strtDate']=$std;
             			$_SESSION['endDate']=$end;
						$_SESSION['noOfpeople']=$np;
						$_SESSION['totalDate']=$td;
                    }
                         
                    }
        }

       
    



?>



<!DOCTYPE html>
<html>
<head>
	<title>See Plan</title>
	<link rel="stylesheet" type="text/css" href="css/seeplansstyle.css">
	<script src="js/jquery.js"></script>
  <script src="js/ajex.jquery.js"></script>  
  <link rel="stylesheet" href="js/bootstrap-3.3.7-dist/bootstrap.min.css" /> 
</head>
<body>
	<div class="bg-img">
		<nav  class="navOpacity navbar navbar-expand-lg">
			<div id="opac">

				<ul>
					<li>
						<a class="logo" href="Home.html"></a>
					</li>
					<li id="search">
					<form class="navbar-form navbar-right" action="new.php" method="POST">
					         <div class="form-group">
					             <input type="text" class="form-control" placeholder="Search" id="coun" autocomplete="off" name="name">
					         </div>
					         <button type="submit" class="btn btn-danger" name="submit" style="width: 80px;" >Search</button>
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
							<li><a href="#" class="hlp">Profile</a><br><hr>
							
							<a href="logout.php" class="hlp">Logout</a>
						</li>
						</ul>
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
		
	</div>
	

<form action="solve1.php" method="POST">
	
		
	<?php

	if($dname=="Cox's Bazar")
       {
       
       	$sql1="SELECT * from placecox";
    $result1=mysqli_query($con,$sql1);

     if (mysqli_num_rows($result1)>0)
      {
  
	?>

	<
	<div class="txt"> Choose place to make your plan for  <?php echo $td; ?> days <br> </div>
	<?php

	$i=0;
	 while($row=mysqli_fetch_array($result1))
	 {
	
		 $pid=$row['placeId'];
	 	$pname= $row['dstName'];

	 	$description=$row['description'];
	 	?>
	 	<br>
	 <div class="dname">
	 	<input type="checkbox" name="dn[]" value="<?php echo $pname; ?>"> &nbsp <?php echo $pname; ?> <br>
	 	<img  src="<?php echo $row['image']; ?>" class="pl">
	 	<h3><?php echo $description ?></h3>
	</div>
	
	 	<?php 
	 	
	 	 $i++;
		}
	}
	}
	 	
	?>


	<?php

	if($dname=="Sylhet")
       {
       
       	$sql1="SELECT * from placesylhet";
    $result1=mysqli_query($con,$sql1);

     if (mysqli_num_rows($result1)>0)
      {
  
	?>

	<
	<div class="txt"> Choose place to make your plan for  <?php echo $td; ?> days <br> </div>
	<?php

	$i=0;
	 while($row=mysqli_fetch_array($result1))
	 {
	
		$pid=$row['placeId'];
	 	$pname= $row['dstName'];

	 	$description=$row['description'];
	 	?>
	 	<br>
	 <div class="dname">
	 	<input type="checkbox" name="dn[]" value="<?php echo $pname; ?>"> &nbsp <?php echo $pname; ?> <br>
	 	<img  src="<?php echo $row['image']; ?>" class="pl">
	 	<h3><?php echo $description ?></h3>
	</div>
	
	 	<?php 
	 	
	 	 $i++;
		}
	}
	}
	 	
	?>
 		
<br> <br>
 <button type="submit" name="confirm" class="confirm"> CONFIRM PLAN</button> <br>
	
	
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