<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="../css/theme.css">
        <title>
            The Spark
        </title>
    </head>
    
    
    <script>
        //Javascript code for the planar die
        function rollDie()
        {
            var roll = Math.floor((Math.random()*6));

            if (roll == 0)
                document.getElementById("DieStatus").innerHTML = "Planeswalk";
            else if (roll == 1)
                document.getElementById("DieStatus").innerHTML = "CHAOS!!!";
            else
                document.getElementById("DieStatus").innerHTML = "Nothing Happened";
        }
    </script>

    <body align="center">
        
        <!-- Call to PHP to display the card-->
        <?php
            include_once "Spark.php";
            echo Spark::draw();
        ?>
        
        <br>

        <!--Results of a planar die roll-->
        <div id="DieStatus">
            &nbsp
        </div>

        <h2> 
            <a href ="Javascript:rollDie()">Roll the Planar Die</a>
            <br><br>
            <a href ="play.php">planeswalk</a>
        </h2>
    </body>
    <?php include_once "../Footer.php"; ?>
</html>
