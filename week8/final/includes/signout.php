
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">    <!--include style sheet-->
        <title></title>
    </head>
    <body>
        <?php
        session_start();                //start session , empt variables, and destroy the session to safely log out
        session_unset();
        session_destroy();
        echo 'Loggedout';
        ?>
        <form method = "GET" action = "../index.php">
        <input type = "submit" name = "view" value = 'Return to loggin'>            <!-- return to login page-->
        </form>

        </body>
        </html>

