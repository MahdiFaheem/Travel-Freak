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

{
    $name = $_SESSION['name'];

    $sqlprof = "SELECT name,email,phone from person where personId='$id'";
    $result = mysqli_query($con, $sqlprof);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $name = $row['name'];
            $mail = $row['email'];
            $phone = $row['phone'];

        }
    }

}

?>




<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="css/paymentstyle.css">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>



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

  <div class="container">
  <h2>Profile</h2>
  <table class="table table-striped" style="width: 600px" style="position: relative;">
    <thead>    </thead>
    <tbody>
        <td>Username: </td>
        <td><?=$name;?></td>
      </tr>
      <tr>
        <td>Email: </td>
        <td><?=$mail;?></td>
      </tr>
      <tr>
        <td>Phone: </td>
        <td>+880<?=$phone;?></td>
      </tr>
      <tr>
        <td><button type="submit" name="delete" onclick="location.href='deleteAccount.php'" class="btn btn-danger" style="width: 300px">Delete</button></td>
          <td><a style="text-decoration:none" href="profileup.php">
              <button type="button" class="btn btn-success" style="width: 300px">Edit</button></a></td>
      </tr>
    </tbody>
  </table>
  </div>

</body>
</html>





