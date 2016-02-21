<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">        <!--include style sheet-->
        <title></title>
    </head>
    <body>
        <?php
        include '../includes/dbconnect.php';
        include '../includes/functions.php';

        $results = '';

        if (isPostRequest()) {
            $db = getDatabase();

            /*
             * Notice we use the now function from MySql to add the date and time to the date column.  
             * The date column is a varchar but can also be a datetime format
             */
            $stmt = $db->prepare("INSERT INTO corps SET corp = :corp, incorp_dt = now(), email = :email, zipcode = :zipcode, owner = :owner, phone = :phone");

            $corp = filter_input(INPUT_POST, 'corp');
            $email = filter_input(INPUT_POST, 'email');
            $zipcode = filter_input(INPUT_POST, 'zipcode');
            $owner = filter_input(INPUT_POST, 'owner');
            $phone = filter_input(INPUT_POST, 'phone');

            $binds = array(
                ":corp" => $corp,
                ":email" => $email,
                ":zipcode" => $zipcode,
                ":owner" => $owner,
                ":phone" => $phone
            );

            /*
             * empty()
             * isset()
             */

            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $results = 'Data Added';
            }
        }
        ?>


        <h1><?php echo $results; ?></h1>

        <h1>Add Corporation</h1>
        <form method="post" action="#">            
            Corporation <input type="text" value="" name="corp" />
            <br />
            Email <input type="text" value="" name="email" />
            <br />
            Zip code <input type="text" value="" name="zipcode" />
            <br />
            Owner <input type="text" value="" name="owner" />
            <br />
            Phone Number <input type="text" value="" name="phone" />
            <br />
            <input type="submit" value="Submit" />
        </form>
        
        <p><a href="../view/index.php">View Data</a></p>
    </body>
</html>


