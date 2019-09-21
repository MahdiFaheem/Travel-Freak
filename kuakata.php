<!DOCTYPE html>
<html>
    <head>
        <title>Kuakata Sea Beach</title>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <script src="js/jquery.js"></script>
        <script src="js/ajex.jquery.js"></script>
        <link rel="stylesheet" href="js/bootstrap-3.3.7-dist/bootstrap.min.css" />
    </head>
    <body>
        <div class="bg-Bkkuakata">
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
                            <a href="#" id="Saved">Saved</a>
                        </li>

                        <li>
                            <a href="saved.php" id="help">Help</a>
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
                <h1>Kuakata Sea Beach</h1>
                <br />
                <h4>
                    Kukata Sea Beach is a wonderful sea beach which located in
                    the southern portion of Bangladesh. This is also called
                    Daughter of Ocean. This Sea Beach has a vast sandy beach. It
                    has excellent natural beauty; you will be best entertained
                    to see its sandy beach, blue sky, sunrise and sunset looks
                    unbelievable.Kuakata Bea Beach name come from the word 'Kua'
                    English word is “Well” in the eighteenth century by the
                    early Rakhaine dug it on the sea shore for collecting safe
                    drinking water. Later, it becomes a tradition of digging and
                    good in the neighborhoods of Rakhaine tribes for drinking
                    water. This ‘digging Kua’ gave the place a name Kuakata.
                </h4>
            </div>
            <div class="destination"></div>
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