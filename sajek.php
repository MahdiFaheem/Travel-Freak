<!DOCTYPE html>
<html>
    <head>
        <title>Sajek Valley</title>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <script src="js/jquery.js"></script>
        <script src="js/ajex.jquery.js"></script>
        <link rel="stylesheet" href="js/bootstrap-3.3.7-dist/bootstrap.min.css" />
    </head>
    <body>
        <div class="bg-Bksajek">
            <nav class="navOpacity navbar navbar-expand-lg">
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

                        <li>
                            <a href="Myplans.php">My Plan</a>
                        </li>
                        <li>
                            <a href="saved.php" id="Saved">Saved</a>
                        </li>

                        <li>
                            <a href="#" id="help">Help</a>
                            <ul>
                                <li>
                                    <a href="faq.html" class="hlp">FAQ</a><br />
                                    <hr />
                                    <a href="feedback.html" class="hlp"
                                        >Give Feedback</a
                                    >
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="headline">
                <h1>Sajek Valley</h1>
                <br />
                <h4>
                    Sajek Valley is one of the most popular tourist spots
                    nowadays among the backpackers. The valley is located in
                    Sajek Union, Baghaichhari Upazila in Rangamati District. The
                    valley is situated among the hills of Kasalong range and
                    this is the tallest among all hills. The height of the peak
                    is around 1800 feet from the sea level. The name Sajek has
                    come from the name of Sajek River which is flowing as a
                    border between Bangladesh and India. The valley is only 8 km
                    far from the Mizoram, India. It is also known as the ‘Roof
                    of Rangamati’ and ‘The Queen of Hills’.
                </h4>
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
