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

    $sqlget = "SELECT * FROM calculations WHERE ticker LIKE '$ticker'";

    $sqldata = mysqli_query($dbcon, $sqlget) or die('error connecting to database');

    echo "<table>";

    while($row = mysqli_fetch_array($sqldata,MYSQLI_ASSOC)){

        echo "<tr><td>Ticker:";

        echo $row['ticker'];

        echo "</td><tr>";

        echo "<tr><td>Company Name:";

        echo $row['company'];

        echo "</td><tr>";

        echo "<tr><td>Debt Test:";

        if($row['debtsratio']<.33)

            echo "PASS";

        else

            echo "FAIL";

        echo "</td><tr>";

        echo "<tr><td>Asset Test:";

        if($row['assetratio']<.40)

            echo "PASS";

        else

            echo "FAIL";

        echo "</td><tr>";

        echo "<tr><td>Receivables Test:";

        if($row['recratio']<.70)

            echo "PASS";

        else

            echo "FAIL";

        echo "</td><tr>";;

        echo "<tr><td>Interest Income Test:";

        if($row['interestincome']<.05)

            echo "PASS";

        else

            echo "FAIL";

        echo "</td><tr>";

    }

    ?>

</div>

</body>



</html>