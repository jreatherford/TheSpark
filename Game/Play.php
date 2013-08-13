<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="../CSS/theme.css">
        <title>
            The Spark
        </title>
    </head>
    
    
    <script>
        //Javascript code for the planar die
        color_num = -1;
        function rollDie()
        {
            color_num = (color_num+1)%5;
            
            var status_text = '<font color="';
            
            //the color of the text here cyles so that if the players
            //keep getting "nothing happened", they won't think the
            //link is broke and just not updating the text
            switch(color_num)
            {
                case 0:
                    status_text += '#FFFFFF">'; // white
                  break;
                case 1:
                    status_text += '#0099FF">'; //blue
                  break;
                case 2:
                    status_text += '#CCCCCC">'; //Grey
                  break;
                case 3:
                    status_text += '#FF0000">'; // red
                  break;
                case 4:
                    status_text += '#66FF66">'; // green
                  break;
                default:
                    status_text += '#FF99FF">'; //Orange
                    
            }
            
            //now, time to roll the dice!!!
            var roll = Math.floor((Math.random()*6));

            if (roll === 0)
                status_text +="Planeswalk</font>";
            else if (roll === 1)
                status_text +="Chaos!!!</font>";
            else
                status_text +="Nothing Happened</font>";
            
            document.getElementById("DieStatus").innerHTML = status_text;

        }
    </script>
    
    <div align="center">
        <body align="center">

            <h1>
                The Spark
                <br>
                <!--These show up as Mana Symbols in the MAGIC font-->
                @ + = < >  
            </h1>

            <!-- Call to PHP to display the card-->
            <?php
                include_once "Spark.php";
                echo Spark::draw();
            ?>

            <br>

            <!--These show up as Mana Symbols in the MAGIC font-->
            @ + = < > 

            <!--Results of a planar die roll-->
            <div id="DieStatus">
                &nbsp <br>
            </div>

            <h2> 
                <a href ="Javascript:rollDie()">Roll the Planar Die</a>
                <br>
                <br>
                <a href ="Play.php">Planeswalk</a>
            </h2>
        </body>
        <?php include_once "../Footer.php"; ?>
    <div align="center">
</html>
