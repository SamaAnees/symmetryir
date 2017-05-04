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

        $ticker = $_GET['tick'];

        settype($ticker,"string");

        include('connect.php');

        $sqlget = "SELECT * FROM info WHERE ticker LIKE '$ticker'";

        $sqldata = mysqli_query($dbcon, $sqlget) or die('error connecting to database');

        $sqlgetquote = "SELECT * FROM quote WHERE ticker LIKE '$ticker'";

        $sqldataquote = mysqli_query($dbcon, $sqlgetquote) or die('error connecting to database');

        $row2 = mysqli_fetch_array($sqldataquote,MYSQLI_ASSOC);

        echo "<table>";

        echo "<tr><th>Profile</th></tr>";

        while($row = mysqli_fetch_array($sqldata,MYSQLI_ASSOC)){

            echo "<tr><td>";

            echo $row['ticker'];

            echo "</td><td>";

            echo $row['comp'];

            echo "</td></tr>";

            echo "<tr><td><h2>";

            echo $row2['price'];

            echo "</h2></td></tr>";

            echo "<tr><td>";

            echo $row['sector'];

            echo "</td></tr>";

            echo "<tr><td>";

            echo $row['ind'];

            echo "</td></tr>";

            echo "<tr><td>";

            echo $row['buscity'];

            echo "</td></tr>";

            echo "<tr><td>";

            echo $row['state'];

            echo "</td></tr>";

        }

        ?>



    </div>

        <div id="graph">

        <!-- TradingView Widget BEGIN -->

        <script type="text/javascript" src="https://d33t3vvu2t2yu5.cloudfront.net/tv.js"></script>

        <script type="text/javascript">

            new TradingView.widget({

                "width": 500,

                "height": 450,

                "symbol": "NASDAQ:" + "<?php echo $_GET['tick']?>",

                "interval": "D",

                "timezone": "Etc/UTC",

                "theme": "White",

                "style": "2",

                "locale": "en",

                "toolbar_bg": "#f1f3f6",

                "enable_publishing": false,

                "hide_top_toolbar": true,

                "hideideas": true

            });

        </script>

        <!-- TradingView Widget END -->

        </div>



    </body>



</html>