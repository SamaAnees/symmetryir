<html>

        <body>

        <head>

            <link type="text/css" rel="stylesheet" href="stylesheet.css"/>

        </head>

        <div class="header">

                <ul class="header">

                        <li><a href="index.html">Home</a></li>

                        <li><a href="index.html">Contact Us</a></li>

                </ul>

        </div>

<?php

/**

 * Created by PhpStorm.

 * User: Osama Anees

 * Date: 8/1/2016

 * Time: 1:53 PM

 */

include('connect.php');



$comp = $_GET['name'];

//echo "<p>";

//echo $sector;

//echo "</p>";

//settype($comp,"string");

$sqlget = "SELECT * FROM info WHERE (comp LIKE '%$comp%') OR (ticker LIKE '%$comp%')";

$sqldata = mysqli_query($dbcon, $sqlget) or die('error connecting to database');

$temp;

echo "<table>";

echo "<tr><th>Ticker</th><th>Name</th><th>Sector</th></tr>";

while($row = mysqli_fetch_array($sqldata,MYSQLI_ASSOC)){

        echo "<tr><td>";

        $temp = $row['ticker'];

        echo "<a href=\"profile.php?tick=$temp\">";

        echo $row['ticker'];

        echo "</a>";

        echo "</td><td>";

        echo $row['comp'];

        echo "</td><td>";

        echo $row['sector'];

        echo "</td></tr>";

}

echo "</table>";

?>

        </body>



</html>





