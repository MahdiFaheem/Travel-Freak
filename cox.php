<!DOCTYPE html>
<html>
    <head>
        <title>Cox's Bazar</title>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <script src="js/jquery.js"></script>
  <script src="js/ajex.jquery.js"></script>
  <link rel="stylesheet" href="js/bootstrap-3.3.7-dist/bootstrap.min.css" />
    </head>
    <body>
        <div class="bg-Bkcoxbaxar">
            <nav class="navOpacity navbar navbar-expand-lg">
                <div id="opac">
                    <ul>
                        <li>
                            <a class="logo" href="checkLogin.php"></a>
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
                <h1>Cox's Bazar</h1>
                <br />
                <h4>
                    Cox's Bazar is a town, a fishing port and district
                    headquarters in Bangladesh. It is known for its wide sandy
                    beach which is the world's longest natural sandy sea beach.
                    It is an unbroken 125 km sandy sea beach with a gentle
                    slope. It is located 150 km south of Chittagong. Cox’s Bazar
                    is also known by the name "Panowa", the literal translation
                    of which means "yellow flower". Its other old name was
                    "Palongkee".
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