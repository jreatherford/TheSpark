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
        
        <br>

        Features to be added (in no particular order):
        <ul>
            <li>An interface that does not suck ass</li>
            <li><strike>A simulated dice roll</strike></li>
            <li>An "About" page</li>
            <li><strike>A "Home" page</strike></li>
            <li>Better update function
            <ul>
                <li>Updates on command, not just when there are no cards</li>
                <li>Makes backups before update</li>
                <li>Can look for problems with updates (e.g., less cards in new version)</li>
            </ul>
            </li>
            <li>Actually hosted online</li>
            <li><strike>Make all the cards be the same size</strike></li>
            <li>Better Documentation for Code</li>
            <li>Whatever the hell you guys reccomend when I show it to you</li>
        </ul>

        <a href ="http://www.youtube.com/watch?v=Ni3QIG6oFtE">"Didu rike eet?"</a>
    </body>
</html>
