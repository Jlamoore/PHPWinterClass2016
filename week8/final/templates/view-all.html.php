<html>
    <head>
        <title>My Addresses</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form action="#" method ="GET">Would you like to add to your address book?
            <input  type="Submit" name="view" value="add">

        </form>
        <form action="./includes/signout.php" method="GET">Log out?
            <input type="submit" name="signout" value="Log Out">
        </form>
               
        <?php
        session_start();
        $db = dbconnect();
        $user_id = $_SESSION['user_id'];
        $stmt = $db->prepare("SELECT fullname, address_id FROM address WHERE user_id = :user_id ORDER BY fullname");
        $binds = array(
            ":user_id" => $user_id
        );

        $results = array();
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo "There are no addresses in your address book. Try adding some.";
        }
        if (isset($results)) {
            ?>
        <table class="table table-striped">
            <th>Full Name</th>
            <th>delete</th>
            <th>read</th>
            <th>update</th>
                <?php
                foreach ($results as $row) {
                    ?>
            <tr><td> <?php echo $row['fullname']; ?></td> <td><a href="./includes/delete.php?id=<?php echo $row['address_id'];?>">Delete</a></td>
                <td><a href="./includes/read.php?id=<?php echo $row['address_id'];?>">Read</a></td>
                <td><a href="./includes/update.php?id=<?php echo $row['address_id'];?>">Update</a></td></tr>
                    <?php
                }
                ?>
            </table>
                <?php
            }
            ?>

    </body>
</html>

<!--<td><a href="../manage/read2.php?id=<?php// echo $row['id']; ?>">Read</a></td>-->