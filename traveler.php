
<html>

	<head>
            <link rel="stylesheet" type="text/css" href="css/feed.css">
	</head>
	<body>
        <nav  class="navOpacity navbar navbar-expand-lg">
			

            <ul>
                <li>
                    <a class="logo" href="admin panel.php"></a>
                </li>
                <li>
                    
                </li>
                <li >
                    <a  href="#">Settings</a>
                    <ul>
                        <li><a href="profileadmin.php" class="hlp">Profile</a><br><hr>
                        
                        <a href="logout.php" class="hlp">Logout</a>
                    </li>
                    </ul>
                </li>
                
            </ul>
        
    </nav>
        <table align="center">
            <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>PHONE</th>
            <th>EMAIL</th>
            <th>TYPE</th>
            </tr>

<?php
            $conn = mysqli_connect("localhost", "root", "", "travel");
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT name, phone, email,type,personId FROM person Where type=2";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row

                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["personId"] . "</td><td>" . $row["name"] . "</td><td>"
                        . $row["phone"] . "</td><td>" . $row["email"] . "</td><td>" . $row["type"] . "</td></tr>";
                }
                echo "</table>";
            } else {echo "0 results";}
            $conn->close();
?>

        </table>
	</body>
</html>