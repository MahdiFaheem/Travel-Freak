<?php
session_start();
$id = $_SESSION['personId'];
//  $user=$_SESSION['uname'];
if (!isset($_SESSION['personId'])) {
    session_destroy();
    header("Location: Home.php");
}

$fn = "";
$ln = "";
$nd;
$gn;
$pn;

$con = mysqli_connect("localhost", "root", "", "travel");
if ($con->connect_error) {
    exit('Could not connect');
}

if (isset($_POST['confirm'])) {
    $name = $_POST['name'];
    $password = $_POST['pass'];

    if ('' == $name) {
        $sqlpassup = "UPDATE person set password='$password' where personId='$id'";
        $result = mysqli_query($con, $sqlpassup);
        echo '<script>alert("Password Updated successfully")</script>';
        echo "<script>setTimeout(\"location.href ='welcome.php';\",100);</script>";

    } elseif ('' == $password) {
        $sqlnameup = "UPDATE person set name='$name' where personId='$id'";
        $result = mysqli_query($con, $sqlnameup);
        echo '<script>alert("Name Updated successfully")</script>';
        echo "<script>setTimeout(\"location.href ='welcome.php';\",100);</script>";

    } elseif ('' != $name && '' != $password) {
        $sqlup = "UPDATE person set name='$name', password='$password' where personId='$id'";
        $result = mysqli_query($con, $sqlup);
        echo '<script>alert("Profile Updated successfully")</script>';
        echo "<script>setTimeout(\"location.href ='welcome.php';\",100);</script>";

    }

}

$con->close();

?>




<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/signupstyle.css">
</head>

<script>
  function validateForm()
  {
    var x = document.forms["myForm"]["name"].value;
    var p1 = document.forms["myForm"]["pass"].value;
    var p2 = document.forms["myForm"]["pass_repeat"].value;

    var letters = /^[A-Za-z]+$/;
    if (x.match(letters) || x=="")
    {
        if (x.length >= 2 || x=="")
        {
          if(p1=="")
          {
            return true;
          }


          else if (p1.length >= 8)
          {
              if (p1 != p2)
              {
                alert("Password did not match! Please try Again!");
                return false;
              }

          }
          else
          {
            alert("Password must be greater that 8 characters!");
            return false;
          }

        }
        else
        {
          alert("Name must contain at least 2 words");
          return false;
        }
    }

    else
    {
      alert("Name can contain a-z or A-Z");
      return false;
    }



  }



</script>




<body>
<div class="bg_img">
  <nav  class="navOpacity navbar navbar-expand-lg">
      <div id="opac">

        <ul>
          <li>
          <a class="logo" href="welcome.php"></a>
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
  <form name="myForm" action="<?=htmlspecialchars($_SERVER['PHP_SELF']);?>" onsubmit="return validateForm()" method="POST">
    <div class="imgcontainer">
      <img src="images/icon.png" alt="Avatar" class="avatar">
    </div>

      <div class="container">

      <label for="name"><b>Username</b></label>
      <input type="text" placeholder="Enter New Username" name="name">

      <label for="pass"><b>Password</b></label>
      <input type="password" placeholder="Enter New Password" name="pass">

      <label for="pass_repeat"><b>Repeat Password</b></label>
      <input type="password" placeholder="Repeat Password" name="pass_repeat">

      <!--<label for="mail"><b>Email: <?=$mail;?></b></label>-->

    </div>

    <div class="clearfix">
      <button type="submit" name="confirm" class="signupbtn">Confirm</button>
      <a style="text-decoration:none" href="welcome.php">
      <button type="button" class="cancelbtn">Cancel</button></a>
    </div>
  </form>
</div>

</body>
</html>