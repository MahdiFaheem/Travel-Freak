




<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/loginstyle.css">
</head>
<body>
<div class="bg_img">
  <nav  class="navOpacity">
      <div id="opac">

        <ul>
          <li>
          <a class="logo" href="Home.php"></a>
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

  <form action="loginCheck.php" method="POST">
    <div class="imgcontainer">
      <img src="images/icon.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
    <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>


              <button type="submit" name="login" >Login</button> <br>
              <h5>Don't have an account? <br> <a href="Signup.html"> Sign up</a> and plan your trip.</h5>
           <br>
    <div class="container" style="background-color:#f1f1f1">
    <a style="text-decoration:none" href="Home.php">
      <button type="button" class="cancelbtn">Cancel</button></a>
      <span class="psw"><a style="text-decoration:none" href="Forgot.html">Forgot password?</a></span>
    </div>

  </form>
</div>


</body>
</html>
