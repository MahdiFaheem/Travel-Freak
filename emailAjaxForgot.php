<?php
$con = mysqli_connect("localhost", "root", "", "travel");
if ($con->connect_error) {
    exit('Could not connect');
}
if(isset($_POST["uemail"]))
{   
    $email=$_POST['uemail'];
    $sql = "SELECT email FROM `person` WHERE email='$email';";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        
        
    }
    else
    {
      echo '<script> 
      alert("email address dose not exists!");
      $("#idEmail").val("");
      </script>';
    }
}
  $con->close();  

?>