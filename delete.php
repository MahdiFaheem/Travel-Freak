<?php
    session_start();
    $id=$_SESSION['personId'];
    $user=$_SESSION['name'];
    $pass=$_SESSION['password'];
    $dname=$_SESSION['txtDes'];
   $std=$_SESSION['strtDate'];
   $end=$_SESSION['endDate'];

   if (!isset($_SESSION['personId'])) {
    session_destroy();
    header("Location: Home.php");
}

   echo $id; echo $std;
    
    $con = mysqli_connect("localhost","root","","travel");
	if($con->connect_error) {
		exit('Could not connect');
	}
	echo $user;
      if (!isset($_POST['delete'])) {

    $sql = "DELETE from plan where personId='$id' and pay='0' and strtDate='$std' and endDate='$end'";
    $result = mysqli_query($con, $sql);

    $sql1 = "DELETE from uplace where personId='$id' and strtDate='$std' and endDate='$end' and pay='0'";
    $result1 = mysqli_query($con, $sql1);

    
  header("Location: welcome.php");

}
      
       
 $con->close();         

				
?>
