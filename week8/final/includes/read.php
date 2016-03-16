<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">    <!--include style sheet-->
        <title></title>
    </head>
    <body>
        <?php
       
        include '../functions/dbconnect.php';        //include database connection and functions

        
        $db = dbconnect();
             $id = filter_input(INPUT_GET, 'id');
             $stmt = $db->prepare("SELECT * FROM address WHERE address_id =:id");     //connect to database and run the read sql quereywith the given id.
             $binds = array(
                    ":id" => $id            //set associative array
                );
             $results = array();
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
       
        
               
      ?>
        <table class="table table-striped">             <!--styled html form-->
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Phone Number</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Website</th>
                    <th>Birthday</th>
                </tr>
            </thead>
            <?php            
            ?>
            
            <?php foreach ($results as $row): ?>       <!--display for each field in the array-->
                <tr>
                    <td><?php echo $row['fullname']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['address']; ?></td> 
                    <td><?php echo $row['email']; ?></td> 
                    <td><?php echo $row['website']; ?></td>
                    <td><?php echo $row['birthday']; ?></td> 
                    <td><a href="./update.php?id=<?php echo $row['address_id']; ?>">Update</a></td>            
                    <td><a href="./delete.php?id=<?php echo $row['address_id']; ?>">Delete</a></td>            
                </tr>
            <?php endforeach; ?>
        </table>
        <form method="GET" action="../index.php">
            <input type="submit" name="view" value='View-all'>
        </form>

    </body>
</html>
