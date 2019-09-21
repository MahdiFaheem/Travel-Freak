<?php
function footer()
{
    echo '<footer id="foot">
			
    <table >
            <tr>
                <th> &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Travel Freak</th>
                <th> &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Browse</th>
                <th>  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Help</th>
                <th> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Settings</th>
                
            </tr>
            <tr>
                <td><a href="#" id="about">About us</a></td>
                <td><a href="#" id="plansByOther">Plans by other user</a></td>
                <td><a href="faq.html" id="faq">FAQ</a></td>
                <td><a href="#" id="currency">Currency: &nbsp &nbsp Change</a></td>
            </tr>
            <tr>
                <td><a href="#" id="partnership">Partner with us</a></td>
                <td><a href="#" id="des">Destinations</a></td>
                <td><a href="#" id="contact">Contact us</a></td>
                <td><a href="#" id="about">Language: &nbsp &nbsp Change</a></td>
            </tr>

            <tr>
                <td><a href="#" id="linkedin">Find Us on Linkedin</a></td>
                <td><a href="#" id="credits">Credits</a></td>
                <td><a href="#" id="privacy">Privacy policy</a></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><a href="#" id="cookie">Cookie policy</a></td>
            </tr>

            <tr>
                <td></td>
                <td></td>
                <td><a href="#" id="copyright">Copyright policy</a></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><a href="#" id="terms">Terms of use</a></td>
            </tr>

    </table>
    <hr>
    <div id="social">
        <a href="#" id="facebook"><img src="images/facebook.png" class="media"></a>
        <a href="#" id="insta"><img src="images/instagram.png" class="media"></a>
        <a href="#" id="tweeter"><img src="images/twitter.png" class="media"></a>
        <a href="#" id="youtube"><img src="images/youtube.png" class="media"></a>
    </div>
    <div id="last">
        Travel Freak-All rights reserved |<br> Powered by Google
    </div>	
</footer>';
}


function destinationDesign()
{
    echo '<div>
    <br>
    <h2 class="flowDescription" style="color: black">Easy way to Plan Your Trip</h2>
    <img src="images/flow.png" width="100%" alt="This is a image of flow of trip"><br>

</div>
<div class="flowDescription">
    <hr> <br> <br>
    <h2> Our Top Destinations</h2>
    <br> <br>
</div>

<div>
    <table class="tableImg">
        <tr>
            <td id="bg-CoxsBazar">
                <h2><a href="cox.php">Cox\'s Bazar</a></h2>
            </td>
            <td id="bg-sundarbans">
                <h2><a href="sundarban.php">Sundarban</a></h2>
            </td>
            <td id="bg-kuakata">
                <h2><a href="kuakata.php">Kuakata Sea <br> Beach</a></h2>
            </td>
        </tr>
        <tr>
            <td id="bg-bandarban">
                <h2><a href="bandarban.php">Bandarban</a></h2>
            </td>
            <td id="bg-sajek">
                <h2><a href="sajek.php">Sajek</a></h2>
            </td>
            <td id="bg-sylhet">
                <h2><a href="sylhet.php">Sylhet</a></h2>
            </td>
        </tr>
    </table>
</div>
';
}

?>