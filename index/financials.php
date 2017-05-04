<html>

    <head>

        <link type="text/css" rel="stylesheet" href="stylesheet.css"/>

    </head>

    <body>

    <div class="header">

        <ul class="header">

            <li><a href="index.html">Home</a></li>

            <li><a href="index.html">Contact Us</a></li>

        </ul>

    </div>



    <ul class="navbar">

        <?php

        $ticker = $_GET['tick'];

        settype($ticker,"string");

        echo "<li><a href=\"profile.php?tick=$ticker\">Summary</a></li>";

        echo "<li><a href=\"islamic.php?tick=$ticker\">Islamic info</a></li>";

        echo "<li><a href=\"financials.php?tick=$ticker\">Financials</a></li>";

        ?>

    </ul>



<div class="info">

    <?php

    /**

     * Created by PhpStorm.

     * User: Osama Anees

     * Date: 8/28/2016

     * Time: 2:42 AM

     */

    $ticker = $_GET['tick'];

    settype($ticker,"string");

    //echo "<p>";

    //echo $ticker;

    //echo "</p>";

    include('connect.php');

    $sqlget = "SELECT * FROM financials WHERE ticker LIKE '$ticker'";

    $sqldata = mysqli_query($dbcon, $sqlget) or die('error connecting to database');

    echo "<table>";

    echo "<tr><th>Financial</th><th>Annual</th>";

    while($row = mysqli_fetch_array($sqldata,MYSQLI_ASSOC)){

        echo "<tr><td>Total Revenue</td><td>";

        echo $row['totrev'];

        echo "</td></tr>";

        echo "<tr><td>Operating Income</td><td>";

        echo $row['operating'];

        echo "</td></tr>";

        echo "<tr><td>Short-term Investments</td><td>";

        echo $row['shortinv'];

        echo "</td></tr>";

        echo "<tr><td>Total Receivables</td><td>";

        echo $row['rectotal'];

        echo "</td></tr>";

        echo "<tr><td>Long-term Investments</td><td>";

        echo $row['longinv'];

        echo "</td></tr>";

        echo "<tr><td>Current Portion Debt</td><td>";

        echo $row['currentdebt'];

        echo "</td></tr>";

        echo "<tr><td>Long-term Debt</td><td>";

        echo $row['longdebt'];

        echo "</td></tr>";

        echo "<tr><td>Common Shares</td><td>";

        echo $row['commonshare'];

        echo "</td></tr>";

        echo "<tr><td>End Cash</td><td>";

        echo $row['endcash'];

        echo "</td></tr>";

    }

    ?>

</div>

</body>



</html>