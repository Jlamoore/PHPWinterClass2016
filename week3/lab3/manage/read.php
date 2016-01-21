<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
       
        include '../includes/dbconnect.php';
        include '../includes/functions.php';

        
        $db = getDatabase();
               
       
      $id = filter_input(INPUT_GET, 'id');
             $stmt = $db->prepare("SELECT * FROM corps WHERE id =:id");
             $binds = array(
                "id"=>$id,
                ":corp" => $corp,
                ":incorp_dt" => $incorp_dt,
                ":email" => $email,
                ":zipcode" => $zipcode,
                ":owner" => $owner,
                ":phone" => $phone);
        
        $results = array();
        if ($stmt->execute($binds) && $stmt->rowCount() >0)
             {
                 $results =$stmt->fetch(PDO::FETCH_ASSOC);
        }
        ?>

        <table>
            <thead>
                <tr>
                    <th>Corporation</th>
                    <th>Incorporation Date</th>
                    <th>Email</th>
                    <th>Zip Code</th>
                    <th>Owner</th>
                    <th>Phone Number</th>
                </tr>
            </thead>
            <?php            
            ?>
            
            <?php foreach ($results as $row): ?>
                <tr>
                    <td><?php echo $row['corp']; ?></td>
                    <td><?php echo $row['incorp_dt']; ?></td>
                    <td><?php echo $row['email']; ?></td> 
                    <td><?php echo $row['zipcode']; ?></td> 
                    <td><?php echo $row['owner']; ?></td>
                    <td><?php echo $row['phone']; ?></td> 
                    <td><a href="../manage/update.php?id=<?php echo $row['id']; ?>">Update</a></td>            
                    <td><a href="../manage/delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>            
                </tr>
            <?php endforeach; ?>
                <tr><a href="../view/index.php">Back to view corporations.</a>
        </table>

    </body>
</html>

