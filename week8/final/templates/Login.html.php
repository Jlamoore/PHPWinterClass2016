<html>
    <head>
        <title>Log-in</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form action="#" method="post">
            <label>Enter your Email Address</label>
            <input type="text" name="Email" placeholder="Email" value="">       <!--  form for the user to enter there login credentials-->
            <label>Enter your password</label>
            <input type="password" name="password" placeholder="Password">
            <input type="submit" name="subLogin" value="Login">
        </form>   
        <?php
        if (isPostRequest()) {
            $result = isValidEmail();
            if ($result === TRUE) {         //validate the credentials
                $result2 = doesExistInDB();
                if ($result2 === TRUE) {
                    $results3 = isValidUser();
                    if ($results3 === true) {
                        echo 'Successfully loged-in';
                        session_starter();
                        ?>
        <form action="./index.php" method="GET">
            <input type="submit" name="view" value="View-all">              <!-- link to view all-->
        </form>
        <?php
                        
                    } else {
                        echo 'incorrect email and password combination';                        //echo errors
                    }
                } else {
                    echo "That email is not currently in our database.";
                }
            } else {
                echo "The email entered is invalid. Please try again.";
            }
        }
        ?>
    </body>
</html>
