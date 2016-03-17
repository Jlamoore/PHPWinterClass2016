<html>
    <head>
        <title>Sign-Up</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form action="#" method="post">
            <label>Enter your Email Address</label>
            <input type="text" name="Email" placeholder="Email" value="">
            <label>Enter your password</label>                              <!-- this is an html form for the user to signup for the service provided.-->
            <input type="password" name="password" placeholder="Password">
            <label>Confirm your password</label>
            <input type="password" name="password2" placeholder="Confirm Password">
            <input type="submit" name="subSignUp" value="Create">
        </form>   
        <?php
        if (isPostRequest()) {                              //validate
            $result = doesExistInDB();
            if ($result === FALSE) {
                $result2 = isValidEmail();
                if ($result2 === TRUE) {
                    if (filter_input(INPUT_POST, 'password') == filter_input(INPUT_POST, 'password2')) {
                        $result3 = createUser();
                        echo $result3;
                        ?>
                        <form method="POST" action="./index.php">
                            <input type="submit" name="view" value='Login'>
                        </form>
                        <?php                               //possible error messages
                    } else {
                        echo 'Passwords dont match. Please try again.';
                    }
                } else {
                    echo "The email Entered is invalid. Please try again.";
                }
            } else {
                echo "That Email already exists in our database.";
            }
        }
        ?>
    </body>
</html>


